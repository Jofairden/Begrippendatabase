<?php
	// Dit is voor een begrip suggereren. Iedereen kan dit doen. Gebruikersaccount is niet vereist.
    Route::prefix('suggest')->group(function(){
		Route::get('/', 'ToevoegenController@index')->name('toevoegen.index');
        Route::post('/', 'ToevoegenController@post');
	});