<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

Route::resource('cruds', CrudController::class);

Route::get('/', function () {
    return view('welcome');
});