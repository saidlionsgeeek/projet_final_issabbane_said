<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\User;

class InfoController extends Controller
{
    public function index(){
        $infos = Info::all();
        return view('backend.pages.info',compact("infos"));
    }

    public function update (Request $request , Info $info) {
        $request->validate([
            "city" => "required",
            "avenue" => "required",
            "phone" => "required",
            "worktime" => "required",
            "email" => "required",
            "text" => "required"
        ]);

        $info->update([
            "city" => $request->city,
            "avenue" => $request->avenue,
            "phone" => $request->phone,
            "worktime" => $request->worktime,
            "email" => $request->email,
            "text" => $request->text
        ]);
        
        return redirect()->back();
    }
}
