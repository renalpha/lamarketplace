<?php
/**
 * EXdeliver marketplace admin routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Exdeliver\Marketplace\Controllers'], function () {

    Route::group(['middleware' => 'Exdeliver\Marketplace\Middleware\MarketplaceMiddleware'], function () {
        Route::group(['middleware' => 'auth'], function() {
            Route::get('/', 'MarketplaceAdminController@getDashboard');
            Route::get('/user/logout', 'MarketplaceAdminController@logout');
        });
    });

    Route::get('/login', 'MarketplaceAdminController@getLogin');
    Route::post('/login', 'MarketplaceAdminController@login');

    Route::get('/register', 'MarketplaceAdminController@getRegister');
    Route::post('/register', 'MArketplaceAdminController@register');

    Route::get('/request-password', 'MarketplaceAdminController@getRequestPassword');
    Route::post('/request-password', 'MArketplaceAdminController@requestpassword');

});