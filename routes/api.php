<?php


Route::post('/auth/token', 'Api\AuthController@getAccessToken');

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function() {
    Route::resource('tags', 'TagController');
});
