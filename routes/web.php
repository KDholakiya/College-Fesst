<?php
    Route::get('/','PagesController@index');//index page
    Route::get('/about','PagesController@about');//about page
    Route::get('/dashboard', function () {
        if(Session::has('member')) return view('pages.dashboard');
        return redirect('/');
    });
    Route::post('/authenticate','DataController@authenticateMember');
    Route::get('/Search/{data?}', 'PagesController@search')->where('data', '(.*)');//search query
    Route::get('/event/{data?}', 'PagesController@gallery')->where('data', '(.*)');//gallery page
    Route::resource('Data', 'DataController');//api