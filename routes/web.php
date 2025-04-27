<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

//route admin
route::get('/AdminPage', function() {
    return view('dashboard.admin');
});

route::get('/ProductPage', function() {
    return view("dashboard.product");
});

route::get('/ProfilePage', function() {
    return view("dashboard.profile");
});

route::get('/PengirimanPage', function() {
    return view('dashboard.pengiriman');
});

route::get('/PengaturanPage', function() {
    return view('dashboard.pengaturan');
});

require __DIR__.'/auth.php';
