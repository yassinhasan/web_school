<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('sections')->get();
        return view("posts.posts")->with(['categories' => $categories]);
    }


    public function index(){
        $posts = Post::with('sections')->get();
        return view("posts.allPosts")->with(['posts' => $posts]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(StorePostRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'section_id' => 'required',
            'post' => 'required|string',
            ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            toastr()->error($validator->errors()->first());
        }
        $sectionId = $request->section_id;
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str()->slug($request->title);
        $post->section_id = $sectionId;
        $post->content = $request->post;
        $post->save();
        toastr()->success('Post has been saved successfully!');

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
    public function edit( $id)
    {
        
        $post =  Post::with('sections')->get()->find($id);
        $categories = Category::with('sections')->get(); 
        $sections = Category::findOrFail($post->sections->category_id)->sections->pluck('name','id');                   
        return view("posts.edit")->with(['categories' => $categories,'post'=>$post,'sections'=>$sections]);
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
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required',
            'section_id' => 'required',
            'post' => 'required|string',
            ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            toastr()->error($validator->errors()->first());
        }
        $sectionId = $request->section_id;
        $post =  Post::find($request->id);
        $post->update([

            'title' => $request->title,
            'slug' => str()->slug($request->title),
            'section_id' => $sectionId,
            'content' => $request->post,
        ]);
        toastr()->success('Post has been saved successfully!');
        return redirect()->back();
    }

 
    public function destroy(Request $request)
    {

        try {

            $multiple_id = $request->multiple_id;
            if($multiple_id != null)
            {
                $deletedId = explode(",",$multiple_id);
                Post::whereIn('id', $deletedId)->delete();
            }
            else{

                Post::findOrFail($request->id)->delete();
            }

            // toastr()->success('Student has been deleted successfully!');
            return redirect()->back()->with('status', 'Post has been deleted successfully! ');

        } catch(\Exception $e) {
            report($e);
        }
    }
    public function slug($slug)
    {
        return $this->show(Post::where('slug', @end(explode('/', $slug)))->firstOrFail());
    }

    public function getSection(Request $request){
        try {
            // Form validation
    
            $validated=  Validator::make($request->all(),[
                'categoryId' => 'required',
             ]);
             if ($validated->stopOnFirstFailure()->fails()) {
                return response()->json([
                    'error' => $validated->errors()->first()
                ]);   
            }
            //  get all sections 
            $sections = Category::findOrFail($request->categoryId)->sections->pluck('name','id');            
            return response()->json([
                'success' => 'done' ,
                'sections' => $sections
            ]);    
        }
        catch(Exception $e)
        {
            return  response()->json([
                'error' => $e->getMessage()
    
            ]);
        }
        }    
}
