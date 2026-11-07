<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('employees.index'));

// Login / Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Only logged-in admins
Route::middleware('auth')->group(function () {
    Route::resource('departments', DepartmentController::class)->except(['create', 'show']);
    Route::resource('employees', EmployeeController::class);
});