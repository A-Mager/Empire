<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUser extends Mailable
{
    //Mail class that will send a mail to the user inbox

    use Queueable, SerializesModels;

    //Declare all variables that will be used in this class
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
        //Set variables from the controller
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
        //Merge the given variables with the mail. (resources/views/emails/contact)
        return $this->markdown('emails.contact')
            ->subject($this->subject);
    }
}
