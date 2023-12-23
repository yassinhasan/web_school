<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Traits\FlashMessageTrait;
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
    use FlashMessageTrait;
    public function index()
    {
        $categories = Category::with('posts')->get();

        return view("dashboard.pages.categories")->with(['categories' => $categories]);
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


        $this->SuccessMsg('Category has been saved successfully!');
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

            $this->SuccessMsg('Category has been saved successfully!');

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

            Category::findOrFail($request->id)->delete();
            $this->SuccessMsg('Category has been destroy successfully!');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
           $this->ErrorMsg($e->getMessage());
        }
    }


}
