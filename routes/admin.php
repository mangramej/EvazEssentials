<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
	Route::get('/products', ProductController::class)->name('admin.products');		
});
