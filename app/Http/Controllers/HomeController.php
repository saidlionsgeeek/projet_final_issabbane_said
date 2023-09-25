<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $productsshuffle = Product::all()->shuffle()->take(3);
        $awesomes = Product::all()->shuffle()->take(8);
        $latestProducts = Product::latest()->take(4)->get();
        $bestsellers = Product::where('stock', '<=', 5)->get();
        $productusers = ProductUser::all();
        return view("frontend.pages.home",compact("products","productsshuffle","latestProducts","awesomes","bestsellers","productusers"));
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
        toastr()->success('subscribed Successfully!');
        return redirect()->back();
    }
}
