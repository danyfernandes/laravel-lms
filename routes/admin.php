<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
  Route::prefix('admin')->group(function () {
    Route::get('/', DashboardController::class)->name('admin.dashboard');

    Route::controller(UserController::class)->group(function () {
      Route::get('/users', 'index')->name('admin.users');
      Route::get('/users/create', 'create')->name('admin.users.create');
      Route::post('/users', 'store')->name('admin.users.store');
      Route::get('/users/{id}/edit', 'edit')->name('admin.users.edit');
      Route::patch('/users/{id}', 'update')->name('admin.users.update');
      Route::delete('/users/{id}', 'destroy')->name('admin.users.destroy');
    });

    Route::controller(CourseController::class)->group(function () {
      Route::get('/courses', 'index')->name('admin.courses');
      Route::get('/courses/create', 'create')->name('admin.courses.create');
      Route::post('/courses', 'store')->name('admin.courses.store');
      Route::get('/courses/{course}/edit', 'edit')->name('admin.courses.edit');
      Route::patch('/courses/{course}', 'update')->name('admin.courses.update');
      Route::delete('/courses/{crouse}', 'destroy')->name('admin.courses.destroy');
    });

    Route::controller(LessonController::class)->group(function () {
      Route::get('/courses/{course}/lessons/create', 'create')->name('admin.courses.lessons.create');
      Route::post('/courses/{course}', 'store')->name('admin.courses.lessons.store');
      Route::get('/courses/{course}/lessons/{lesson}/edit', 'edit')->name('admin.courses.lessons.edit');
      Route::patch('/courses/{course}/lessons/{lesson}', 'update')->name('admin.courses.lessons.update');
      Route::delete('/courses/{course}/lessons/{lesson}', 'destroy')->name('admin.courses.lessons.destroy');
    });

    Route::controller(EnrollmentController::class)->group(function () {
      Route::get('/enrollments', 'index')->name('admin.enrollments');
      Route::get('/enrollments/{user_id}', 'show')->name('admin.enrollments.show');
    });

    Route::controller(ReviewController::class)->group(function () {
      Route::get('/reviews', 'index')->name('admin.reviews');
      Route::get('/reviews/create', 'create')->name('admin.reviews.create');
      Route::post('/reviews', 'store')->name('admin.reviews.store');
      Route::get('/reviews/{id}/edit', 'edit')->name('admin.reviews.edit');
      Route::patch('/reviews/{id}', 'update')->name('admin.reviews.update');
      Route::delete('/reviews/{id}', 'destroy')->name('admin.reviews.destroy');
    });
  });
});
