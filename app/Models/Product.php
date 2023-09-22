<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'description',
    'image',
    'stock',
    'price',
    "user_id",
    "category_id",
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function userss(){
        return $this->belongsToMany(User::class,'product_users');
    }
}
