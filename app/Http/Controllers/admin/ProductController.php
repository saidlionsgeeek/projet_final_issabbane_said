<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $productusers = ProductUser::all();
        return view("backend.pages.products", compact("products", "categories",'productusers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "image" => "required|image|mimes:png,jpg",
            "stock" => "required",
            "price" => "required",
            "category_id" => "required"
        ]);
        $request->file("image")->storePublicly('img/', 'public');

        $data = [
            "name" => $request->name,
            "description" => $request->description,
            "image" => $request->file("image")->hashName(),
            "stock" => $request->stock,
            "price" => $request->price,
            "user_id" => Auth::user()->id,
            "category_id" => $request->category_id,
        ];
        Product::create($data);
        toastr()->success('Product has been saved successfully!');
        return back();
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "stock" => "required",
            "price" => "required",
        ]);
        if ($request->file('image') != null) {
            
            $chair = Str::contains($request->image->getClientOriginalName(), 'Chair_');
            if (!$chair) {
                Storage::disk("public")->delete('img/' . $product->image);
            }
            $request->file("image")->storePublicly('img/', 'public');
            $data = [
                "name" => $request->name,
                "description" => $request->description,
                "image" => $request->file("image")->hashName(),
                "stock" => $request->stock,
                "price" => $request->price,
                "category_id" => $request->category_id,
            ];
            $product->update($data);
        }else{
            $data = [
                "name" => $request->name,
                "description" => $request->description,
                "stock" => $request->stock,
                "price" => $request->price,
                "category_id" => $request->category_id,
            ];
            $product->update($data);
        }
        toastr()->success('Product has been saved successfully!');
        return back();
    }
    
    public function destroy(Product $product){
        $product->delete();
        toastr()->warning('Product has been deleted successfully!');
        return back();
    }
}
