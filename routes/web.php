<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\IntervenantsController;
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

Route::resource('entreprises', EntrepriseController::class);
Route::resource('contacts', ContactController::class);
Route::resource('commentaires', CommentaireController::class);
Route::resource('intervenants', IntervenantsController::class);

// routes pour les entreprises
// Route::get('entreprises', 'EntrepriseControler@index')->name('entreprises.index');
// Route::get('entreprises/create', 'EntrepriseControler@create')->name('entreprises.create');
// Route::post('entreprises', 'EntrepriseControler@store')->name('entreprises.store');
// Route::get('entreprises/{id}', 'EntrepriseControler@show')->name('entreprises.show');
// Route::get('entreprises/{id}/edit', 'EntrepriseControler@edit')->name('entreprises.edit');
// Route::put('entreprises/{id}', 'EntrepriseControler@update')->name('entreprises.update');
// Route::delete('entreprises/{id}', 'EntrepriseControler@destroy')->name('entreprises.destroy');

// routes pour les contacts
// Route::get('contacts', 'ContactController@index')->name('contacts.index');
// Route::get('contacts/create', 'ContactController@create')->name('contacts.create');
// Route::post('contacts', 'ContactController@store')->name('contacts.store');
// Route::get('contacts/{id}', 'ContactController@show')->name('contacts.show');
// Route::get('contacts/{id}/edit', 'ContactController@edit')->name('contacts.edit');
// Route::put('contacts/{id}', 'ContactController@update')->name('contacts.update');
// Route::delete('contacts/{id}', 'ContactController@destroy')->name('contacts.destroy');


Route::get('/', function () {
    return view('welcome');
});
