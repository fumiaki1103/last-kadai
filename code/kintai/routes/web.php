<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;

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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 出勤・退勤の打刻ページ
Route::get('/attendance', [AttendanceController::class, 'create'])->name('attendance');
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');

// 出退勤データの編集ページ
Route::get('/attendance/{id}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
Route::post('/attendance/{id}', [AttendanceController::class, 'update'])->name('attendance.update');

// 1か月の出退勤表のページ
Route::get('/attendance-summary', [AttendanceController::class, 'index'])->name('attendance.summary');
