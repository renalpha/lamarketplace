<?php
/**
 * EXdeliver marketplace admin routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Exdeliver\Marketplace\Controllers'], function () {
    Route::get('/', 'MarketplaceAdminController@getDashboard');

    Route::get('/login', 'MarketplaceAdminController@getLogin');
    Route::post('/login', 'MarketplaceAdminController@login');

    Route::get('/register', 'MarketplaceAdminController@getRegister');
    Route::post('/register', 'MArketplaceAdminController@register');

    Route::get('/request-password', 'MarketplaceAdminController@getRequestPassword');
    Route::post('/request-password', 'MArketplaceAdminController@requestpassword');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/user/logout', 'MarketplaceAdminController@logout');
    });
});