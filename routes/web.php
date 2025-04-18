<?php

use App\Http\Controllers\EtablissementController;
use illuminate\http\Request;
use Illuminate\Support\Facades\Route;
use http\Env\Response;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;


Route::get('/', function () {
    return view('home');
});
Route::middleware('auth')->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::get('admin', function () {
            return view('Backoffice.Dashboard');
        })->name('admin_dashboard');
        Route::get('/etablissementsCrud', function () {
            return view('Backoffice.Etablissements');
        });
    });

    Route::middleware('role:etudiant')->group(function () {
        Route::get('etudiant', function () {
            return view('Frontoffice.home');
        })->name('etudiant_dashboard');

        Route::get('/etablissements', [EtablissementController::class , 'index'])->name('Etablissements');
    });
});





Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login_post');
        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register_post');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('Deconnexion');

});

Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

