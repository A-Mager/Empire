<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $subject;
    public $content;


    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $email
     * @param $phone
     * @param $subject
     * @param $message
     */
    public function __construct($name, $email, $phone, $subject, $content)
    {

        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->content = $content;

//        dd($this);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newRequest')
            ->subject('Betreft:' .$this->subject);
    }
}
