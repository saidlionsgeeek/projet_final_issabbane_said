<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class SinglePageController extends Controller
{
    public function index(Product $product){
        return view("frontend.pages.single_page",compact("product"));
    }
}
