<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view("welcome");
// });

Route::get('/', function () {
    return redirect()->route("products.index");
});

Route::resource('products', ProductController::class);
// Route::get('/pagination/paginate-data', [ProductController::class, 'pagination']);

Route::get('/search', [ProductController::class, 'search'])->name('products.search');

