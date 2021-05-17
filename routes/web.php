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
        Route::get('/excel', [App\Http\Controllers\PostController::class, 'export'])->name('export');
        Route::get('/file', [App\Http\Controllers\PostController::class, 'showuploadFile'])->name('show_upload_file');
        Route::post('/file', [App\Http\Controllers\PostController::class, 'uploadFile'])->name('upload_file');
        Route::put('/confcreate', [App\Http\Controllers\PostController::class, 'confCreate'])->name('conf_create');
        Route::put('/confedit/{id}', [App\Http\Controllers\PostController::class, 'confEdit'])->name('conf_edit');
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
        Route::get('/user_show', [App\Http\Controllers\ProfileController::class, 'userShow'])->name('user_show');
        Route::get('/user_edit', [App\Http\Controllers\ProfileController::class, 'userEdit'])->name('user_edit');
        Route::put('/user_update', [App\Http\Controllers\ProfileController::class, 'userUpdate'])->name('user_update');
        Route::get('/user_changepass/{id}', [App\Http\Controllers\ProfileController::class, 'userChangePass'])->name('user_changepass');
        Route::put('/userconfcreate', [App\Http\Controllers\ProfileController::class, 'confCreate'])->name('userconf_create');
        Route::put('/userconfedit/{id}', [App\Http\Controllers\ProfileController::class, 'confEdit'])->name('userconf_edit');
        Route::put('/personalconfedit/{id}', [App\Http\Controllers\ProfileController::class, 'personalUserEdit'])->name('personalconf_edit');
    });
   
});