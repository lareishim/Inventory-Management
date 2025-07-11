<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

use App\Models\Product;
use App\Models\Category;

Route::get('/products', function () {
    $products = Product::with('category')->get();
    $categories = Category::all();
    return view('pages.products', compact('products', 'categories'));
})->name('products');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Include auth routes
require __DIR__ . '/auth.php';