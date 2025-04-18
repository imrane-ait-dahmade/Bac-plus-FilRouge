<?php

use App\Http\Controllers\EtablissementController;
use illuminate\http\Request;
use Illuminate\Support\Facades\Route;
use http\Env\Response;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
});
Route::middleware('auth')->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::get('admin', function () {
            return view('Backoffice.Dashboard');
        })->name('admin_dashboard');
    });

    Route::middleware('role:etudiant')->group(function () {
        Route::get('etudiant', function () {
            return view('Frontoffice.home');
        })->name('etudiant_dashboard');

        Route::get('/etablissements', function () {
            return view('Frontoffice.Etablissements');
        });
    });
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


