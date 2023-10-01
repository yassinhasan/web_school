<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('sections')->get();

        return view("posts.posts")->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'post' => 'required|string|max:255',
            ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            toastr()->error($validator->errors()->first());
        }
        $sectionId = 7;
        $section = Section::find($sectionId);
        $url = $section->categories->name."/".$section->name."/";
        $post = new Post();
        $post->title = "test";
        $post->slug = $url.str()->slug($request->name);
        $post->section_id = 7;
        $post->content = $request->post;
        $post->save();
        toastr()->success('Data has been saved successfully!');

        return redirect()->back();
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $originalName = $request->upload->getClientOriginalName();
            $savedImage = time() . '_' . $originalName;
            $request->upload->move(public_path('images/posts/images/'), $savedImage);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = url('images/posts/images/' . $savedImage);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function slug($slug)
    {
        return $this->show(Post::where('slug', @end(explode('/', $slug)))->firstOrFail());
    }
}
