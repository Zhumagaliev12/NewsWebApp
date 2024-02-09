<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MyClassController;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return Route::redirect('posts.index');
});

Route::resource('posts', MyClassController::class);

Route::get('main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('about', 'App\Http\Controllers\AboutController@index')->name('main.about');
Route::get('contact', 'App\Http\Controllers\ContactController@index')->name('main.contact');

Route::get('posts/category/{cat}', 'App\Http\Controllers\MyClassController@cat');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


