<?php

use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\LessonController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
  Route::prefix('dashboard')->group(function () {
    Route::get('/', DashboardController::class)->name('student.dashboard');

    Route::controller(CourseController::class)->group(function () {
      Route::get('/courses/{course}', 'show')->name('student.courses.show');
    });

    Route::controller(LessonController::class)->group(function () {
      Route::get('/courses/{course}/lessons/{lesson}', 'show')->name('student.courses.lessons.show');
    });
  });
});
