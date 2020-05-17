<?php

/*Rutas de autenticacion (AUTH)*/
Route::namespace('Auth')->name('auth.')->group(function () {
    
    require __DIR__.'/auth.php';

});

/* Rutas publicas (FRONTOFFICE) */
Route::namespace('Frontoffice')->name('frontoffice.')->group(function () {

    require __DIR__.'/frontoffice.php';

});

/* Rutas para usuarios reguares autenticados (BACKOFFICE) */
Route::namespace('Backoffice')->name('backoffice.')->prefix('backoffice')->middleware(['auth'])->group(function () {

    require __DIR__.'/backoffice.php';

});


/* Rutas administrativas (ADMIN) */
Route::namespace('Admin')->name('admin.')->prefix('admin')->middleware(['auth:admin'])->group(function () {

    require __DIR__.'/admin.php';

});