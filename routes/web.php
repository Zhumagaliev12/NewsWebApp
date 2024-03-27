<?php

use App\Http\Controllers\MyClassController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LangController;

Route::get('', function () {
    return redirect('/posts');
});

Route::get('/lang/{lang}', [LangController::class, 'switchLang'])->name('switch.lang');

Route::middleware('auth')->group(function (){
    Route::resource('posts', MyClassController::class)->except('index', 'show');
    Route::post('/logout', [App\Http\Controllers\Auth2\LoginController::class, 'logout'])->name('logout');

    Route::get('posts/category/{category}', 'App\Http\Controllers\MyClassController@postsByCategory')->name('posts.category');
    Route::post('comment/show', 'App\Http\Controllers\CommentController@commentStore')->name('show.comment');
    Route::post('comments/destroy/{id}', 'App\Http\Controllers\CommentController@commentDestroy')->name('comment.destroy');
    Route::post('posts/{post}/rate', 'App\Http\Controllers\MyClassController@rate')->name('posts.rate');
    Route::get('posts/myPosts', 'App\Http\Controllers\MyClassController@showMyPosts')->name('posts.showMyPosts');

    Route::get('posts/search', [MyClassController::class, 'index'])->name('posts.search');

    Route::prefix('admin')->as('admin.')->group(function (){

        Route::get('/users', [AdminController::class, 'showUsers'])->name('users');
        Route::get('/users/search', [AdminController::class, 'showUsers'])->name('users.search');
        Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/ban', [AdminController::class, 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [AdminController::class, 'unban'])->name('users.unban');

        Route::get('/posts', [AdminController::class, 'showPosts'])->name('posts');
        Route::get('/posts/search', [AdminController::class, 'showPosts'])->name('posts.search');
        Route::put('/posts/{post}/publish', [AdminController::class, 'publish'])->name('posts.publish');
        Route::put('/posts/{post}/unpublish', [AdminController::class, 'unpublish'])->name('posts.unpublish');

        Route::get('/categories', [AdminController::class, 'showCategories'])->name('categories');
        Route::post('/categories', [AdminController::class, 'storeCategory'])->name('category.store');
        Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('category.destroy');

        Route::get('/roles', [AdminController::class, 'showRoles'])->name('roles');
        Route::post('/roles', [AdminController::class, 'storeRole'])->name('role.store');
        Route::delete('/roles/{role}', [AdminController::class, 'destroyRole'])->name('role.destroy');

        Route::get('/comments', [AdminController::class, 'showComments'])->name('comments');
    });

    Route::get('main', 'App\Http\Controllers\Test\MainController@index')->name('main.index');
    Route::get('about', 'App\Http\Controllers\Test\AboutController@index')->name('main.about');
    Route::get('contact', 'App\Http\Controllers\Test\ContactController@index')->name('main.contact');
});

Route::resource('posts', MyClassController::class)->only('index', 'show');

Route::get('/register', [App\Http\Controllers\Auth2\RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [App\Http\Controllers\Auth2\RegisterController::class, 'register'])->name('register');

Route::get('/login', [App\Http\Controllers\Auth2\LoginController::class, 'index'])->name('login.form');
Route::post('/login', [App\Http\Controllers\Auth2\LoginController::class, 'login'])->name('login');

//Auth::routes();

//Route::middleware('hasrole:admin')->group(function (){
//   Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
//   Route::get('/admin/posts', [AdminController::class, 'showPosts'])->name('admin.posts');
//});
