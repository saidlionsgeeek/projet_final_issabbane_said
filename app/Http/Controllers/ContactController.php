<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $infos = Info::all();
        return view("frontend.pages.contact",compact("infos"));
    }
}
