<?php
	Route::prefix('admin')->group(function(){
		Route::prefix('object')->group(function(){
    		Route::get('list/{id}','ObjectController@getList')->name('get.list.object');
    		Route::get('create/{election_id}','ObjectController@getCreate')->name('get.create.object');
    		Route::post('create/{election_id}','ObjectController@postCreate')->name('post.create.object');
    		Route::get('edit/{id}','ObjectController@getEdit')->name('get.edit.object');
    		Route::post('edit/{id}','ObjectController@postEdit')->name('post.edit.object');
    		Route::get('delete/{id}','ObjectController@delete')->name('get.delete.object');

    	});
	});
    	

