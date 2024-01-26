<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ZoomNotification extends Notification
{
    use Queueable;

    private $from , $metting_id , $metting_topic ,$metting_join_url ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $from ,$metting_id , $metting_topic ,$metting_join_url )
    {
        $this->from = $from; 
        $this->metting_id = $metting_id; 
        $this->metting_topic = $metting_topic; 
        $this->metting_join_url = $metting_join_url; 
  
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
           
            'from' => $this->from ,
            'metting_id' => $this->metting_id ,
            'metting_topic' => $this->metting_topic ,
            'metting_join_url' => $this->metting_join_url ,
        ];
    }
}
