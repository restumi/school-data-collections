<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');

    Route::resource('kelas', KelasController::class);
    Route::resource('student', StudentController::class);
    Route::resource('teacher', TeacherController::class);
});
