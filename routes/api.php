<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('roles', RoleController::class)->name('api.roles');

Route::post('classrooms', ClassroomController::class)->name('api.classrooms');
