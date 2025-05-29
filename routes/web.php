<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\OtpResetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Models\Pengiriman;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/terlaris', [AdminController::class, 'produkTerlaris'])->name('admin.terlaris');
});


//route Product
Route::get('/ProductPage', [ProductController::class, 'index'])->name('products.index');
Route::get('/product-image/{id}', [ProductController::class, 'showImage'])->name('product.image');
Route::resource('/dashboard/products', ProductController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // << TAMBAHKAN INI
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
});


//route reset password (otp)
Route::get('/verify-otp', [OtpResetController::class, 'showVerifyForm'])->name('otp.verify.form');
Route::post('/verify-otp', [OtpResetController::class, 'verifyOtp'])->name('otp.verify');
Route::get('/reset-password/{email}', [OtpResetController::class, 'showResetPasswordForm'])->name('password.reset.form');
Route::post('/reset-password/{email}', [OtpResetController::class, 'resetPassword'])->name('otp.reset.password');
Route::get('/forgot-password-otp', [OtpResetController::class, 'showRequestForm'])->name('otp.request');
Route::post('/send-otp', [OtpResetController::class, 'sendOtp'])->name('otp.send');


//route Home
route::get('/', [HomeController::class, 'index'])->name('index');
route::get('/about', [HomeController::class, 'about'])->name('about');
route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/galeri', [ProductController::class, 'showGallery'])->name('produk.galeri');


//route login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//route register
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

//route admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/AdminPage', [AdminController::class, 'index'])->name('admin');
    // Route admin lainnya bisa ditambahkan di sini
});

Route::get('PesananPage', [OrderController::class, 'index'])->name('pesanan.page');
Route::get('/order/{order}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::put('/order/{order}', [OrderController::class, 'update'])->name('order.update');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');

//Route Detail pesanan
Route::get('DetailOrder', [OrderController::class, 'detailOrder'])->name('detail.page');

//Route Payment
Route::get('PaymentPage', [PaymentController::class, 'index'])->name('payment.page');


route::get('/ProfilePage', function () {
    return view("dashboard.profile");
});

//route pengiriman
Route::get('/PengirimanPage', [PengirimanController::class, 'index'])->name('pengiriman.index');
Route::delete('pengiriman/{pengiriman}',[PengirimanController::class, 'destroy'])->name('pengiriman.destroy');
Route::put('/pengiriman/{pengiriman}/edit', [PengirimanController::class, 'update'])->name('pengiriman.update');
Route::get('/pengiriman/create', [PengirimanController::class, 'create'])->name('pengiriman.create');
Route::post('/pengiriman', [PengirimanController::class, 'store'])->name('pengiriman.store');

route::get('/PengaturanPage', function () {
    return view('dashboard.pengaturan');
});

route::get('forgotPassword', [PasswordResetLinkController::class, 'create'])->name('forgot-password');

require __DIR__ . '/auth.php';
