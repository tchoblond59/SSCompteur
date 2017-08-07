<?php
Route::group(['middleware' => ['web']], function () {
    Route::get('/SSCompteur/{id}', 'Tchoblond59\SSCompteur\Controllers\SSCompteurController@show');

    Route::get('/widget/SSCompteur/{id}', 'Tchoblond59\SSCompteur\Controllers\SSCompteurController@configureWidget');
});