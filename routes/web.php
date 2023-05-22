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

Route::get('/search', 'SearchController@search')->name('search');


Route::get('/', function () {
    return view('welcome');
});
