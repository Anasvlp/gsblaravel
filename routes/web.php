<?php

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
        /*-------------------- Use case connexion---------------------------*/
Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);
Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnecter'
]);

         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMois',[
        'as'=>'chemin_selectionMois',
        'uses'=>'etatFraisController@selectionnerMois'
]);

Route::post('listeFrais',[
        'as'=>'chemin_listeFrais',
        'uses'=>'etatFraisController@voirFrais'
]);

        /*-------------------- Use case gérer les frais---------------------------*/

Route::get('gererFrais',[
        'as'=>'chemin_gestionFrais',
        'uses'=>'gererFraisController@saisirFrais'
]);

Route::post('sauvegarderFrais',[
        'as'=>'chemin_sauvegardeFrais',
        'uses'=>'gererFraisController@sauvegarderFrais'
]);

Route::get('ajouterSaisie',[
        'as'=>'chemin_ajouterSaisie',
        'uses'=>'gererVisiteursController@ajouterSaisie'
]);
Route::post('ajouterValider',[
        'as'=>'chemin_ajouterValider',
        'uses'=>'gererVisiteursController@ajouterValider'
]);
Route::get('modifierChoix',[
        'as'=>'chemin_modifierChoix',
        'uses'=>'gererVisiteursController@modifierChoix'
]);
Route::get('modifierSaisie',[
        'as'=>'chemin_modifierSaisie',
        'uses'=>'gererVisiteursController@modifierSaisie'
]);
Route::post('modifierValider',[
        'as'=>'chemin_modifierValider',
        'uses'=>'gererVisiteursController@modifierValider' // Correction de l'appel de méthode
]);

Route::get('lister',[
        'as'=>'chemin_lister',
        'uses'=>'gererVisiteursController@lister'
]);
Route::post('pdf',[
        'as'=>'chemin_pdf',
        'uses'=>'gererVisiteursController@getPostPdf'
    ]);
    


