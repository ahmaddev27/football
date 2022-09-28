<?php

namespace App\Notifications;

use App\Models\Article;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class NewPage extends Notification
{
    use Queueable;

    private $page,$time,$date;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Page $page)
    {
        $this->page=$page;
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

            'id'=>$this->page->id,
            'time'=>$this->time,
            'date'=>$this->date,
            'title'=> 'صفحة جديد : '.str_limit($this->page->title,50),
            'created_at'=> $this->page->created_at,
            'url'=> '../pages/'.$this->page->id,

        ];
    }
}
