<?php 

/*Ruta configurada para el login administrativo */
$loginRoute = setting('route_login_panel', '/panel');

/*Login Administrativo GET */
Route::get("$loginRoute", 'AdminLoginController@show')->name('admin.login.show');

/*Login Administrativo POST*/
Route::post("/a/verify", 'AdminLoginController@login')->name('admin.login.verify');

/*Logout Administrativo*/
Route::get("/a/logout", 'AdminLoginController@logout')->name('admin.logout');

/*Rutas de autenticacion para usuarios regulares */
Route::prefix('user')->group(function () {

	/*Login regular GET */
    Route::get('/login', 'LoginController@show')->name('user.login.show');

    /*Login regular POST */
    Route::post('/login/verify', 'LoginController@login')->name('user.login.verify');

    /*Logout regular*/
    Route::get('/logout', 'LoginController@logout')->name('user.logout');

    /*Registro regular GET*/
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('user.register');
    /*Registro regular POST*/

    Route::post('/register', 'RegisterController@register')->name('user.register.create');

    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');

    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.reset.post');

    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    
});
