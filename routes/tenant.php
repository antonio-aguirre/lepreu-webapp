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

Route::get('/index','ConfigController@configurations')->name('index');

// RUTAS DEL FORMULARIO DE DUDAS
Route::post('/dudas-zoom','QuestionController@store');

// RUTAS PAR CUANDO SE HAYA LOGUEADO
Route::middleware('auth')->group(function () {
    //Route::get('/link-zoom/panel','LinkZoomController@create'); //show the view to add the Zoom ID
    //Route::post('/link-zoom','LinkZoomController@store');
    Route::resource('/link-zoom','LinkZoomController');
    Route::delete('/link-zoom/{id}/_delete','LinkZoomController@destroy');
    Route::post('/link-zoom/{id}/_edit','LinkZoomController@update');

    Route::delete('/dudas-zoom/{id}','QuestionController@destroy');
});

//Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');