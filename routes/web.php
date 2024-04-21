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


Route::middleware('auth')->group(function () {
    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('articles', ArticleController::class)->only(['create', 'store', 'update', 'destroy', 'edit']);

    Route::get('/my-articles', [ArticleController::class, 'userArticles'])->name('articles.user');
});
Route::resource('articles', ArticleController::class)->only(['index', 'show']);


// Route::resource('/', ArticleController::class);

// Route::resource('articles', ArticleController::class);

require __DIR__.'/auth.php';
