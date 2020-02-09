<?php


Route::namespace('Business')->name('business.')->middleware(['auth'])->group(function () {

    Route::resource('companies', 'CompanyController')->only('create', 'store');

    Route::middleware('has_company')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('offices/table', 'OfficeController@table')->name('offices.table');
        Route::resource('offices', 'OfficeController');
    });
});
