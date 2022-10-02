<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplayMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;

    }


    public function build()
    {
        $data=$this->data;
        return  $this->from(setting('email',setting('name')))->view('dashboard.inbox.mail',compact('data'))
            ->subject('رداً على الرسالة المرسلة ل '.setting('name'));
    }
}
