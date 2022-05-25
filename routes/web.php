<?php

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

/**
 * Page d'accueil
 */
Route::get('/', 'MainController@index')->name('index'); 

/**
 * Création de formulaire
 */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/form/create', 'FormulaireController@create')->name('form.create')->middleware('adminProf'); 
    Route::post('/form/store', 'FormulaireController@store')->name('form.store'); 
    Route::get('/form/all-form', 'FormulaireController@index')->name('form.all-list'); 
    Route::get('/form/my-form', 'FormulaireController@myForm')->name('form.my-list')->middleware('adminProf'); 
    Route::get('/form/show/{id}', 'FormulaireController@show')->name('form.show'); 
    Route::delete('/form/destroy/{id}', 'FormulaireController@destroy')->name('form.destroy'); 
}); 

/**
 * Demande des formulaires
 */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/demande/request-in-progress', 'DemandeController@index')->name('demande.index');
    Route::get('/demande/request-all', 'DemandeController@requestAll')->name('demande.request-all'); 
    Route::post('/demande/store/{idFormulaire}', 'DemandeController@store')->name('demande.store'); 
    Route::get('/demande/show/{id}', 'DemandeController@show')->name('demande.show'); 
    Route::get('/demande/show-progress/{id}', 'DemandeController@showProgress')->name('demande.show-progress'); 
    Route::get('/demande/show-all/{id}', 'DemandeController@showAll')->name('demande.show-all'); 
    Route::post('demande/download-file/{id}', 'DemandeController@downloadFile')->name('demande.download'); 
    Route::delete('/demande/destroy/{id}', 'DemandeController@destroy')->name('demande.destroy'); 
    Route::get('/demande/edit/{id}', 'DemandeController@edit')->name('demande.edit'); 
    Route::post('/demande/update/{idFormulaire}/{idDemande}', 'DemandeController@update')->name('demande.update'); 
    Route::get('/demande/all-demande-admin', 'DemandeController@allDemandeAdmin')->name('demande.all-demande-admin')->middleware('admin');
});

/**
 * Réponse à mes formulaires
 */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/reply-formulaire', 'ReplyFormulaireController@index')->name('reply-formulaire.index')->middleware('adminProf'); 
    Route::get('/reply-formulaire/show/{id}', 'ReplyFormulaireController@show')->name('reply-formulaire.show')->middleware('adminProf'); 
    Route::post('/reply-formulaire/update/{id}', 'ReplyFormulaireController@update')->name('reply-formulaire.update')->middleware('adminProf'); 
    Route::post('/reply-formulaire/refusedReply/{id}', 'ReplyFormulaireController@refusedReply')->name('reply-formulaire.refusedReply')->middleware('adminProf'); 
});

/**
 * Génération d'un PDF
 */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/pdf/{id}', 'GeneratePDFController@index'); 
    Route::get('downloadPDF/{id}', 'GeneratePDFController@downloadPDFFormVide')->name('download.pdf'); 
    Route::get('downloadPDF-demande/{id}', 'GeneratePDFController@downloadPDFDemande')->name('download.pdf-demande');
});

/**
 * Barre de recherche - tous les formulaires
 */
Route::group(['middleware' => ['auth']], function() {
    Route::post('form/search', 'FormulaireController@search')->name('form.search'); 
});

/**
 * Dashboard
 */
Route::get('/dashboard', 'MainController@dashboard')->name('dashboard')->middleware(['auth:sanctum', 'verified']); 
