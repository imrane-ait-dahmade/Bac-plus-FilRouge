<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.welcome');
});
Route::get('/login', function () {
    return view('Pages.login');
});
Route::get('/register', function () {
    return view('Pages.signup');
});

Route::Post('/register', [\App\Http\Controllers\Authantification::class, 'register']);
