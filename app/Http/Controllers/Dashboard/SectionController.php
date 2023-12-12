<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class SectionController extends Controller
{

    public function index($slug){

        
        $section = Section::where('slug', '=' , $slug)->first();

        if($section == null) {
             session()->flash('status', 'error');
             session()->flash('msg', "sorry no posts found");
             session()->flash('icon', 'fa-xmark');
             return back();
 
        }
        
        $posts = [];
        $collection = $section->posts;
        if((!count($collection) == 0))
        {

            $posts = $collection->toQuery()->paginate(10);
        }
      //  dd($collection);
        switch($section->name){
            case "images":
            return view("home.sections.images")->with(['posts' => $posts]);
            break;
            case "lessons":
                return view("home.sections.lessons")->with(['posts' => $posts]);;
                break;
            case "videos" :
                return view("home.sections.videos")->with(['posts' => $posts]);;
                break;
            default :
            session()->flash('status', 'error');
            session()->flash('msg', "sorry no section found");
            session()->flash('icon', 'fa-xmark');
            break;
        }
        
    }
    public function destroy(Request $request)
    {
        try {
            Section::findOrFail($request->id)->delete();
            session()->flash('status', 'success');
            session()->flash('msg', 'section has been deleted successfully!');
            session()->flash('icon', 'fa-check');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'name'=> 'required'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                session()->flash('status', 'error');
                session()->flash('msg', $validator->errors()->first());
                session()->flash('icon', 'fa-xmark');
            }
            $section = Section::findOrFail($request->id);
            $category = Category::find($section->category_id);
            $categoryName = $category->name;
            $sectionName =  str()->slug($section->name);
            $url = $categoryName."-".  $sectionName ;
        
            $section->update([
                $section->name = $request->name,
                $section->slug = strtolower($url)
            ]);
            session()->flash('status', 'success');
            session()->flash('msg', 'section has been updated successfully!');
            session()->flash('icon', 'fa-check');
            return redirect()->route('categories.index');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
