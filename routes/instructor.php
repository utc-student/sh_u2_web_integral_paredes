<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('instructor.dashboard');
});

/* Cursos */
Route::resource('courses', CourseController::class);