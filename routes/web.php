<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/materi', [MateriController::class, 'index'])->name('materi');
Route::get('/materi/search', [MateriController::class, 'search'])->name('materi.search');
Route::get('/materi/{slug}', [MateriController::class, 'show'])->name('materi.detail');