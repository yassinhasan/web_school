<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

;
use Illuminate\Support\Facades\DB;

class ProfilecardsController extends Controller
{
    public function index(){
        $students = DB::table('students')->paginate(8);
        
        return view("home.cards")->with('students',$students);

    }
}
