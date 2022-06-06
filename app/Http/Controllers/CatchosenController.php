<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CatchosenController extends Controller
{
    public function index(Category $category)
    {
        $products = Product::all();
        return view('catchosen', compact('products', 'category'));
    }
}
