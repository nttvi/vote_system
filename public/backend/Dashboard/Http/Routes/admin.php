<?php
	Route::prefix('admin')->group(function(){
    	Route::get('/','AdminController@index')->name('home.admin')->middleware('auth');

    	Route::get('/login','AdminController@getLogin')->name('get.login.admin');
    	Route::post('/login','AdminController@postLogin')->name('login');
    	Route::get('/logout','AdminController@getLogout')->name('get.logout.admin');
    
    	Route::get('/sign','AdminController@getSign')->name('get.sign.admin');
    	Route::post('/sign','AdminController@postSign')->name('post.sign.admin');
    
	});
    	

