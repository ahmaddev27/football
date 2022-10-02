<?php

namespace App\Notifications;

use App\Models\Article;
use App\Models\inbox;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class ContactNotification extends Notification
{
    use Queueable;

    private $inbox,$time,$date;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(inbox $inbox)
    {
        $this->inbox=$inbox;
        $this->date = date("Y-m-d", strtotime(Carbon::now()));
        $this->time = date("h:i A", strtotime(Carbon::now()));
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
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [

            'id'=>$this->inbox->id,
            'time'=>$this->time,
            'date'=>$this->date,
            'title'=> 'رسالة جديدة : '.str_limit($this->inbox->title,50),
            'created_at'=> $this->inbox->created_at,
            'url'=> '../dashboard/inbox/'.$this->inbox->id,

        ];
    }
}
