<?php

namespace App\Http\Controllers;
use \App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexchosen(Category $category)
    {
        $products = Product::all();
        return view('catchosen', compact('products', 'category'));
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = new Category($request->all());  
        $category->save();
        return response()->json([
            'saved' => true,
        ]);
    }
    public function delete(Category $category)
    {
        $category -> delete();
        return response()->json([
            'deleted' => true,
        ]);
        
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json([
            'updated' => true,
        ]);
    }
}
