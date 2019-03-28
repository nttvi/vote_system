<?php

        Route::get('/','HomeController@getHome')->name('get.home.index');
        Route::get('/login-page','HomeController@getHomeLogin')->name('get.home.login');
        Route::post('/login-page','HomeController@postHomeLogin')->name('post.home.login');
        Route::get('/logout-page','HomeController@getHomeLogout')->name('get.home.logout');
        
        Route::get('/signup-page','AccountController@getCreate')->name('get.home.signup');
        Route::post('/signup-page','AccountController@postCreate')->name('post.home.signup');
    	


    	Route::prefix('bau-chon')->group(function(){
	        Route::get('/tao-bau-chon','HomeController@getCreateBauChon')->name('get.home.getCreateBauChon');
    	});


