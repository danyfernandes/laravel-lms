<?php

use App\Http\Controllers\Admin\DashboardController;
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
  });
});
