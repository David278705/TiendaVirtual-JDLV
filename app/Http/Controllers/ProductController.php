<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listindex($category = null)
    {  
        if($category){
            $products = Category::with('product')->where('name', $category)->get(); 
            return view('dashboard', compact('products'));
        }    
        $products = Category::with('product')->get();
        return view('dashboard', compact('products'));
    }
    public function index()
    {
        $products = Product::with('category')->get(); 
        $categories = Category::all();
        return view('products.add', compact('products', 'categories'));
    }

    public function store(Request $request)
    {

        $product = new Product($request->all());  
        $product->save();
        return response()->json([
            'saved' => true,
            'product' => $product->load('category')
        ]);
    }

    public function storeProduct(Product $product)
    {
        return view('productdetail', compact('product'));
    }

    public function delete(Product $product)
    {
        $product -> delete();
        return response()->json([
            'deleted' => true,
        ]);
    }

    public function edit($product)
    {
        $categories = Category::get();
        $product = Product::findOrFail($product);
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'updated' => true,
            'product' => $product->load('category')
        ]);
    }
}
