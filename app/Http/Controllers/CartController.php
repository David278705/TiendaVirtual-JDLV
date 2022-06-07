<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Cart;
use \App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();
        $cart = Cart::with('user', 'product')->get();
        return view('cart', compact('cart', 'user'));
    }

    public function store(Request $request)
    {
        
        if(Auth::user()){

            $user = Auth::user()->id;   
            $products = Product::all();
            $cart = new Cart();
            $cart->fill([
                'product_id' => $request->id,
                'user_id' => $user,
            ]);
            $cart->save();
    
            return response()->json([
                'saved' => true,
                'product' => $products
            ]);

        }

        else{
            $products = Product::all();
            return response()->json([
                'saved' => false,
                'product' => $products
            ]);
        }
    }

    public function delete(Cart $cart)
    {
        $cart -> delete();
        return response()->json([
            'deleted' => true,
        ]);
    }
}
