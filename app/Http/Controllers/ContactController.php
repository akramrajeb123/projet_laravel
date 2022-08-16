<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact-us');
    }
    public function sendEmail(Request $request)
    {
        $details=[
            'email'=>$request->email,
            'name'=> $request->name,
            'msg'=>  $request->msg
            
        ];
        Mail::to('abir.nassar@isimg.tn')->send(new ContactMail($details));
        return back()->with('message_sent','your message has been sent successfully!');
    }
}