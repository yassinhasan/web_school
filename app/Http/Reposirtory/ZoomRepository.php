<?php

namespace App\Http\Reposirtory;

use App\Events\NewPost;
use App\Http\Interfaces\ZoomRepositoryInterface;
use App\Models\OnlineCourse;
use Illuminate\Http\Request;
use App\Http\Traits\FlashMessageTrait;
use App\Http\Traits\MeetingZoomTrait;
use App\Jobs\NewZoomJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact as MailContact;
use App\Mail\ZoomEmail;
use App\Models\Setting;
use App\Models\Student;
use App\Notifications\ZoomNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ZoomRepository implements ZoomRepositoryInterface
{
    use MeetingZoomTrait;
    use FlashMessageTrait;
    

    public function getAllMeetings()
    {
       
        $meetings =  OnlineCourse::all();
        return view("dashboard.pages.zoom")->with(['meetings' => $meetings]);
    }

    public function deleteById(Request $request)
    {
        try {

            $meeting = OnlineCourse::findOrFail($request->id);
            $this->deleteZoomMeeting($meeting->meeting_id);
            $meeting->delete();
            $this->SuccessMsg("zoom  hasa been deleted");
            return redirect()->route('zoom.index');
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function createZoom(Request $request)
    {
        try {

            $meeting = $this->createMeeting($request);
            
            if($meeting->id != null)
            {
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
                $data = [];
                $data['start_at'] = $request->start_at;
                $data['join_url'] = $meeting->join_url;
                $data['meeting_id'] = $meeting->id;
                $data['topic'] = $request->topic;
                //  Send mail to admin
    
                NewZoomJob::dispatch(auth()->user()->name,$data);
                $this->SuccessMsg("zoom creared ");
            }else{
                $this->ErrorMsg("sorry somthing error");
            }

            return redirect()->route('zoom.index');
        } catch (\Exception $e) {

        
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request)
    {
        try {
            $onlineCourse = OnlineCourse::findOrFail($request->id);

            $this->updatezoom($onlineCourse->meeting_id, $request);

            $onlineCourse->topic = $request->topic;
            $onlineCourse->start_at =  $request->start_at;
            $onlineCourse->save();
            $this->SuccessMsg("zoom updated ");
            return redirect()->route('zoom.index');
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
