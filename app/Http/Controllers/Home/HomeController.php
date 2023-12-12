<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\Setting;


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
