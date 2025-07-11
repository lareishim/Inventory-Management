<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('admin.products', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image_path' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $path = $request->file('image_path')->store('images', 'public');

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_path' => $path
        ]);

        return redirect()->route('admin.products')->with('success', 'Product added.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $data = $request->only(['name', 'category_id', 'price', 'stock']);

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('images', 'public');
            $data['image_path'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted.');
    }
}