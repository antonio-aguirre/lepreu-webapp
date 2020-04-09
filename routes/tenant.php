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

Route::post('/dudas-zoom','QuestionController@store');
Route::delete('/dudas-zoom/{id}','QuestionController@destroy');


Route::middleware('auth')->group(function () {
    Route::get('/link-zoom/panel','LinkZoomController@create'); //show the view to add the Zoom ID
    Route::post('/link-zoom','LinkZoomController@store');
});

Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');