<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\ProductUser;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $infos = Info::all();
        $productusers = ProductUser::all();
        return view("frontend.pages.contact",compact("infos",'productusers'));
    }
}
