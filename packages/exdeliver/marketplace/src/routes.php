<?php

Route::group(['middleware' => 'web'], function () {
    require __DIR__ . '/Routes/Site/site.php';
    require __DIR__ . '/Routes/Admin/auth.php';
    require __DIR__ . '/Routes/Admin/marketplace.php';
});


