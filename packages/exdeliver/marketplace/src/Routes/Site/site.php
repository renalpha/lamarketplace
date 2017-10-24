<?php

Route::group(['namespace' => 'Exdeliver\Marketplace\Controllers'], function () {
    Route::get('/', 'MarketplaceSiteController@getHome');

    Route::group(['prefix' => 'category'], function() {
        Route::get('{slug}', 'MarketplaceSiteController@getCategory');
    });

    Route::get('/{category}/advertisement/{slug}', 'MarketplaceSiteController@getAdvertisement');

});
