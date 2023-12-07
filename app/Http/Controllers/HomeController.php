<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        
        $collection = Setting::all();
        $settings = $collection->flatMap(function($collection){
            return [$collection->key => $collection->value];
        });
          
        return view('home.home')->with('settings',$settings);
    }
}
