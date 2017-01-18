<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**
 * TODO: King, figure out how to move this into a service provider.
 */
use Periods\PeriodsController;
use Periods\Accounts\AccountsController;

Route::get('/', function () {
  $p = ['Isaac', 'White'];
    return view('welcome', compact('p'));
});

Route::get('periods', PeriodsController::class.'@index');

Route::get('periods/{period}', PeriodsController::class.'@show');

Route::post('periods', PeriodsController::class.'@store');

Route::post('periods/{period}/accounts', AccountsController::class.'@store');

Route::delete('periods/accounts/{account}', AccountsController::class.'@destroy');
