<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.welcome');
});
Route::get('/login', function () {
    return view('Pages.login');
});

