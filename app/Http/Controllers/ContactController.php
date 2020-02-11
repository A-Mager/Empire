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
        //Return the homepage when user navigates to the website
        return view('welcome');
    }

    public function store(Request $request){

        //Call the mail function when the user hits the submit button

        //Check if all inputs are valid
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/'],
            'subject' => 'required',
            'content' => ['required', 'min:1', 'max:1200'],
            'g-recaptcha-response' => 'required|captcha',
        ]);

        //Convert all form inputs to variables
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
