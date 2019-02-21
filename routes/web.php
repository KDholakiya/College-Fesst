<?php
    Route::get('/','PagesController@index');//index page
    //Route::get('/about','PagesController@about');//about page
    Route::get('/dashboard','PagesController@member');//dashboard
    Route::post('/authenticate','DataController@authenticateMember');
    Route::post('/addEvent','DataController@addEvent');
    Route::get('/Search/{data?}', 'PagesController@search')->where('data', '(.*)');//search query
    Route::get('/event/{data?}', 'PagesController@gallery')->where('data', '(.*)');//gallery page
    Route::resource('Data', 'DataController');//api