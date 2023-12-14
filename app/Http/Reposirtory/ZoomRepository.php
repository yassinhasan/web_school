<?php

namespace App\Http\Reposirtory;

use App\Http\Interfaces\ZoomRepositoryInterface;
use App\Models\OnlineCourse;
use Illuminate\Http\Request;
use App\Http\Traits\FlashMessageTrait;
use App\Http\Traits\MeetingZoomTrait;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact as MailContact;
use App\Mail\ZoomEmail;
use App\Models\Setting;
use App\Models\Student;

class ZoomRepository implements ZoomRepositoryInterface
{
    use MeetingZoomTrait;
    use FlashMessageTrait;


    public function getAllMeetings()
    {
        $meetings =  OnlineCourse::all();
        return view("zoom.index")->with(['meetings' => $meetings]);
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
            $data = $request->all();
            $data['join_url'] = $meeting->join_url;
            //  Send mail to admin
            $students =  Student::all('email','first_name','last_name')->toArray();
            foreach( $students  as $student)
            {
                $email = $student['email'];
                $data =  array_merge($data,$student);
                Mail::to($email)->send(new ZoomEmail($data ));
            }


            $this->SuccessMsg("zoom creared ");
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
