<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SectionController extends Controller
{

    public function index($slug){

        
        $section = Section::where('slug', '=' , $slug)->first();

        if($section == null) {
             toastr()->error("sorry not posts found");
        }
        $posts = $section->posts->toQuery()->paginate(10);
        switch($section->name){
            case "images":
            return view("home.sections.lessons")->with(['posts' => $posts]);
            break;
            case "lessons":
                return view("home.sections.lessons")->with(['posts' => $posts]);;
                break;
            case "videos" :
                return view("home.sections.videos")->with(['posts' => $posts]);;
                break;
            default :
            toastr()->error("sorry no section found");
            break;
        }
        
    }
    public function destroy(Request $request)
    {
        try {
            Section::findOrFail($request->id)->delete();
            toastr()->success('section has been deleted successfully!');
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
                toastr()->error($validator->errors()->first());
            }
            $section = Section::findOrFail($request->id);
            $category = Category::find($section->category_id);
            $categoryName = $category->name;
            $categoryName =  str()->slug($categoryName);
            $sectionName =  str()->slug($section->name);
            $url = "/".$categoryName."/".  $sectionName ;
            
            $section->update([
                $section->name = $request->name,
                $section->slug = strtolower($url)
            ]);
            toastr()->success('section has been updated successfully!');
            return redirect()->route('categories.index');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
