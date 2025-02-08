<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('greet');
});

Route::resource('tasks', TaskController::class);
