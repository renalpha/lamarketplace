<?php

Route::group(['namespace' => 'Exdeliver\Marketplace\Controllers'], function () {
    Route::get('/', 'MarketplaceSiteController@getHome');

    Route::group(['prefix' => 'category'], function() {
        Route::get('{slug}', 'MarketplaceSiteController@getCategory');
    });

    Route::get('/{category}/advertisement/{slug}', 'MarketplaceSiteController@getAdvertisement');


    Route::group(['prefix' => '/user'], function() {
        Route::get('/login', 'MarketplaceSiteController@getLogin');
        Route::post('/login', 'MarketplaceSiteController@login');
        Route::get('/register', 'MarketplaceSiteController@getRegister');
        Route::post('/register', 'MarketplaceSiteController@register');
    });
});
