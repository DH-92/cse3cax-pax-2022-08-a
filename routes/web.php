<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectInstanceController;
use App\Http\Controllers\SubjectController;
 use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ForgotPasswordController;
use Doctrine\DBAL\Schema\Index;

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

// lecturer routes 
Route::redirect('lecturer', 'lecturer/schedule');
Route::get('lecturer/schedule', [SubjectInstanceController::class, 'index']);

// manager routes
Route::redirect('manager', 'manager/schedule');
Route::get('manager/schedule', [SubjectInstanceController::class, 'index']);
Route::get('manager/users', [UserController::class, 'index']);
Route::get('manager/schedule', function () {return view('manager/schedule');});
Route::get('manager/users', function () {return view('admin/users');});
Route::redirect('manager/users/edit', '/manager/users');//TODO: display modal/warning about missing $code
Route::get('manager/users/edit/{code}', function () {return view('admin/user-edit');});
Route::get('manager/users/add', function () {return view('admin.user-edit');});

// admin routes 
Route::get('admin', function () {return view('admin/index');});
Route::get('admin/users', [UserController::class, 'index']);
Route::get('admin/subjects', [SubjectController::class, 'index']);
Route::redirect('admin/users/edit', '/admin/users');//TODO: display modal/warning about missing $code
Route::get('admin/users/edit/{code}', function () {return view('admin/user-edit');});
Route::get('admin/users/add', function () {return view('admin.user-edit');});
Route::redirect('admin/subjects/edit', '/admin/subjects');//TODO: display modal/warning about missing $code
Route::get('admin/subjects/edit/{code}', [SubjectController::class, 'edit']);
Route::post('admin/subjects/edit/{code}', [SubjectController::class, 'update']);
Route::get('admin/subjects/add', [SubjectController::class, 'create']);
Route::post('admin/subjects/add', [SubjectController::class, 'store']);
Route::get('admin/subjects/delete/{code}', [SubjectController::class, 'destroy']);


// auth/PW routes
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password');
Route::post('custom-password', [ChangePasswordController::class, 'customPassword'])->name('custom.password');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
