<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;


class SinglePageController extends Controller
{
    public function index(Product $product){
        $bestsellers = Product::where('stock', '<=', 5)->get();
        $productusers = ProductUser::all();
        return view("frontend.pages.single_page",compact("product","bestsellers","productusers"));
    }
}
