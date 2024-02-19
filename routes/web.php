<?php

use App\Http\Controllers\MyClassController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return Route::redirect('posts.index');
});

Route::middleware('auth')->group(function (){
    Route::resource('posts', MyClassController::class)->except('index', 'show');
    Route::post('/logout', [App\Http\Controllers\Auth2\LoginController::class, 'logout'])->name('logout');
});

Route::resource('posts', MyClassController::class)->only('index', 'show');

Route::get('posts/category/{category}', 'App\Http\Controllers\MyClassController@postsByCategory')->name('posts.category');
Route::post('comment/show', 'App\Http\Controllers\CommentController@commentStore')->name('show.comment');
Route::post('comments/destroy/{id}', 'App\Http\Controllers\CommentController@commentDestroy')->name('comment.destroy');

Route::get('main', 'App\Http\Controllers\Test\MainController@index')->name('main.index');
Route::get('about', 'App\Http\Controllers\Test\AboutController@index')->name('main.about');
Route::get('contact', 'App\Http\Controllers\Test\ContactController@index')->name('main.contact');

//Auth::routes();

//Route::middleware('hasrole:admin')->group(function (){
//   Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
//   Route::get('/admin/posts', [AdminController::class, 'showPosts'])->name('admin.posts');
//});

Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
Route::get('/admin/posts', [AdminController::class, 'showPosts'])->name('admin.posts');

Route::get('/register', [App\Http\Controllers\Auth2\RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [App\Http\Controllers\Auth2\RegisterController::class, 'register'])->name('register');


Route::get('/login', [App\Http\Controllers\Auth2\LoginController::class, 'index'])->name('login.form');
Route::post('/login', [App\Http\Controllers\Auth2\LoginController::class, 'login'])->name('login');


