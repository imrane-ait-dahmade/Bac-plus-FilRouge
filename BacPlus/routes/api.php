<?php

use illuminate\http\Request;
use Illuminate\Support\Facades\Route;
use http\Env\Response;

Route::get('/register', [\App\Http\Controllers\Authantification::class, 'register']);
route::get('/', function(){
    return response()->json(['message' => 'User Created Failed'],200);

});
