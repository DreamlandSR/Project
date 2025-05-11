<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\productimages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//route Home
route::get('/', [HomeController::class, 'index'])->name('index');
route::get('/about', [HomeController::class, 'about'])->name('about');
route::get('/product', [HomeController::class, 'product'])->name('product');

//route login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//route register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

//route admin
Route::get('/AdminPage', [AdminController::class, 'index'])->name('AdminPage');
// Jika kamu ingin menangani POST
Route::post('/AdminPage', [AdminController::class, 'store']);


//route product
Route::get('/ProductPage', [ProductController::class, 'index'])->name('products.index');
Route::get('/product-image/{id}', [ProductController::class, 'showImage'])->name('product.image');
Route::resource('/dashboard/products', ProductController::class); 

//route profile
route::get('/ProfilePage', function() {
    return view("dashboard.profile");
});

//route pengiriman
route::get('/PengirimanPage', function() {
    return view('dashboard.pengiriman');
});

//route pengaturan
route::get('/PengaturanPage', function() {
    return view('dashboard.pengaturan');
});

require __DIR__.'/auth.php';