<?php

namespace App\Interfaces;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostRepository implements PostRepositoryInterface
{

    public function createPost(StorePostRequest $request)
    {

        $validator =  Validator::make($request->all(), [
            'title' => 'required',
            'section_id' => 'required',
            'content' => 'required'

        ], [
            'section_id.required' => "you shoud select section "
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            session()->flash('status', 'error');
            session()->flash('msg', $validator->errors()->first());
            session()->flash('icon', 'fa-xmark');
            return redirect()->back();
        }
        $sectionId = $request->section_id;
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str()->slug($request->title);
        $post->section_id = $sectionId;
        $post->content = $request->content;
        $post->save();
        session()->flash('status', 'success');
        session()->flash('msg', 'Post has been saved successfully!');
        session()->flash('icon', 'fa-check');
        return redirect()->back();
    }
    public function getAllPosts()
    {
        $categories = Category::with('sections')->get();
        return view("posts.posts")->with(['categories' => $categories]);
    }
    public function uploadAttach(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            //get filename with extension
            $originalName = $request->upload->getClientOriginalName();
            $saveFile = time() . '_' . $originalName;
            $mime = $file->getClientMimeType($originalName);
            if (strstr($mime, "video/")) {
                // this code for video
                $request->upload->move(public_path('images/posts/videos/'), $saveFile);
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('images/posts/videos/' . $saveFile);
            } else if (strstr($mime, "image/")) {
                // this code for image
                $request->upload->move(public_path('images/posts/images/'), $saveFile);
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('images/posts/images/' . $saveFile);
            }
            $msg = 'File successfully uploaded';
            $re = "<script>
                 window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')
            </script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
    public function editById($postId)
    {
        $post =  Post::with('sections')->get()->find($postId);
        $categories = Category::with('sections')->get();
        $sections = Category::findOrFail($post->sections->category_id)->sections->pluck('name', 'id');
        return view("posts.edit")->with(['categories' => $categories, 'post' => $post, 'sections' => $sections]);
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validator =  Validator::make($request->all(), [
            'title' => 'required',
            'section_id' => 'required',
            'content' => 'required'

        ], [
            'section_id.required' => "you shoud select section "
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            session()->flash('status', 'error');
            session()->flash('msg', $validator->errors()->first());
            session()->flash('icon', 'fa-xmark');
            return redirect()->back();
        }
        $sectionId = $request->section_id;
        $post =  Post::find($request->id);
        $post->update([

            'title' => $request->title,
            'slug' => str()->slug($request->title),
            'section_id' => $sectionId,
            'content' => $request->content,
        ]);
        session()->flash('status', 'success');
        session()->flash('msg', 'Post has been saved successfully!');
        session()->flash('icon', 'fa-check');
        return redirect()->back();
    }
    public function deletePost(Request $request)
    {
        try {

            $multiple_id = $request->multiple_id;
            if ($multiple_id != null) {
                $deletedId = explode(",", $multiple_id);
                Post::whereIn('id', $deletedId)->delete();
            } else {

                Post::findOrFail($request->id)->delete();
            }

            // toastr()->success('Student has been deleted successfully!');
            session()->flash('status', 'success');
            session()->flash('msg', 'Post has been deleted successfully!');
            session()->flash('icon', 'fa-check');
            return redirect()->back();
        } catch (\Exception $e) {
            report($e);
        }
    }
    public function getSection(Request $request)
    {
        try {
            // Form validation

            $validated =  Validator::make($request->all(), [
                'categoryId' => 'required',
            ]);
            if ($validated->stopOnFirstFailure()->fails()) {
                return response()->json([
                    'error' => $validated->errors()->first()

                ]);
            }
            //  get all sections 
            $sections = Category::findOrFail($request->categoryId)->sections->pluck('name', 'id');
            return response()->json([
                'success' => 'done',
                'sections' => $sections
            ]);
        } catch (Exception $e) {
            return  response()->json([
                'error' => $e->getMessage()

            ]);
        }
    }
    public function showAllPosts()
    {
        $posts = Post::with('sections')->get();
        return view("posts.allPosts")->with(['posts' => $posts]);
    }
}

