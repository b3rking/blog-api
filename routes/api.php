<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// routessss

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers')->group(function() {
	Route::apiResource('comments', 'CommentController');
});

Route::namespace('App\Http\Controllers')->middleware('auth:sanctum')->group(function() {
	Route::apiResource('posts', 'PostController');
});

Route::namespace('App\Http\Controllers')->group(function() {
	Route::apiResource('users', 'UserController');
});


// authentication

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);