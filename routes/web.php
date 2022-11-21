<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});

Route::redirect('lecturer', 'lecturer/schedule');
Route::get('lecturer/schedule', [ScheduleController::class, 'index']);

Route::redirect('manager', 'manager/schedule');
Route::get('manager/schedule', [ScheduleController::class, 'index']);
Route::get('manager/users', [UserController::class, 'index']);

Route::get('admin', function () {return view('admin/index');});
Route::get('admin/users', [UserController::class, 'index']);
Route::get('admin/subjects', [SubjectController::class, 'index']);