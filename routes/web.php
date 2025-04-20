<?php

use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\UniversiteController;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Route;
use http\Env\Response;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;


// home page first for visitor
Route::get('/', function () {
    return view('home');
});
Route::middleware('auth')->group(function () {


    //admin
    Route::middleware('role:admin')->group(function () {
        Route::get('admin', function () {
            return view('Backoffice.Dashboard');
        })->name('admin_dashboard');
        Route::get('/etablissements', [EtablissementController::class , 'index'])->name('Etablissements');
        Route::get('/etablissements/create', [EtablissementController::class, 'create'])->name('Etablissements.create');
        Route::post('/etablissements/store', [EtablissementController::class, 'store'])->name('etablissements.store');
        Route::get('/etablissements/{etablisement}',[EtablissementController::class , 'show'])->name('etablisement_infos');
//        route::get('/Universite',[UniversiteController::class , 'RecupererListeUniversite'])->name('Universite');
//        Route::get('/etablissements/{etablissement}', [EtablissementController::class, 'update'])->name('etablissement.update');
//        Route::put('/etablissements/{etablissement->id}', [EtablissementController::class, 'update'])->name('etablissement.update');
    });


    //etudiant
    Route::middleware('role:etudiant')->group(function () {
        Route::get('etudiant', function () {
            return view('Frontoffice.home');

        })->name('etudiant_dashboard');
        Route::get('/etablissements', [EtablissementController::class , 'index'])->name('Etablissements');
        Route::get('/etablissements/{etablissement}',[EtablissementController::class , 'show'])->name('etablissement.show');
    });
});





//Avant l'authantification
Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login_post');
        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register_post');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('Deconnexion');
});


//authatificaton with google

Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

//if(Request(401)){
//    Route::get('/404page', function () {
//        return view('404');
//    });
//}
Route::get('404', function () {
    return view('404');
})->name('404');

