<?php
	Route::prefix('admin')->group(function(){
		Route::prefix('election')->group(function(){
    		Route::get('list','ElectionController@getList')->name('get.list.election');
    		Route::get('create','ElectionController@getCreate')->name('get.create.election');
    		Route::post('create','ElectionController@postCreate')->name('post.create.election');
    		Route::get('edit/{id}','ElectionController@getEdit')->name('get.edit.election');
    		Route::post('edit/{id}','ElectionController@postEdit')->name('post.edit.election');
    		Route::get('delete/{id}','ElectionController@delete')->name('get.delete.election');

    	});

        Route::prefix('voter')->group(function(){
            Route::get('list/{id}','VoterController@getList')->name('get.list.voter');
            Route::get('create/{election_id}','VoterController@getCreate')->name('get.create.voter');
            Route::post('create/{election_id}','VoterController@postCreate')->name('post.create.voter');
            Route::get('delete/{id}','VoterController@delete')->name('get.delete.voter');
        });

        Route::prefix('vote')->group(function(){
            Route::get('list/{id}','VoteController@getList')->name('get.list.vote');
            Route::get('create/{election_id}','VoteController@getCreate')->name('get.create.vote');
            Route::post('create/{election_id}','VoteController@postCreate')->name('post.create.vote');
            Route::get('delete/{id}','VoteController@delete')->name('get.delete.vote');
        });

        Route::get('search-election','AdminController@searchElectionAdmin')->name('get.search.election.admin');
	});
    	

