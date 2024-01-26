<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MyClassController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Route::redirect('posts.index');
});

Route::resource('posts', MyClassController::class);

//Route::get('/index', 'App\Http\Controllers\MyClassController@index')->name('posts.index');
//Route::get('/index/create', 'App\Http\Controllers\MyClassController@create')->name('posts.create');
//Route::post('/index', 'App\Http\Controllers\MyClassController@store')->name('posts.store');
//Route::get('/index/{id}', 'App\Http\Controllers\MyClassController@show')->name('posts.show');
//Route::get('/index/{id}/edit', 'App\Http\Controllers\MyClassController@edit')->name('posts.edit');
//Route::put('/index/{id}', 'App\Http\Controllers\MyClassController@update')->name('posts.update');
