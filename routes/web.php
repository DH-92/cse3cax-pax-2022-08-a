<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ChangePasswordController;

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


Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password');
Route::post('custom-password', [ChangePasswordController::class, 'customPassword'])->name('custom.password');

