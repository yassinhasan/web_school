<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;

    private $from, $post_id , $post_title,$post_slug ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $from ,$post_id , $post_title,$post_slug)
    {
        $this->from = $from;
        $this->post_slug = $post_slug;
        $this->post_id = $post_id;
        $this->post_title = $post_title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
          'from' =>   $this->from , 
          'post_slug' =>   $this->post_slug , 
          'post_id' =>   $this->post_id , 
          'post_title' => $this->post_title
        ];
    }
}
