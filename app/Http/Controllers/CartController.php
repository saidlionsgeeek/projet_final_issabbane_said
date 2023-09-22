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
        toastr()->success('You added items to cart successfully!');
        return redirect()->back();
    }

    public function increment(ProductUser $productuser){
        $product = Product::find($productuser->product_id);
        if ($product->stock > 0) {
            $productuser->increment('stock');
            $product->stock -= 1;
            $product->save();
            toastr()->success('You added items to cart successfully!');
            return back();
        }
        toastr()->error('Stock Out!');
            return back();
    }
    
    public function decrement(ProductUser $productuser){
        $product = Product::find($productuser->product_id);
        
        if ($productuser->stock > 1) {
            $productuser->decrement('stock');
            $product->stock += 1;
            $product->save();
        }else {
            $product->stock += 1;
            $product->save();
            $productuser->delete();
        }
        toastr()->success('Items remove from cart successfully!');
        return back();
    }
}
