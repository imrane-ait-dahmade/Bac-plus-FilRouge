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
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RecommendationController;

// home page first for visitor
Route::get('/', function () {
    return view('home');
});
Route::get('/di', function () {
    return view('FormulaireDiplome');
});

// Routes d'authentification
Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login_post');
        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register_post');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('Deconnexion');
});

// Authentification Google
Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Routes communes aux utilisateurs authentifiés
    Route::get('/domaines', [DomaineController::class, 'index'])->name('Domaines');
    Route::get('/etablissements', [EtablissementController::class, 'index'])->name('Etablissements');
    Route::get('/etablissements/{etablissement}', [EtablissementController::class, 'show'])->name('etablisement_infos');
    Route::post('/etablissements/{etablissement}/filieres', [EtablissementController::class, 'attachFilieres'])->name('etablissement.filieres.attach');

    // Routes pour les étudiants
    Route::middleware(['role:etudiant'])->group(function () {
        Route::get('etudiant', function () {
            return view('Frontoffice.home');
        })->name('etudiant_dashboard');

        // Profile Etudiant
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Favoris
        Route::get('/favorites', [StudentController::class, 'favorites'])->name('student.favorites');
        Route::post('/favorites/{etablissement}', [StudentController::class, 'toggleFavorite'])->name('student.toggleFavorite');

        // Historique des consultations
        Route::get('/history', [StudentController::class, 'viewHistory'])->name('student.history');

        // Navigation entre filières et écoles
        Route::get('/filieres/{filiere}', [StudentController::class, 'showFiliere'])->name('student.filiere.show');
        Route::get('/etablissements/{etablissement}/filieres', [StudentController::class, 'showEtablissementFilieres'])->name('student.etablissement.filieres');

        // Recommendations
        Route::get('/recommendations', [RecommendationController::class, 'index'])->name('student.recommendations');
    });

    // Routes pour les administrateurs
    Route::middleware('role:admin')->group(function () {
        Route::get('admin', [\App\Http\Controllers\Statistiques::class, 'StatistiquesAdmin'])->name('admin_dashboard');

        //Etablissement Crud
        Route::get('/etablissements/create', [EtablissementController::class, 'create'])->name('Etablissements.create');
        Route::post('/etablissements/store', [EtablissementController::class, 'store'])->name('etablissements.store');
        Route::Delete('/etablissements/{etablissement}', [EtablissementController::class, 'destroy'])->name('etablissement.destroy');
        Route::get('/etablissementEdit/{etablissement}', [EtablissementController::class, 'edit'])->name('etablissement.FormEdit');
        Route::put('/etablissementsUpdate/{etablissement}', [EtablissementController::class, 'update'])->name('etablissement.update');

        // universite crud
        Route::resource('universites', UniversiteController::class);

        //Filiere Crud
        Route::get('/{domaine}/flieres', [FilierController::class, 'index'])->name('filieres.domaine');
        Route::get('/{domaine}/filieres/{filiere}', [FilierController::class, 'show'])->scopeBindings()->name('filiere.show');
        Route::get('/{domaine}/filiere/create', [FilierController::class, 'create'])->name('filiere.create');
        Route::post('/{domaine}/filiere/store', [FilierController::class, 'Store'])->name('filiere.store');
        Route::get('/{domaine}/{filiere}/update', [FilierController::class, 'edit'])->scopeBindings()->name('filiere.edit');
        Route::put('/filiereupdate/{id}', [FilierController::class, 'update'])->name('filiere.update');
        Route::delete('/filieredelete/{id}', [FilierController::class, 'destroy'])->name('filiere.destroy');
    });
});

// Page 404
Route::get('404', function () {
    return view('404');
})->name('404');
