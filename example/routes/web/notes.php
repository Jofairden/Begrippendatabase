<?php
    Route::prefix('notes')->group(function(){
		Route::get('/create', 'NoteController@create')->name('notes.create');
        Route::post('/create', 'NoteController@store')->name('notes.store');
        Route::get('/edit/{id}', 'NoteController@edit')->name('notes.edit')
			->where('id', '[0-9]+');
        Route::patch('/edit/{id}', 'NoteController@update')->name('notes.update')
			->where('id', '[0-9]+');
		Route::get('/delete/{id}', 'NoteController@delete')->name('notes.delete')
			->where('id', '[0-9]+');
		Route::delete('/{id}', 'NoteController@destroy')->name('notes.destroy')
			->where('id', '[0-9]+');
	});