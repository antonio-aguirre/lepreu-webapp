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

Route::get('/dudas-zoom/add','QuestionController@create');
Route::post('/dudas-zoom','QuestionController@store');



Route::middleware('auth')->group(function () {
    Route::get('/link-zoom','LinkZoomController@create');
    Route::get('/link-zoom/add','LinkZoomController@create');
});

Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');