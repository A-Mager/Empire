<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use App\Mail\ContactUser;
use App\Mail\ContactAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){
        return view('welcome');
    }

    public function store(Request $request){



        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'content' => ['required', 'min:1', 'max:1200'],
            'g-recaptcha-response' => 'required|captcha',
        ]);



        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $subject = $request->subject;
        $content = $request->input('content');


        //Send mail to the user as verification
        Mail::to($email)
            ->send(new ContactUser($name, $email, $phone, $subject, $content));

        //Send mail to the company as a new request
        Mail::to('angelo@unfolded.nl')
            ->send(new ContactAdmin($name, $email, $phone, $subject, $content));

        //Return a response to the request
        return redirect('/')
        ->with('message','Email verstuurd!');

    }
}
