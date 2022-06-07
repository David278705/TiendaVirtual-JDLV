<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use App\Models\Category;

class ProductListViewController extends Controller
{
    public function index($category = null)
    {  
        if($category){
            $products = Category::with('product')->where('name', $category)->get(); 
            return view('dashboard', compact('products'));
        }    
        $products = Category::with('product')->get();
        return view('dashboard', compact('products'));
    }
}
