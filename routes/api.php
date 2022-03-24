<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//same 2tai
//auth:sanctum == auth:api
//jekono ekta likhle hobe

//sanctum auth
//Route::prefix('products')->controller(ProductController::class)->middleware('auth:sanctum')->group(function(){

//https://tutspack.com/crud-example-with-repository-design-pattern-in-laravel/
//https://tutspack.com/laravel-api-crud-with-authentication-using-sanctum/

Route::prefix('products')->controller(ProductController::class)->group(function(){
	Route::get('/', 'getAllProduct');
	Route::post('/','store');
	Route::get('/{id}','show');
	Route::post('/{id}','update');
	Route::delete('/{id}','delete');
});

Route::controller(AuthController::class)->group(function(){
	Route::post('/register','register');
	Route::post('/login', 'login')->name('login');
	Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

// Route::post('register',[AuthController::class,'register']);
// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');



