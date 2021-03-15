<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// routessss

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('App\Http\Controllers')->group(function() {

	Route::apiResource('/posts', 'PostController');

});

Route::get('/me', 'App\Http\Controllers\PostController@me');


Route::namespace('App\Http\Controllers')->group(function() {

	Route::apiResource('/comments', 'CommentController');

});