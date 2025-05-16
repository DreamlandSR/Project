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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/terlaris', [AdminController::class, 'produkTerlaris'])->name('admin.terlaris');


//route Product
Route::get('/ProductPage', [ProductController::class, 'index'])->name('products.index');
Route::get('/product-image/{id}', [ProductController::class, 'showImage'])->name('product.image');
Route::resource('/dashboard/products', ProductController::class);

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
Route::get('/galeri', [ProductController::class, 'showGallery'])->name('produk.galeri');


//route login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//route register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

//route admin
Route::middleware('auth')->get('/AdminPage', [AdminController::class, 'index'])->name('admin');

Route::get('PesananPage', [OrderController::class, 'index'])->name('pesanan.page');

route::get('/ProfilePage', function () {
    return view("dashboard.profile");
});

Route::get('/PengirimanPage', [PengirimanController::class, 'index'])->name('pengiriman.index');
Route::resource('/dashboard/pengiriman', PengirimanController::class);


route::get('/PengaturanPage', function () {
    return view('dashboard.pengaturan');
});

route::get('forgotPassword', [PasswordResetLinkController::class, 'create'])->name('forgot-password');

// Debug route - Hanya untuk testing (hapus setelah selesai)
Route::get('/debug-image-data/{id}', function ($id) {
    $image = App\Models\ProductImages::find($id);

    if (!$image) {
        return response()->json(['error' => 'Image not found'], 404);
    }

    // Ambil 4 byte pertama untuk deteksi signature
    $firstBytes = substr($image->image_product, 0, 4);
    $hexSignature = bin2hex($firstBytes);

    return response()->json([
        'id' => $image->id,
        'product_id' => $image->product_id,
        'size_bytes' => strlen($image->image_product),
        'mime_type' => $image->mime_type,
        'hex_signature' => $hexSignature,
        'expected_format' => match (true) {
            str_starts_with($hexSignature, 'ffd8ff') => 'JPEG',
            str_starts_with($hexSignature, '89504e47') => 'PNG',
            default => 'UNKNOWN/TIDAK DIKENAL'
        }
    ]);
});

require __DIR__ . '/auth.php';
