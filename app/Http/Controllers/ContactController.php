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
            'naam' => 'required',
            'email' => ['required', 'email'],
            'telefoon' => ['required', 'regex:/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/'],
            'onderwerp' => 'required',
            'inhoud' => ['required', 'min:1', 'max:1200'],
            'g-recaptcha-response' => 'required|captcha',
        ]);

        //Convert all form inputs to variables
        $name = $request->naam;
        $email = $request->email;
        $phone = $request->telefoon;
        $subject = $request->onderwerp;
        $content = $request->input('inhoud');


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
