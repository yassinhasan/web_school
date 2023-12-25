<?php
namespace App\Http\Interfaces;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

interface PostRepositoryInterface {

    public function showAddPostPage();
    public function editById($postId);
    public function deletePost(Request $request);
    public function createPost(StorePostRequest $request);
    public function update(UpdatePostRequest $request, Post $post);
    public function getSection(Request $request);
    public function uploadAttach(Request $request);
    public function showAllPosts();
}