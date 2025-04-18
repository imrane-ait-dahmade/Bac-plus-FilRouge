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
        Route::get('/etablissements', function () {
            return view('Backoffice.Etablissements');
        })->name('Etablissements');
        Route::get('/etablissements/create', [EtablissementController::class, 'create'])->name('Etablissements.create');
        Route::post('/etablissements', [EtablissementController::class, 'store'])->name('etablissements.store');
    });

    Route::middleware('role:etudiant')->group(function () {
        Route::get('etudiant', function () {
            return view('Frontoffice.home');

        })->name('etudiant_dashboard');
        Route::get('/etablissements', [EtablissementController::class , 'index'])->name('Etablissements');
        Route::get('/etablissements/{etablissement}',[EtablissementController::class , 'show'])->name('etablissement.show');
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

//if(Request(401)){
//    Route::get('/404page', function () {
//        return view('404');
//    });
//}

