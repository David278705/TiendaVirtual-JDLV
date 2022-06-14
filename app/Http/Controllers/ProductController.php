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
            
        $imageName = null;
        if($request->hasFile('image')) {
            $imageName = "/images/products/{$request->image->getClientOriginalName()}.{$request->image->getClientOriginalExtension()}";
            $request->image->move(public_path('images/products'), $imageName);
        }

        $product = new Product($request->all());  
        $product->image = $imageName;
        $product->save();
        return response()->json([
            'saved' => true,
            'product' => $product->load('category')
        ]);
    }

    public function storeProduct(Product $product)
    {
        return view('products.productdetail', compact('product'));
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
