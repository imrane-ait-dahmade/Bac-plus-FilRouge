<?php

use App\Http\Controllers\DomaineController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\FilierController;
use App\Http\Controllers\ProfileController;
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
        Route::get('admin',[\App\Http\Controllers\Statistiques::class , 'StatistiquesAdmin'])->name('admin_dashboard');

        //Etablissement Crud

        Route::get('/etablissements/create', [EtablissementController::class, 'create'])->name('Etablissements.create');
        Route::post('/etablissements/store', [EtablissementController::class, 'store'])->name('etablissements.store');

        Route::Delete('/etablissements/{etablissement}',[EtablissementController::class , 'destroy'])->name('etablissement.destroy');
//        route::get('/Universite',[UniversiteController::class , 'RecupererListeUniversite'])->name('Universite');
        Route::get('/etablissementEdit/{etablissement}', [EtablissementController::class, 'edit'])->name('etablissement.FormEdit');
        Route::put('/etablissementsUpdate/{etablissement}', [EtablissementController::class, 'update'])->name('etablissement.update');



// universite crud

        Route::resource('universites', UniversiteController::class);

        //Filiere Crud
        Route::get('/{domaine}/flieres',[FilierController::class , 'index'])->name('filieres.domaine');
        Route::get('/filieres/{id}',[FilierController::class , 'show'])->name('filiere.show');
        Route::get('/filieredit/{id}',[FilierController::class , 'edit'])->name('filiere.edit');
        Route::put('/filiereupdate/{id}',[FilierController::class , 'update'])->name('filiere.update');
        Route::delete('/filieredelete/{id}',[FilierController::class , 'destroy'])->name('filiere.delete');
        Route::get('/filiere/create',[FilierController::class, 'create'])->name('filiere.create');
        Route::post('/filiere/store',[FilierController::class, 'Store'])->name('filiere.store');

    });
    Route::get('/domaines' , [DomaineController::class , 'index'])->name('Domaines');
    Route::get('/etablissements', [EtablissementController::class , 'index'])->name('Etablissements');
    Route::get('/etablissements/{etablissement}',[EtablissementController::class , 'show'])->name('etablisement_infos');
    //etudiant
    Route::middleware('role:etudiant')->group(function () {
        Route::get('etudiant', function () {
            return view('Frontoffice.home');

        })->name('etudiant_dashboard');
        // Etablissement affichage



        // Profile Etudiant
        Route::get('/profile',[ProfileController::class ,'index'])->name('profile') ;
        Route::get('/profileupdate',[ProfileController::class , 'update'])->name('profile.update') ;
        // change Password
        Route::get('/Password',function(){})->name('password.change');

        // setting
        Route::get('/settings' , function (){})->name('account.settings');



        //Historique

        Route::get('/Historiques',function(){
        view('Frontoffice.Historiques');
        })->name('history.index');

        // Favoirs
        Route::get('/favorites',function(){
            return view('Frontoffice.favorites');
        })->name('favorites.index');
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

