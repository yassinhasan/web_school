<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('sections')->get();

        return view("categories.categories")->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // $validated=  Validator::make($request->all());
        //  if ($validated->stopOnFirstFailure()->fails()) {
        //     toastr()->error($validated->errors()->first());
        // }
        $Category = new Category();
        $Category->name = $request->name;
        if ($request->image != null) {
            $originalName = $request->image->getClientOriginalName();
            $savedImage = time() . '_' . $originalName;
            $Category->image = $savedImage;

            $request->image->move(public_path('images/categories/images/'), $savedImage);
        }
        $Category->save();

        session()->flash('status', 'success');
        session()->flash('msg', 'Student has been saved successfully!');
        session()->flash('icon', 'fa-check');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $Category)
    {
        try {
            $validated = $request->validated();
            $category = Category::findOrFail($request->id);
            if ($request->image != null) {
                $originalName = $request->image->getClientOriginalName();
                $savedImage = time() . '_' . $originalName;
                $category->update([
                    $category->name = $request->name,
                    $originalName = $request->image->getClientOriginalName(),
                    $category->image = $savedImage
                ]);
                $request->image->move(public_path('images/categories/images/'), $savedImage);
            } else {
                $category->update([
                    $category->name = $request->name
                ]);
            }

            session()->flash('status', 'success');
            session()->flash('msg', 'category has been updated successfully! ');
            session()->flash('icon', 'fa-check');
            return redirect()->back();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            // multiple delete first
            $multiple_ids = trim($request->multiple_id, ",");
            if ($multiple_ids != null) {

                $deletedIds = explode(",", $multiple_ids);
                foreach ($deletedIds as $deletedId) {
                    $hasnSections = Category::find($deletedId)->sections;
                    if (count($hasnSections)) {
                        
                        session()->flash('status', 'error');
                        session()->flash('msg', 'sorry you can not delete this Category you shoud delete sections first!');
                        session()->flash('icon', 'fa-xmark');
                    } else {

                        Category::findOrFail($deletedId)->delete();                        
                        session()->flash('status', 'success');
                        session()->flash('msg', 'category has been deleted successfully!');
                        session()->flash('icon', 'fa-check');
                    }
                }
                // delete only on category
            } else {

                $hasnSections = Category::find($request->id)->sections;

                if (count($hasnSections)) {
                    session()->flash('status', 'error');
                    session()->flash('msg', 'sorry you can not delete this Category you shoud delete sections first!');
                    session()->flash('icon', 'fa-xmark');
                } else {

                    Category::findOrFail($request->id)->delete();
                    session()->flash('status', 'success');
                    session()->flash('msg', 'category has been deleted successfully!');
                    session()->flash('icon', 'fa-check');
                }
            }


            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function addSub(Request $request)
    {

        
        $inputs = $request->all();
        if(!array_key_exists("id",$inputs)){
            toastr()->error('you shoud enter category first!');
            return redirect()->back();

        }
        $validator = Validator::make($inputs, [
            'id.*' => 'required',
            'name.*' => 'required',
        ], [
            'id.*' => 'you must select category',
            'name.*.required' => 'section  field is required.',
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            session()->flash('status', 'error');
            session()->flash('msg', $validator->errors()->first());
            session()->flash('icon', 'fa-xmark');
        } else {
            $id_array = $inputs['id'];
            $name_array = $inputs['name'];
            for ($i = 0; $i < count($id_array); $i++) {
                $category = Category::find($id_array[$i]);
                $categoryName = $category->name;
                $section = new Section();
                $section->category_id = $id_array[$i];
                $section->name = $name_array[$i];
                $categoryName =  str()->slug($categoryName);
                $sectionName =  str()->slug($section->name);
                $url = "/".$categoryName."/".  $sectionName ;
                $section->slug = strtolower($url);
                $section->save();
            }
            session()->flash('status', 'success');
            session()->flash('msg', 'Data has been saved successfully!');
            session()->flash('icon', 'fa-check');
        }
        return redirect()->back();
    }
}
