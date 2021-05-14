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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('welcome');


Route::group(['middleware' => 'auth'], function () {
    
    Route::group(['prefix' => 'post'],function() {
        Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('post');
        Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post_create');
        Route::post('/create', [App\Http\Controllers\PostController::class, 'store'])->name('post_store');
        Route::delete('/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post_destroy');
        Route::get('/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post_edit');
        Route::put('/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post_update');
        // Route::get('/create_csv', [App\Http\Controllers\PostController::class, 'csvCreate'])->name('csv_create');
        // Route::post('/create_csv', [App\Http\Controllers\PostController::class, 'csvStore'])->name('csv_store');
        Route::get('/excel', [App\Http\Controllers\PostController::class, 'export'])->name('export');
        Route::get('/file', [App\Http\Controllers\PostController::class, 'showuploadFile'])->name('show_upload_file');
        Route::post('/file', [App\Http\Controllers\PostController::class, 'uploadFile'])->name('upload_file');
    });
    Route::get('changeStatus', 'UserController@changeStatus');

    Route::group(['prefix' => 'profile'],function() {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::get('/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('profile_create');
        Route::post('/create', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile_store');
        Route::delete('/destroy/{id}', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile_destroy');
        Route::get('/edit/{id}', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile_edit');
        Route::put('/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile_update');
        Route::get('/show/{id}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile_show');
        Route::get('/changePass/{id}', [App\Http\Controllers\ProfileController::class, 'changePass'])->name('change_pass');
    });
   
});

Route::get('change-status-post', [App\Http\Controllers\PostController::class, 'changestatuspost'])->name('change-status-post');