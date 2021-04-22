<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// routessss

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('App\Http\Controllers')->group(function() {
	Route::middleware('auth:api')->apiResource('/users', 'UserController');
});

Route::namespace('App\Http\Controllers')->group(function() {
	Route::apiResource('/comments', 'CommentController');
});

Route::namespace('App\Http\Controllers')->middleware('auth:sanctum')->group(function() {
	Route::apiResource('posts', 'PostController');
});

Route::namespace('App\Http\Controllers')->group(function() {
	Route::apiResource('users', 'UserController');
});