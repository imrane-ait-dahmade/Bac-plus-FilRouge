<?php
//
//use App\Http\Controllers\Authantification;
//use Illuminate\Support\Facades\Route;
//
//Route::get('/', function () {
//    return view('Pages.welcome');
//});
////Route::get('/login', function () {
////    return view('Pages.login');
////});
////Route::get('/register', function () {
////    return view('Pages.signup');
////});
//route::prefix('Auth')->group(function(){
//    Route::middleware(['guest'])->group(function () {
//        Route::get('/register',[Authantification::class, 'showRegisterForm'])->name('Auth.showRegisterForm');
//        Route::post('/CreeUser',[Authantification::class, 'register'])->name('CreeUser');
//    });
//});
//
//
//Route::Post('/register', [\App\Http\Controllers\Authantification::class, 'register']);
