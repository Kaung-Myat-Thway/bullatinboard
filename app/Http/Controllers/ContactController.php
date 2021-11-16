<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('users.contact');
    }

    public function contactSubmit(Request $request)
    {
            Mail::send('emails.contactemail',[
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'msg'=>$request->msg,
            ],function($mail) use ($request) {
                $mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
                $mail->to('scm.kaungmyatthway@gmail.com')->subject('Contact us message');
            
            });

            Return "Message has been sent successfully";
    }
}
