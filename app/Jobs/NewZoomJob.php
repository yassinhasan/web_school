<?php

namespace App\Jobs;

use App\Events\NewNotificationEvent;
use App\Events\NewPost;
use App\Mail\ZoomEmail;
use App\Models\Student;
use App\Notifications\ZoomNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NewZoomJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $from,$data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
     
 
        $this->data = $data; 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $students  = Student::all();
        
        foreach( $students  as $student)
        {
            $email = $student->email;
            $this->data['name'] = $student->name;
            Mail::to($email)->send(new ZoomEmail($this->data ,$student ));
        }
    
        // send notification
        Notification::send($students ,new ZoomNotification( $this->data ));

        event(new NewNotificationEvent($this->data));
    }
}
