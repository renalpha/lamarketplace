<?php
/**
 * EXdeliver marketplace admin routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Exdeliver\Marketplace\Controllers'], function () {
    Route::group(['prefix' => 'marketplace'], function () {
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/overview', 'MarketplaceCategoriesController@getList');
            Route::get('/new', 'MarketplaceCategoriesController@getNew');
            Route::post('/new', 'MarketplaceCategoriesController@store');
            Route::get('/edit/{id}', 'MarketplaceCategoriesController@getEdit');
            Route::post('/edit/{id}', 'MarketplaceCategoriesController@store');
            Route::get('/remove/{id}', 'MarketplaceCategoriesController@remove');
        });

        Route::group(['prefix' => 'advertisements'], function () {
            Route::get('/overview', 'MarketplaceAdvertisementsController@getList');
            Route::get('/new', 'MarketplaceAdvertisementsController@getNew');
            Route::get('/edit/{id}', 'MarketplaceAdvertisementsController@getEdit');
            Route::get('/remove/{id}', 'MarketplaceAdvertisementsController@remove');
        });
    });
});