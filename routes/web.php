<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('manager/users/edit', '/manager/users');//TODO: display modal/warning about missing $code
Route::get('manager/users/edit/{code}', function () {return view('admin/user-edit');});
Route::get('manager/users/add', function () {return view('admin.user-edit');});

Route::get('admin', function () {return view('admin/index');});
Route::get('admin/users', function () {return view('admin/users');});
Route::get('admin/subjects', function () {return view('admin/subjects');});

Route::redirect('admin/users/edit', '/admin/users');//TODO: display modal/warning about missing $code
Route::get('admin/users/edit/{code}', function () {return view('admin/user-edit');});
Route::get('admin/users/add', function () {return view('admin.user-edit');});
