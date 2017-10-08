<?php

Route::group(['namespace' => 'Exdeliver\Marketplace\Controllers'],function () {
    Route::get('/admin', 'MarketplaceAdminController@getLogin');
});

