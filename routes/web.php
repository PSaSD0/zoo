<?php

use Illuminate\Support\Facades\Route;

Route::get('/', action: [App\Http\Controllers\WebController::class, 'home'])->name('index');


Auth::routes();

Route::post('/reviews', [App\Http\Controllers\WebController::class, 'store'])->name('reviews.store');
Route::get('/catalog', [App\Http\Controllers\WebController::class, 'catalog'])->name('catalog');
Route::get('/card/{id}', [App\Http\Controllers\WebController::class, 'card'])->name('card');
Route::get('/articles', [App\Http\Controllers\WebController::class, 'articles'])->name('articles');
Route::get('/article/{id}', [App\Http\Controllers\WebController::class, 'article'])->name('article');
Route::get('/contacts', [App\Http\Controllers\WebController::class, 'contacts'])->name('contacts');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

Route::post('/addProduct', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('addProduct');

Route::post('/addCategory', [App\Http\Controllers\AdminController::class, 'addCategory'])->name('addCategory');
Route::delete('/dellCategory', [App\Http\Controllers\AdminController::class, 'dellCategory'])->name('dellCategory');

Route::post('/addArticle', [App\Http\Controllers\AdminController::class, 'addArticle'])->name('addArticle');
