<?php

namespace App\Http\Reposirtory;

use App\Http\Interfaces\PostRepositoryInterface;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Traits\FlashMessageTrait;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostRepository implements PostRepositoryInterface
{
    use FlashMessageTrait;
    public function createPost(StorePostRequest $request)
    {

        $validator =  Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'

        ], [
            'category_id.required' => "you shoud select category "
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {

            $this->ErrorMsg($validator->errors()->first());
            return redirect()->back();
        }
        $cstegoryId = $request->category_id;
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str()->slug($request->title);
        $post->category_id = $cstegoryId;
        $post->content = $request->content;
        $post->save();
 
        $this->SuccessMsg('Post has been saved successfully!');
        return redirect()->back();
    }
    public function showAddPostPage()
    {
        $categories = Category::with('posts')->get();
     
        return view("dashboard.pages.addpost")->with(['categories' => $categories]);
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
        $post =  Post::with('categories')->get()->find($postId);
        $categories = Category::all();
        return view("dashboard.pages.editpost")->with(['categories' => $categories, 'post' => $post]);
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validator =  Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'

        ], [
            'category_id.required' => "you shoud select section "
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {;
            $this->ErrorMsg($validator->errors()->first());
            return redirect()->route('posts.edit',$request->id);
        }
        $cstegoryId = $request->category_id;
        $post =  Post::find($request->id);
        $post->update([

            'title' => $request->title,
            'slug' => str()->slug($request->title),
            'category_id' => $cstegoryId,
            'content' => $request->content,
        ]);
        $this->SuccessMsg('Post has been saved successfully!');
        return redirect()->route('posts.edit',$request->id);
    }
    public function deletePost(Request $request)
    {
        try {

                Post::findOrFail($request->id)->delete();

            // toastr()->success('Student has been deleted successfully!');
            $this->SuccessMsg('Post has been deleted successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
           $this->ErrorMsg($e->getMessage());
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
        $posts = Post::with('categories')->get();
      
        return view("dashboard.pages.posts")->with(['posts' => $posts]);
    }
}

