<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use App\Models\Category;

class ProductViewController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get(); 
        $categories = Category::all();
        return view('products.add', compact('products', 'categories'));
    }
}
