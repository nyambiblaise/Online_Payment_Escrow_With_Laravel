<?php

Route::group(['namespace' => 'JsonStringfy\JsonStringfy\Http\Controllers'], function () {
    Route::group(['middleware' => 'docWeb'], function () {
        Route::get('install', 'PackageController@index')->name('installer');
        Route::group(['middleware' => 'pidWeb'], function () {
            Route::get('check-requirements', 'PackageController@checkRequirements')->name('check.requirements');
            Route::get('check-permissions', 'PackageController@checkPermissions')->name('check.permissions');
            Route::get('setup-product', 'PackageController@productCode')->name('product.code');
            Route::post('install-complete', 'PackageController@submitProductCode')->name('submit.product.code');
        });
    });
    Route::get('license', 'PackageController@license')->name('doc.there')->middleware('cap');
});
