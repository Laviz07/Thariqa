<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/materi', [MateriController::class, 'index'])->name('materi');
Route::get('/materi/search', [MateriController::class, 'search'])->name('materi.search');
Route::get('/materi/{slug}', [MateriController::class, 'show'])->name('materi.detail');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/admin/logout', function (Request $request) {
    auth('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home'); // Redirect ke home page
})->name('filament.admin.auth.logout');