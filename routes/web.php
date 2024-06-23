<?php

use App\Http\Controllers\EscortController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('escorts', EscortController::class);
