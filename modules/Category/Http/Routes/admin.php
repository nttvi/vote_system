<?php
	Route::prefix('admin')->group(function(){
		Route::prefix('type')->group(function(){
    		Route::get('list','Election_typeController@getList')->name('get.list.election_type');
    		Route::get('create','Election_typeController@getCreate')->name('get.create.election_type');
    		Route::post('create','Election_typeController@postCreate')->name('post.create.election_type');
    		Route::get('edit/{id}','Election_typeController@getEdit')->name('get.edit.election_type');
    		Route::post('edit/{id}','Election_typeController@postEdit')->name('post.edit.election_type');
    		Route::get('delete/{id}','Election_typeController@delete')->name('get.delete.election_type');

    	});
	});
    	

