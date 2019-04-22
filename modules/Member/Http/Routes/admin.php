<?php
	Route::prefix('admin')->group(function(){
		Route::prefix('member')->group(function(){
    		Route::get('list','MemberController@getList')->name('get.list.member');
    		Route::get('create','MemberController@getCreate')->name('get.create.member');
    		Route::post('create','MemberController@postCreate')->name('post.create.member');
    		Route::get('edit/{id}','MemberController@getEdit')->name('get.edit.member');
    		Route::post('edit/{id}','MemberController@postEdit')->name('post.edit.member');
    		Route::get('delete/{id}','MemberController@delete')->name('get.delete.member');

    	});
	});
    	

