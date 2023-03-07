<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('/products', 'admin.products')->name('admin.products');
    Route::view('/categories', 'admin.categories')->name('admin.categories');
});
