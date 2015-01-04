<?php

Route::pattern('id', '[0-9]+');

Route::get('/', ['uses' => 'PagesController@landing', 'as' => 'landing']);
Route::group(['prefix' => 'horse'], function() {
    Route::post('/', ['uses' => 'HorseController@create', 'as' => 'horse/create']);
    Route::get('/create', ['uses' => 'HorseController@create', 'as' => 'horse/create']);
    Route::get('/', ['uses' => 'HorseController@index', 'as' => 'horse/index']);
    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', ['uses' => 'HorseController@view', 'as' => 'horse/view']);
        Route::get('/update', ['uses' => 'HorseController@update', 'as' => 'horse/update']);
        Route::put('/like', ['uses' => 'HorseController@like', 'as' => 'horse/like']);
        Route::put('/', ['uses' => 'HorseController@update', 'as' => 'horse/update']);
        Route::delete('/', ['uses' => 'HorseController@delete', 'as' => 'horse/delete']);
    });
});