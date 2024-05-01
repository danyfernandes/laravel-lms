<?php

use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\LessonController;
use App\Http\Controllers\Student\ReviewController;
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

    Route::controller(ReviewController::class)->group(function () {
      Route::get('/courses/{course}/reviews/create', 'create')->name('student.courses.reviews.create');
      Route::post('/courses/{course}/reviews', 'store')->name('student.courses.reviews.store');
      Route::get('/courses/{course}/reviews/{id}', 'show')->name('student.courses.reviews.show');
      Route::get('/courses/{course}/reviews/{id}/edit', 'edit')->name('student.courses.reviews.edit');
      Route::patch('/courses/{course}/reviews/{id}', 'update')->name('student.courses.reviews.update');
      Route::delete('/courses/{course}/reviews/{id}', 'destroy')->name('student.courses.reviews.destroy');
    });
  });
});
