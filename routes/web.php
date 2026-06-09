<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'services')->name('services');

Route::post('/applications', [ApplicationController::class, 'store'])
    ->name('applications.store');

Route::get('/applications', [ApplicationController::class, 'index'])
    ->name('applications.index');
