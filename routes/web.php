<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home','HomeController@index')->name('home');





Route::group(['middleware' => 'auth'], function () {

    // Route::get('/home', function () {
    //     return view('home');
    // });

    // Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
    // Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post_create');
    
    Route::group(['prefix' => 'post'],function() {
        Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('post');
        Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post_create');
        Route::get('/show', [App\Http\Controllers\PostController::class, 'show'])->name('post_show');
        Route::get('/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post_edit');
    });
    
});