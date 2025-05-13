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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/terlaris', [AdminController::class, 'produkTerlaris'])->name('admin.terlaris');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
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

//route login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//route register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

//route admin
Route::middleware('auth')->get('/AdminPage', [AdminController::class, 'index'])->name('admin');

route::get('/ProductPage', function () {
    return view("dashboard.product");
});

route::get('/ProfilePage', function () {
    return view("dashboard.profile");
});

route::get('/PengirimanPage', function () {
    return view('dashboard.pengiriman');
});

route::get('/PengaturanPage', function () {
    return view('dashboard.pengaturan');
});

route::get('forgotPassword', [PasswordResetLinkController::class, 'create'])->name('forgot-password');

require __DIR__ . '/auth.php';
