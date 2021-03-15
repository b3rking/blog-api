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