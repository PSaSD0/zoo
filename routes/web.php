<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articles', [App\Http\Controllers\WebController::class, 'articles'])->name('articles');
Route::get('/contacts', [App\Http\Controllers\WebController::class, 'contacts'])->name('contacts');
