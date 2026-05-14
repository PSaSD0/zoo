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
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

Route::post('/addProduct', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('addProduct');
Route::delete('/dellProduct', [App\Http\Controllers\AdminController::class, 'dellProduct'])->name('dellProduct');
Route::get('/editProductView/{id}', [App\Http\Controllers\AdminController::class, 'editProductView'])->name('editProductView');
Route::post('/editProduct/{id}', [App\Http\Controllers\AdminController::class, 'editProduct'])->name('editProduct');

Route::post('/addCategory', [App\Http\Controllers\AdminController::class, 'addCategory'])->name('addCategory');
Route::delete('/dellCategory', [App\Http\Controllers\AdminController::class, 'dellCategory'])->name('dellCategory');

Route::post('/addArticle', [App\Http\Controllers\AdminController::class, 'addArticle'])->name('addArticle');
Route::delete('/dellArticle', [App\Http\Controllers\AdminController::class, 'dellArticle'])->name('dellArticle');
Route::get('/editArticleView/{id}', [App\Http\Controllers\AdminController::class, 'editArticleView'])->name('editArticleView');
Route::post('/editArticle/{id}', [App\Http\Controllers\AdminController::class, 'editArticle'])->name('editArticle');

Route::post('/editNumber', [App\Http\Controllers\AdminController::class, 'editNumber'])->name('editNumber');
Route::post('/editEmail', [App\Http\Controllers\AdminController::class, 'editEmail'])->name('editEmail');
Route::post('/editAdress', [App\Http\Controllers\AdminController::class, 'editAdress'])->name('editAdress');
Route::post('/editMap', [App\Http\Controllers\AdminController::class, 'editMap'])->name('editMap');

