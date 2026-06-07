<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Publik
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/department/{slug}', [DepartmentController::class, 'show'])->name('department.show');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// ===== AUTH ROUTES =====
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']);
 
// ===== ADMIN ROUTES =====
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
 
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
 
    // Manajemen Berita
    Route::resource('news', AdminNewsController::class);
 
    // Manajemen Pengguna
    Route::resource('users', UserController::class);
});
