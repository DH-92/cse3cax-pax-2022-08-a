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
Route::get('lecturer/schedule', [ScheduleController::class, 'lecturerSchedule'])->middleware('auth:0');

// manager routes
Route::redirect('manager', 'manager/schedule');
Route::get('manager/schedule', [ScheduleController::class, 'index'])->middleware('auth:1');
Route::get('manager/users', [UserController::class, 'index'])->middleware('auth:1');
// Route::get('manager/schedule', function () {return view('manager/schedule');});
// Route::redirect('manager/users', '/admin/users');
Route::get('manager/users', [UserController::class, 'index'])->middleware('auth:1');
Route::redirect('manager/users/edit', '/manager/users');            //TODO: display modal/warning about missing $code
//Route::get('admin/users/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::get('manager/users/edit/{id}', [UserController::class, 'edit'])->middleware('auth:1');
Route::post('manager/users/edit/{id}', [UserController::class, 'update'])->middleware('auth:1');
Route::get('manager/users/add', [UserController::class, 'create'])->middleware('auth:1');
Route::post('manager/users/add', [UserController::class, 'store'])->middleware('auth:1');
Route::get('manager/users/delete/{id}', [UserController::class, 'destroy'])->middleware('auth:1');

Route::post('instance/create', [ScheduleController::class, 'storeInstance'])->middleware('auth:1');
Route::post('instance/assignLecturer', [ScheduleController::class, 'assignLecturer'])->middleware('auth:1');
Route::post('schedule/publish', [ScheduleController::class, 'publishSchedule'])->middleware('auth:1');

// admin routes
Route::redirect('administrator', 'admin');
Route::get('admin', function () {
    return view('admin/index');
})->middleware('auth:2');
Route::get('admin/users', [UserController::class, 'index'])->middleware('auth:2');
Route::get('admin/subjects', [SubjectController::class, 'index'])->middleware('auth:2');
Route::redirect('admin/users/edit', '/admin/users');                //TODO: display modal/warning about missing $code
Route::get('admin/users/edit/{id}', [UserController::class, 'edit'])->middleware('auth:2');
Route::post('admin/users/edit/{id}', [UserController::class, 'update'])->middleware('auth:2');
Route::get('admin/users/add', [UserController::class, 'create'])->middleware('auth:2');
Route::post('admin/users/add', [UserController::class, 'store'])->middleware('auth:2');
Route::get('admin/users/delete/{id}', [UserController::class, 'destroy'])->middleware('auth:2');
Route::redirect('admin/subjects/edit', '/admin/subjects');          //TODO: display modal/warning about missing $code
Route::get('admin/subjects/edit/{code}', [SubjectController::class, 'edit'])->middleware('auth:2');
Route::post('admin/subjects/edit/{code}', [SubjectController::class, 'update'])->middleware('auth:2');
Route::get('admin/subjects/add', [SubjectController::class, 'create'])->middleware('auth:2');
Route::post('admin/subjects/add', [SubjectController::class, 'store'])->middleware('auth:2');
Route::get('admin/subjects/delete/{code}', [SubjectController::class, 'destroy'])->middleware('auth:2');

// auth/PW routes
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout')->middleware('auth');

Route::get('modal/assignLecturer/{id}', [ModalController::class, 'assignLecturer'])->middleware('auth:1');
Route::get('modal/createInstance/{id}', [ModalController::class, 'createInstance'])->middleware('auth:1');
Route::get('modal/publish/{id}', [ModalController::class, 'publish'])->middleware('auth:1');

Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password')->middleware('auth');
Route::post('custom-password', [ChangePasswordController::class, 'customPassword'])->name('custom.password')->middleware('auth');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/unauthorized', function () {return view('auth.unauthorized');});

Route::controller(UserController::class)->group(function(){
   // Route::get('users', 'index');
    Route::get('users-export', 'export')->name('users.export')->middleware('auth');
    Route::post('users-import', 'import')->name('users.import')->middleware('auth');
});

Route::controller(SubjectController::class)->group(function(){
    // Route::get('users', 'index');
     Route::get('subjects-export', 'export')->name('subjects.export');
     Route::post('subjects-import', 'import')->name('subjects.import');
 });
