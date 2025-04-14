<?php

use illuminate\http\Request;
use Illuminate\Support\Facades\Route;
use http\Env\Response;
use App\Http\Controllers\Authantification;

route::prefix('Auth')->group(function(){
    Route::middleware(['guest'])->group(function () {
        Route::get('/register',[Authantification::class, 'showRegisterForm'])->name('Auth.showRegisterForm');
        Route::post('/CreeUser',[Authantification::class, 'register'])->name('Auth.CreeUser');
        Route::get('/login',[Authantification::class, 'showLoginForm'])->name('Auth.showLoginForm');
        Route::post('/login',[Authantification::class, 'login'])->name('Auth.login');
    });

});
////route::get('/', function(){
//    return response()->json(['message' => 'User Created Failed'],200);
//
//});
