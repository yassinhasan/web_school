<?php

namespace App\Http\Controllers;

use App\Http\Traits\FlashMessageTrait;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\OnlineCourse;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Transport\Dsn;

class OnlineCourseController extends Controller
{
    use MeetingZoomTrait;
    use FlashMessageTrait;
    

    public function index()
    {
        $meetings =  OnlineCourse::all();
     
        return view("zoom.index")->with(['meetings' => $meetings]);
    }
    public function store(Request $request)
    {
        try {

            $meeting = $this->createMeeting($request);
           
            OnlineCourse::create([
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_at,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            $this->SuccessMsg("zoom creared ");
            return redirect()->route('zoom.index');
        } catch (\Exception $e) {
           
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        
    }
    public function delete(Request $request)
    {

    }
}
