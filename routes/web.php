<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

Route::middleware('auth')->group(function () {
    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Articles
    Route::resource('articles', ArticleController::class)->only(['create', 'store', 'update', 'destroy']);
    Route::get('/my-articles', [ArticleController::class, 'userArticles'])->name('articles.user');
});

// NON PROTECTED ROUTES
// ARTICLES
Route::resource('articles', ArticleController::class)->only(['index', 'show']);


// Route::resource('/', ArticleController::class);

// Route::resource('articles', ArticleController::class);

require __DIR__.'/auth.php';
