<?php

        Route::get('/','HomeController@getHome')->name('get.home.index');
        Route::get('/login-page','HomeController@getHomeLogin')->name('get.home.login');
        Route::post('/login-page','HomeController@postHomeLogin')->name('post.home.login');
        Route::get('/logout-page','HomeController@getHomeLogout')->name('get.home.logout');
        
        Route::get('/signup-page','AccountController@getCreate')->name('get.home.signup');
        Route::post('/signup-page','AccountController@postCreate')->name('post.home.signup');
    	


    	Route::prefix('bau-chon')->group(function(){
            Route::get('/tao-bau-chon','HomeController@getCreateBauChon')->name('get.home.getCreateBauChon');
	        Route::post('/tao-bau-chon','HomeController@postCreateBauChon')->name('post.home.getCreateBauChon');
            Route::get('/chinh-sua-bau-chon/{id}-{slug}','HomeController@getEditBauChon')->name('get.home.getEditBauChon');
            Route::post('/chinh-sua-bau-chon/{id}-{slug}','HomeController@postEditBauChon')->name('post.home.getEditBauChon');
            Route::post('/tao-doi-tuong','HomeController@postCreateDoiTuong')->name('post.home.postCreateDoiTuong');
            Route::post('/chinh-sua-doi-tuong/{id}','HomeController@postEditDoiTuong')->name('post.home.postEditDoiTuong');
            Route::post('/them-thanh-vien-bau-chon/{election_id}','HomeController@postCreateThanhVienBC')->name('post.home.postCreateThanhVienBC');
            Route::get('xoa-thanh-vien-bau-chon/{id}','HomeController@deleteThanhVienBC')->name('post.home.deleteThanhVienBC');

    	});

        Route::prefix('tham-gia-bau-chon')->group(function(){
            Route::get('list','HomeController@getHomeElectionList')->name('get.home.getHomeElectionList');
            Route::get('list/{cate-id}','HomeController@getHomeElectionListByCate')->name('get.home.getHomeElectionListByCate');
            Route::get('detail/{id}','HomeController@getHomeElectionDetail')->name('get.home.getHomeElectionDetail');
            Route::post('detail/{id}','HomeController@postVoteCheck')->name('get.home.postVoteCheck');
            Route::get('content/{id}','HomeController@getHomeElectionDetailContent')->name('get.home.getHomeElectionDetailContent');
        });

        Route::get('ajax-thanh-vien','HomeController@ajaxThanhVien');



