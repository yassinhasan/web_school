<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Builder\Stub;

class RatingController extends Controller
{
    public function index()
    {
        $students = Student::all()->sortByDesc('points');;
        
        return view('home.rating')->with('students',$students);
    }

    public function like(Request  $request)
    {
        try {
        $id= $request->input("id");
        $like = $request->input("like_status");
        $student = Student::findOrFail($id);
        // Get array of user who like website
        $likedby = json_decode($student->likedby);
        if($like == "like"){
            $student->points ++;
            array_push($likedby , Auth::id());
            $student->likedby = json_encode($likedby);
            $student->save();
            return response()->json([
                'like' => 'thank you ..'
            ]);
        }elseif($like === "dislike")
        {
            $student->points -- ;
            $likedby =  array_diff($likedby , [Auth::id()]);
            $student->likedby = json_encode($likedby);
            $student->save();
            return response()->json([
                'dislike' => 'i will do my best next time ..'
            ]);
        }

        }
        catch(Exception $e)
        {
            return  response()->json([
                'error' => $e->getMessage()

            ]);
        }

    }
}
