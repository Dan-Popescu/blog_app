<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::resource('articles', ArticleController::class)->only(['create', 'store', 'update', 'destroy']);

Route::middleware('auth')->group(function () {
    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Articles
    // Route::resource('articles', ArticleController::class)->only(['create', 'store', 'update', 'destroy']);

});

// NON PROTECTED ROUTES
// ARTICLES
Route::resource('articles', ArticleController::class)->only(['index', 'show']);


require __DIR__.'/auth.php';
