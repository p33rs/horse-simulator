<?php

Route::pattern('id', '[0-9]+');

Route::get('/', ['uses' => 'PagesController@landing', 'as' => 'landing']);

Route::group(['prefix' => 'horse', 'before' => 'auth'], function() {
    Route::post('/', ['uses' => 'HorseController@create', 'as' => 'horse/create']);
    Route::get('/', ['uses' => 'HorseController@index', 'as' => 'horse/index']);
    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', ['uses' => 'HorseController@view', 'as' => 'horse/view']);
        Route::put('/like', ['uses' => 'HorseController@like', 'as' => 'horse/like']);
        Route::put('/', ['uses' => 'HorseController@update', 'as' => 'horse/update']);
        Route::delete('/', ['uses' => 'HorseController@delete', 'as' => 'horse/delete']);
    });
});

Route::post('/register', ['uses' => 'UserController@create', 'as' => 'user/register']);
Route::put('/login', ['uses' => 'UserController@like', 'as' => 'user/login']);
Route::put('/logout', ['uses' => 'UserController@like', 'as' => 'user/logout']);
Route::group(['prefix' => 'user', 'before' => 'auth'], function() {
    // Route::get('/create', ['uses' => 'UserController@create', 'as' => 'user/create']);
    // Route::get('/', ['uses' => 'UserController@index', 'as' => 'user/index']);
    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', ['uses' => 'UserController@view', 'as' => 'user/view']);
        Route::put('/', ['uses' => 'UserController@update', 'as' => 'user/update']);
        // Route::delete('/', ['uses' => 'UserController@delete', 'as' => 'user/delete']);
    });
});