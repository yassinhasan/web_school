<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\PostRepository;

use App\Models\Category;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create()
    {
        return $this->postRepository->getAllPosts();
    }


    public function index()
    {
        return $this->postRepository->showAllPosts();
    }

    public function store(StorePostRequest $request)
    {
        return $this->postRepository->createPost($request);
    }

    public function upload(Request $request)
    {

        return $this->postRepository->uploadAttach($request);
    }

    public function edit($id)
    {

        return $this->postRepository->editById($id);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->postRepository->update($request,  $post);
    }


    public function destroy(Request $request)
    {
        return $this->postRepository->deletePost($request);
    }
    public function slug($slug)
    {
        return $this->show(Post::where('slug', @end(explode('/', $slug)))->firstOrFail());
    }

    public function getSection(Request $request)
    {
        return $this->postRepository->getSection($request);
    }
}
