<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/Route::domain(config('app.domain'))->group(function () {
    Route::namespace('\\App\\Http\\Controllers')->group(function () {
        Route::get('/sendgrid/rescue', 'SendgridResuceController@index')->name('sendgrid.rescue');
        Route::middleware('cache.headers:public;max_age=7200;etag')->group(function () {
            Route::get('/', 'WelcomeController@index')->name('welcome');
            Route::resource('/species', SpeciesController::class);
            Route::resource('/animals', AnimalController::class);
            Route::resource('/breeders', BreederController::class);
            Route::resource('/vendors', VendorController::class);
        });

        Route::middleware(['auth:sanctum', 'verified'])->group(function () {
            Route::get('/dashboard',  'DashboardController@index')->name('dashboard');
        });
    });

});




