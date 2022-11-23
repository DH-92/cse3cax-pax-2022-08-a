<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalController;

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
Route::get('lecturer/schedule', function () {return view('lecturer/schedule');});

Route::redirect('manager', 'manager/schedule');
Route::get('manager/schedule', function () {return view('manager/schedule');});
Route::get('manager/users', function () {return view('admin/users');});

Route::get('admin', function () {return view('admin/index');});
Route::get('admin/users', function () {return view('admin/users');});
Route::get('admin/subjects', function () {return view('admin/subjects');});

Route::get('modal/assignLecturer/{id}', [ModalController::class, 'assignLecturer']);
Route::get('modal/createInstance/{id}', [ModalController::class, 'createInstance']);
Route::get('modal/import', [ModalController::class, 'import']);
