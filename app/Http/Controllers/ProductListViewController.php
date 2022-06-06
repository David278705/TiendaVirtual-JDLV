<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use App\Models\Category;

class ProductListViewController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get(); 
        $categories = Category::all();
        return view('dashboard', compact('products', 'categories'));
    }
}
