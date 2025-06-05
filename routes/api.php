<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);


Route::get('/cek-api', function () {
    return response()->json(['message' => 'API terhubung!']);
});

Route::prefix('favorites')->group(function () {
    // Get user favorites - GET /api/favorites/{userId}
    Route::get('/{userId}', [FavoriteController::class, 'getFavorites'])
         ->where('userId', '[0-9]+');
    
    // Toggle favorite - POST /api/favorites/toggle
    Route::post('/toggle', [FavoriteController::class, 'toggleFavorite']);
    
    // Check if favorited - GET /api/favorites/check/{userId}/{productId}
    Route::get('/check/{userId}/{productId}', [FavoriteController::class, 'checkFavorite'])
         ->where(['userId' => '[0-9]+', 'productId' => '[0-9]+']);
});


// Favorites routes (dari sebelumnya)
Route::prefix('favorites')->group(function () {
    Route::get('/{userId}', [FavoriteController::class, 'getFavorites'])
         ->where('userId', '[0-9]+');
    
    Route::post('/toggle', [FavoriteController::class, 'toggleFavorite']);
    
    Route::get('/check/{userId}/{productId}', [FavoriteController::class, 'checkFavorite'])
         ->where(['userId' => '[0-9]+', 'productId' => '[0-9]+']);
});