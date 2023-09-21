<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\MailBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $emails = MailBox::all();
        return view("backend.pages.mailBox",compact('emails'));
    }

    public function store(Request $request){
        $request->validate([
            "message" => "required",
            "name" => "required",
            'email' => "required",
            "subject" => "required"
        ]);
        
        MailBox::create([
            "message" => $request->message,
            "name" => $request->name,
            'email' => $request->email,
            "subject" => $request->subject
        ]);
        $details = ([
            "message" => $request->message,
            "name" => $request->name,
            'email' => $request->email,
            "subject" => $request->subject
        ]);

        Mail::to("admin@admin.com")->send(new ContactMail($details));
        return redirect()->back()->with("succes",'you have send your message ');
    }

    public function checkmail(MailBox $email){
        $email->checkmail = 1;
        $email->save();
        return redirect()->back();
    }
}
