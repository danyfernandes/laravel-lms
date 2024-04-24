<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

/**
 * STATIC VIEWS COURSES
 */
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

require __DIR__ . '/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/student.php';
