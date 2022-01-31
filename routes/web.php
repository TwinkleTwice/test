<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
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

Route::middleware('auth')->group(function (){
    Route::get('/checks', [IndexController::class, 'checks'])->name('checks');
    Route::get('check_form', [AuthController::class, 'checkForm'])->name('check_form');
    Route::post('check_upload_process', [AuthController::class, 'update'])->name('check_upload_process');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function (){
    Route::get('/', [IndexController::class, 'index'])->name('home');

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login_process', [AuthController::class, 'login'])->name('login_process');

    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register_process', [AuthController::class, 'register'])->name('register_process');
});




