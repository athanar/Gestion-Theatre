<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\IntervenantsController;
use App\Http\Controllers\ProjetsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/intervenants/search', IntervenantsController::class);
Route::get('/intervenants/search',[IntervenantsController::class,'search'])->name('intervenants.search');

Route::resource('entreprises', EntrepriseController::class);
Route::resource('contacts', ContactController::class);
Route::resource('commentaires', CommentaireController::class);
Route::resource('intervenants', IntervenantsController::class);
Route::resource('projets', ProjetsController::class);

Route::get('entreprise/{entreprise}/projets/selection', 'App\Http\Controllers\EntrepriseController@showProjetSelection')->name('entreprise.showProjetSelection');
Route::post('entreprise/{entreprise}/projets/associate', 'App\Http\Controllers\EntrepriseController@associateProjets')->name('entreprise.associateProjets');

Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');
Route::get('/search_contacts','App\Http\Controllers\SearchController@search_contacts')->name('search_contacts');
Route::get('/search_intervenants','App\Http\Controllers\SearchController@search_intervenants')->name('search_intervenants');

Route::post('/intervenants/{intervenant}/remunerations', [RemunerationController::class, 'store'])->name('remuneration.store');

Route::get('/', function () {
    return view('welcome');
});
