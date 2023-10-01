<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        $categories = Category::with('sections')->get();
        
        return view("home.courses")->with(['categories' => $categories]);
    }
}
