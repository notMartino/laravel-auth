<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'CarController@carView') -> name('indexLink');

Route::get('/test/create/car', 'CarController@createCarView') -> name('createCarLink');
Route::post('/test/store/car', 'CarController@storeCar') -> name('storeCarLink');

Route::get('/test/details/pilot/{id}', 'PilotController@pilotDetailsView') -> name('pilotDetailsLink');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
