<?php
    	Route::prefix('profile')->group(function(){
        		Route::get('/edit','WebController@getEditHome')->name('get.edit.profile.home');
        		Route::post('/edit','WebController@postEditHome')->name('post.edit.profile.home');
    	});


