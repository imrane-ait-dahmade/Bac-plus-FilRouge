<?php

use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\FilierController;
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

        //Etablissement Crud
        Route::get('/etablissementsAccesAdmin', [EtablissementController::class , 'index'])->name('etablissementsAccesAdmin');
        Route::get('/etablissements/create', [EtablissementController::class, 'create'])->name('Etablissements.create');
        Route::post('/etablissements/store', [EtablissementController::class, 'store'])->name('etablissements.store');
        Route::get('/etablissements/{etablisement}',[EtablissementController::class , 'show'])->name('etablisement_infos');
        Route::Delete('/etablissements/{etablisement}',[EtablissementController::class , 'destroy'])->name('etablissement.destroy');
//        route::get('/Universite',[UniversiteController::class , 'RecupererListeUniversite'])->name('Universite');
        Route::get('/etablissementEdit/{etablisement}', [EtablissementController::class, 'edit'])->name('etablissement.FormEdit');
        Route::put('/etablissementsUpdate/{id}', [EtablissementController::class, 'update'])->name('etablissement.update');


        //Filiere Crud
        Route::get('/filieres',[FilierController::class , 'index'])->name('filieres');
        Route::get('/filieres/{id}',[FilierController::class , 'show'])->name('filiere.show');
        Route::get('/filieredit/{id}',[FilierController::class , 'edit'])->name('filiere.edit');
        Route::put('/filiereupdate/{id}',[FilierController::class , 'update'])->name('filiere.update');
        Route::delete('/filieredelete/{id}',[FilierController::class , 'destroy'])->name('filiere.delete');
        Route::get('/filiere/create',[FilierController::class, 'create'])->name('filiere.create');
        Route::post('/filiere/store',[FilierController::class, 'Store'])->name('filiere.store');

    });


    //etudiant
    Route::middleware('role:etudiant')->group(function () {
        Route::get('etudiant', function () {
            return view('Frontoffice.home');

        })->name('etudiant_dashboard');
        // Etablissement affichage
        Route::get('/etablissements', [EtablissementController::class , 'index'])->name('Etablissements');
        Route::get('/etablissements/{etablissement}',[EtablissementController::class , 'show'])->name('etablissement.show');

        // Profile Etudiant
        Route::get('/profile',function(){
            return view('Frontoffice.Profile');
        })->name('profile') ;

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

