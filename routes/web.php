<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('register', [UserController::class, 'register'])->name('user.register');
Route::post('register', [UserController::class, 'postRegister']);
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'postLogin']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('lop-hoc', LopHocController::class);
    Route::resource('student', StudentController::class);
});

Route::get('logon', [UserController::class, 'adminLogin'])->name('admin.login');
Route::post('logon', [UserController::class, 'postLoginAdmin']);