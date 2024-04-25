<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;

Route::get('lang/{lang}', [LanguageController::class, 'changeLanguage'])->name('lang.switch');

Route::middleware('locale')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth', 'locale'])->group(function () {

    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('articles', ArticleController::class)->only(['create', 'store', 'update', 'destroy', 'edit']);

    Route::get('/my-articles', [ArticleController::class, 'userArticles'])->name('articles.user');

    Route::prefix('/categories')->name('categories.')->group(function () {
        Route::get('/manage', [CategoryController::class, 'manageCategories'])->name('manage');
        Route::get('/delete', [CategoryController::class, 'showDeleteCategories'])->name('delete.show');
        Route::delete('/delete', [CategoryController::class, 'deleteCategories'])->name('delete');
    });

    Route::resource('/users', UserController::class);

    Route::resource('/categories', CategoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);
});

Route::middleware('locale')->group(function () {
    Route::resource('articles', ArticleController::class)->only(['index', 'show']);
});
        

require __DIR__.'/auth.php';
