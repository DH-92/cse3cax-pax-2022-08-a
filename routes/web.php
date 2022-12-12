<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectInstanceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ForgotPasswordController;
use Doctrine\DBAL\Schema\Index;
use App\Http\Controllers\ScheduleController;

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

Route::redirect('/', 'login');

// lecturer routes
Route::redirect('lecturer', 'lecturer/schedule');
Route::get('lecturer/schedule', [ScheduleController::class, 'index']);

// manager routes
Route::redirect('manager', 'manager/schedule');
Route::get('manager/schedule', [ScheduleController::class, 'index']);
Route::get('manager/users', [UserController::class, 'index']);
// Route::get('manager/schedule', function () {return view('manager/schedule');});
Route::get('manager/users', [UserController::class, 'index']);
Route::redirect('manager/users/edit', '/manager/users');//TODO: display modal/warning about missing $code
Route::get('admin/users/edit/{id}', [UserController::class, 'edit']);
Route::get('manager/users/edit/{id}', [UserController::class, 'edit']);
Route::post('manager/users/edit/{id}', [UserController::class, 'update']);
Route::get('manager/users/add', [UserController::class, 'create']);
Route::post('manager/users/add', [UserController::class, 'store']);
Route::get('manager/users/delete/{id}', [UserController::class, 'destroy']);

Route::post('instance/create', [ScheduleController::class, 'storeInstance']);
Route::post('instance/assignLecturer', [ScheduleController::class, 'assignLecturer']);

// admin routes
Route::get('admin', function () {return view('admin/index');});
Route::get('admin/users', [UserController::class, 'index']);
Route::get('admin/subjects', [SubjectController::class, 'index']);
Route::redirect('admin/users/edit', '/admin/users');//TODO: display modal/warning about missing $code
Route::get('admin/users/edit/{id}', [UserController::class, 'edit']);
Route::post('admin/users/edit/{id}', [UserController::class, 'update']);
Route::get('admin/users/add', [UserController::class, 'create']);
Route::post('admin/users/add', [UserController::class, 'store']);
Route::get('admin/users/delete/{id}', [UserController::class, 'destroy']);
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

Route::get('modal/assignLecturer/{id}', [ModalController::class, 'assignLecturer']);
Route::get('modal/createInstance/{id}', [ModalController::class, 'createInstance']);
Route::get('modal/import', [ModalController::class, 'import']);
