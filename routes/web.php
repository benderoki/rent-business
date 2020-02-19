<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::redirect('/', '/login');

Route::namespace('Web')->name('web.')->middleware(['auth'])->group(function () {

    Route::resource('companies', 'CompanyController')->only('create', 'store');

    Route::middleware('has_company')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('offices/table', 'OfficeController@table')->name('offices.table');
        Route::resource('offices', 'OfficeController');

        Route::get('rentables/table', 'RentableController@table')->name('rentables.table');
        Route::resource('rentables', 'RentableController');

        Route::get('clients/table', 'ClientController@table')->name('clients.table');
        Route::resource('clients', 'ClientController');
        Route::get('clients/{client}/messages/table', 'ClientMessageController@table')
            ->name('clients.messages.table');
        Route::post('clients/{client}/messages','ClientMessageController@store')
            ->name('clients.messages.store');

        Route::post('bookings/{booking}/start', 'BookingController@start')->name('bookings.start');
        Route::post('bookings/{booking}/complete', 'BookingController@complete')->name('bookings.complete');
        Route::post('bookings/{booking}/cancel', 'BookingController@cancel')->name('bookings.cancel');
        Route::post('bookings/{booking}/notifyAboutBooking', 'BookingController@notifyAboutBooking')
            ->name('bookings.notifyAboutBooking');
        Route::get('bookings/table', 'BookingController@table')->name('bookings.table');
        Route::resource('bookings', 'BookingController');
    });
});

