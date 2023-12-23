<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Traits\FlashMessageTrait;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    use FlashMessageTrait;
    public function index(){
        try{

            $categories = Category::with('posts')->get();
            return view("home.courses")->with(['categories' => $categories]);
        }catch(Exception $e){   
            return view("home.courses")->with(['connection_error' => 'No Connection']);
        }
    }
    public function posts($slug){

        
        $post = Post::where('slug', '=' , $slug)->first();

        if($post == null) {
             $this->ErrorMsg("sorry no posts found");
             return back();
 
        }
        return view("home.posts")->with(['post' => $post]);;

        
    }
}
