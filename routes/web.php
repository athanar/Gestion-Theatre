<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\IntervenantsController;
use App\Http\Controllers\ProjetsController;
use App\Models\Intervenants;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/search_intervenants',[IntervenantsController::class,'search'])->name('intervenants.search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour la gestion des utilisateurs
    Route::prefix('admin/users')->name('admin.users.')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
    
   
    Route::get('entreprise/{entreprise}/projets/selection', 'App\Http\Controllers\EntrepriseController@showProjetSelection')->name('entreprise.showProjetSelection');
    Route::post('entreprise/{entreprise}/projets/associate', 'App\Http\Controllers\EntrepriseController@associateProjets')->name('entreprise.associateProjets');

    Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');
    Route::get('/search_contacts','App\Http\Controllers\SearchController@search_contacts')->name('search_contacts');

    Route::post('/intervenants/{intervenant}/remunerations', [RemunerationController::class, 'store'])->name('remuneration.store');

    Route::get('/', function () {
        return view('welcome');
    });

  
});

Route::resource('entreprises', EntrepriseController::class);
Route::resource('contacts', ContactController::class);
Route::resource('commentaires', CommentaireController::class);
Route::resource('intervenants', IntervenantsController::class);
Route::resource('projets', ProjetsController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);


require __DIR__.'/auth.php';
