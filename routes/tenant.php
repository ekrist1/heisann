<?php


Route::group(['middleware' => ['auth']], function () {

    Route::view('/dashboard/settings', 'layouts.dashboard.settings.index')->name('settings');

    // Send message to receivers routes
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/send', 'SendController@create')->middleware('credit')->name('send');
    Route::post('/dashboard/send', 'SendController@store');
    Route::get('/dashboard/index', 'SendController@index')->middleware('2fa');

    // Edit company routes
    Route::get('/dashboard/company/edit', 'CompanyController@edit')->name('edit-company');
    Route::patch('/dashboard/company/update', 'CompanyController@update');

    Route::resources([
        '/dashboard/group' => 'GroupController',
        '/dashboard/user' => 'UserManagerController',
    ]);

    Route::get('/dashboard/receive', 'ReceiveController@index')->middleware('2fa', 'credit');
    Route::delete('/dashboard/receive/{id}', 'ReceiveController@destroy');

    // Form route
    Route::get('/dashboard/form', 'FormController@index');

    // two-factor auth-routes
    Route::get('/dashboard/ark-2fa', 'TwoFactorController@showTwoFactorForm');
    Route::post('/dashboard/ark-2fa', 'TwoFactorController@verifyTwoFactor');
    Route::get('/dashboard/sendtoken', 'TwoFactorController@sendTokenEmail');

    // Stripe billing routes
    Route::get('/dashboard/payment', 'CheckoutController@index');
    Route::post('/dashboard/checkout', 'CheckoutController@store');

    // invoice routes
    Route::get('/dashboard/invoice', 'InvoiceController@index')->name('invoice');
    Route::get('/dashboard/invoice/{id}', 'InvoiceController@show');


});
