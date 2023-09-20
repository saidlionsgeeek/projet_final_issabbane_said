<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        return view("frontend.pages.home");
    }

    public function suscribemail(Request $request){
        $request->validate([
            "email" => "required",
        ]);
        if (Auth::user() ) {
            $DemoMail = Auth::user()->name;
        }else{
            $DemoMail = "user";
        }
        Mail::to($request->email)->send(new SubscribeMail($DemoMail));
        return redirect()->back()->with("success",'hhh');
    }
}
