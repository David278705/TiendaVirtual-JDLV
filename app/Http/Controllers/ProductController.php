<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $product = new Product($request->all());  
        $product->save();
        return response()->json([
            'saved' => true,
            'product' => $product->load('category')
        ]);
    }
}
