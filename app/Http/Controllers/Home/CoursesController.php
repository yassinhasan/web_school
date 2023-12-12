<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){

        
        try{

            $categories = Category::with('sections')->get();
            return view("home.courses")->with(['categories' => $categories]);
        }catch(Exception $e){
            
            return view("home.courses")->with(['connection_error' => 'No Connection']);

        }
        
        
    }
}
