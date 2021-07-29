<?php

use App\Http\Controllers\API\PostApiController;
use App\Http\Controllers\API\UserApiController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login',[LoginController::class,'apiLogin']);
Route::post('logout',[LoginController::class,'apiLogout']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users',UserApiController::class);
// Route::get('user_search',[UserApiController::class,'search']);
Route::post('/change_password/{id}',[UserApiController::class,'updateChangePass']);

Route::apiResource('posts',PostApiController::class);
Route::get('posts/search',[PostApiController::class,'search']);
Route::post('/exportExcel',[PostApiController::class,'export']);
Route::get('/importExcel',[PostApiController::class,'showuploadFile']);
Route::post('/importExcel',[PostApiController::class,'uploadFile']);

