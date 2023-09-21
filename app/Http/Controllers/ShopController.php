<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){
        $bestsellers = Product::where('stock', '<=', 5)->get();
        $categories = Category::all();
        $products= Product::latest()->paginate(9);
        return view("frontend.pages.shop",compact('bestsellers',"categories","products"));
    }

    
    public function filterProducts(Request $request)
    {
        $categoryId = $request->input('category');
    
        $query = Product::query();
    
        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }
    
        $products = $query->paginate(9);
        $bestsellers = Product::where('stock', '<=', 5)->get();
        $categories = Category::all();
    
        return view("frontend.pages.shop", compact('bestsellers', 'categories', 'products'));
    }
}

