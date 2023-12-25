<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view("auth.student.otp-verify");
    }


    public function confirm(Request $request){
        $user = auth()->user();
        if($request->input('code') == $user->code)
        {
                // $user->reset_code();
              return  redirect()->route('home');
        }
        return redirect()->back()->withErrors(['code'=>' Sorry not matched code']);
    }
}
