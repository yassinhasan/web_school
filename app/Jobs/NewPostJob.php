<?php

namespace App\Jobs;

use App\Events\NewNotificationEvent;
use App\Events\NewPost;
use App\Models\Student;
use App\Notifications\PostNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class NewPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $data;
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

 
        // send notification
        Notification::send($students ,new PostNotification( $this->data));

        event(new NewNotificationEvent($this->data));
    }
}
