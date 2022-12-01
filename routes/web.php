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

Route::redirect('lecturer', 'lecturer/schedule');
Route::get('lecturer/schedule', [SubjectInstanceController::class, 'index']);

Route::redirect('manager', 'manager/schedule');
Route::get('manager/schedule', [SubjectInstanceController::class, 'index']);
Route::get('manager/users', [UserController::class, 'index']);

Route::get('admin', function () {return view('admin/index');});
Route::get('admin/users', [UserController::class, 'index']);
Route::get('admin/subjects', [SubjectController::class, 'index']);
Route::redirect('admin/subjects/edit', '/admin/subjects');//TODO: display modal/warning about missing $code
// Route::get('admin/subjects/edit/{code}', function () {return view('admin/subject-edit');});
Route::get('admin/subjects/edit/{code}', [SubjectController::class, 'edit']);
Route::post('admin/subjects/edit/{code}', [SubjectController::class, 'update']);
Route::get('admin/subjects/add', function () {return view('admin/subject-edit');});
Route::post('admin/subjects/add', [SubjectController::class, 'store']);
Route::get('admin/subjects/delete/{code}', [SubjectController::class, 'destroy']);



Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password');
Route::post('custom-password', [ChangePasswordController::class, 'customPassword'])->name('custom.password');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
