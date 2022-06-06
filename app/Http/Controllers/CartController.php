<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Cart;
use \App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        return view('cart', compact('cart'));
    }

    public function store(Product $product)
    {
        return $product;
    }
}
