<?php

Route::group(['namespace' => 'Exdeliver\Marketplace\Controllers'], function () {

    Route::get('/', 'MarketplaceSiteController@getHome');

    Route::group(['prefix' => 'category'], function() {
        Route::get('{slug}', 'MarketplaceSiteController@getCategory');
    });

    Route::group(['middleware' => ['auth','web']], function() {
        Route::group(['prefix' => 'advertisements'], function() {
            Route::get('new', 'MarketplaceSiteController@getNewAdvertisement');
            Route::post('new', 'MarketplaceSiteController@storeAdvertisement');
            Route::get('edit/{advertisement_id}', 'MarketplaceSiteController@getEditAdvertisement');
            Route::post('edit/{advertisement_id}', 'MarketplaceSiteController@storeAdvertisement');
            Route::get('remove/{advertisement_id}', 'MarketplaceSiteController@getRemoveAdvertisement');
        });
    });

    Route::get('/{category}/advertisement/{slug}', 'MarketplaceSiteController@getAdvertisement');


    Route::group(['prefix' => '/user'], function() {
        Route::get('/login', ['as' => 'login', 'uses' => 'MarketplaceSiteController@getLogin']);
        Route::post('/login', 'MarketplaceSiteController@login');
        Route::get('/register', 'MarketplaceSiteController@getRegister');
        Route::post('/register', 'MarketplaceSiteController@register');
        Route::get('/logout', 'MarketplaceSiteController@logout');
        Route::get('/request-password', 'MarketplaceSiteController@getRequestPassword');
        Route::post('/request-password', 'MarketplaceSiteController@requestpassword');

        Route::group(['middleware' => ['web','auth']], function() {
            Route::get('/my-account', 'MarketplaceAdminController@getAccount');
            Route::post('/my-account', 'MarketplaceAdminController@account');
        });
    });
});
