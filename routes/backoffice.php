<?php

Route::get('/dashboard', 'DashboardController@index')->name('account.dashboard');

// ------------------ Account --------------------
Route::get('/my-account', 'AccountController@myAccount')->name('account.myAccount');
Route::post('/update-my-account', 'AccountController@UpdateMyAccount')->name('account.updateMyAccount');