<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Admin Panel";
})->name("dashboard");