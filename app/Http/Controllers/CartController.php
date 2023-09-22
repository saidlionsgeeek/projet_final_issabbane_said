<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductUser;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $productusers = ProductUser::all();
        return view("frontend.pages.cart",compact("productusers"));
    }

    public function store(Product $product , User $user){
        $product->stock -= 1;
        $product->save();
        $checkproduct = ProductUser::where("product_id",$product->id)->first();
        $checkuser = ProductUser::where("user_id",$user->id)->first();
        if ($checkproduct && $checkuser) {
            $checkproduct->stock += 1 ;
            $checkproduct->save();
        }else{
            ProductUser::create([
            "product_id" => $product->id,
            "user_id" => $user->id,
            "stock" => 1
        ]);
        }

        
        return redirect()->back();
    }
}
