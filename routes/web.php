<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;

Route::resource('customers', CustomerController::class);
Route::resource('projects', ProjectController::class);

Route::get('/customers/{customer}/projects', [ProjectController::class, 'indexByCustomer'])
    ->name('customers.projects.index');
