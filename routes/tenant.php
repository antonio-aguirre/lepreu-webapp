<?php

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider
| with the tenancy and web middleware groups. Good luck!
|
*/

/*Route::get('/', function () {
    return view('welcome');
})->name('start');*/

Auth::routes();


// En App\Http\Middleware\Authenticate.php configuramos para saber a donde dirigir despues del
// login
Route::get('/index','ConfigController@configurations')->name('index');

// RUTAS DEL FORMULARIO DE DUDAS
Route::post('/dudas-zoom','QuestionController@store');

Route::get('/registeruser/add','RegistrationController@create');
Route::post('/registeruser','RegistrationController@store');

// RUTAS PAR CUANDO SE HAYA LOGUEADO
Route::middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    

    Route::middleware('admin')->group(function () {

        Route::resource('/link-zoom','LinkZoomController');
        Route::delete('/link-zoom/{id}/_delete','LinkZoomController@destroy');
        Route::post('/link-zoom/{id}/_edit','LinkZoomController@update');
        Route::delete('/dudas-zoom/{id}','QuestionController@destroy');
        
    });

    Route::middleware('anciano')->group(function () {

    });
});


