<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// routessss

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response(['data' => $request->user()], [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ]);
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