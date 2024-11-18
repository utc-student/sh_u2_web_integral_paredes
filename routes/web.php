<?php

use Illuminate\Support\Facades\Route;

Route::get('/mapa', function () {
    return view('map');
});

Route::get('/', function () {
    return view('welcome');
});