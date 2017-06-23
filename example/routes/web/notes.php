<?php
    Route::prefix('notes')->group(function(){
		Route::get('/create', 'NoteController@create')->name('notes.create');
        Route::post('/create', 'NoteController@store')->name('notes.store');
	});