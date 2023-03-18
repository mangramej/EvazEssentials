<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $categories = Category::inRandomOrder()
    //     ->with(['products' => function ($query) {
    //         $query->inRandomOrder()
    //             ->limit(5);
    //     }, 'products.previewImages'])
    //     ->select('id', 'name', 'path')
    //     ->limit(4)
    //     ->get();

    $products = Product::with(['previewImages', 'category'])->get();

    return view('welcome', compact('products'));
})->name('welcome');

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/p', function() {
    $products = Product::all();

    return view('product', compact('products'));
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
