<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/admin', DashboardController::class)->name('admin.dashboard');
});
