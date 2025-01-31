<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Middleware\UserMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FavouriteController;
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//user routes
Route::middleware(['auth','userMiddleware'])->group(function(){

    Route::get('dashboard', [UserController::class,'index'])->name('dashboard');
    Route::get('favourite', [FavouriteController::class,'index'])->name('user.favourite');

});
//Admin routes
Route::middleware(['auth','adminMiddleware'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard');

});
