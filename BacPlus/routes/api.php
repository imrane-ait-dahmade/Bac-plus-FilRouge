<?php

use illuminate\http\Request;
use Illuminate\Support\Facades\Route;
use http\Env\Response;
use App\Http\Controllers\Authantification;

Route::post('/register', [Authantification::class, 'register']);
route::get('/', function(){
    return response()->json(['message' => 'User Created Failed'],200);

});
