<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'reference' => 'required|string|max:255|unique:products',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'seuil_minimum' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produit créé !');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'reference' => 'required|string|max:255|unique:products,reference,' . $product->id,
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'seuil_minimum' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produit modifié !');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé !');
    }
} 