<?php

use illuminate\http\Request;
use Illuminate\Support\Facades\Route;
use http\Env\Response;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
});
Route::middleware('auth')->group(function () {
    Route::get('admin',function(){
        return view('Backoffice.Dashboard');
    });
    Route::get('Etudiant',function(){
        return view('Frontoffice.ProfilEtudiant');
    });

});


Route::prefix('Auth')->name('Auth.')->group(function () {
    Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
