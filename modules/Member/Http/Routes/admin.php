<?php
	Route::prefix('admin')->group(function(){
		Route::prefix('member')->group(function(){
            Route::get('list','MemberController@getList')->name('get.list.member');
    		Route::get('list-on-month','MemberController@getListOnMonth')->name('get.list_on_month.member');
    		Route::get('create','MemberController@getCreate')->name('get.create.member');
    		Route::post('create','MemberController@postCreate')->name('post.create.member');
    		Route::get('edit/{id}','MemberController@getEdit')->name('get.edit.member');
    		Route::post('edit/{id}','MemberController@postEdit')->name('post.edit.member');
    		Route::get('delete/{id}','MemberController@delete')->name('get.delete.member');
            
            Route::get('election-list/{id}','MemberController@getElection')->name('get.election.member');
            Route::get('election-join/{id}','MemberController@getElectionJoin')->name('get.election.join.member');

    	});
        Route::get('search-member','AdminController@searchMemberAdmin')->name('get.search.member.admin');
        Route::get('search-member-on-month','AdminController@searchMemberOnMonthAdmin')->name('get.search.member-member-on-month.admin');

	});
    	

