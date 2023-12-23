<?php

use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\Auth\Student\AuthenticatedSessionController as StudentAuthenticatedSessionController;
use App\Http\Controllers\Auth\Student\NewPasswordController as StudentNewPasswordController;
use App\Http\Controllers\Auth\Student\PasswordResetLinkController as StudentPasswordResetLinkController;
use App\Http\Controllers\Auth\Student\RegisteredUserController as StudentRegisteredUserController;
use App\Http\Controllers\Auth\User\AuthenticatedSessionController as UserAuthenticatedSessionController;
use App\Http\Controllers\Auth\User\NewPasswordController as UserNewPasswordController;
use App\Http\Controllers\Auth\User\PasswordResetLinkController as UserPasswordResetLinkController;
use App\Http\Controllers\Auth\User\RegisteredUserController as UserRegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('user/register', [UserRegisteredUserController::class, 'create'])->name('user.register');
  
    Route::post('user/register', [UserRegisteredUserController::class, 'store']);


    Route::get('user/login', [UserAuthenticatedSessionController::class, 'create'])
        ->name('user.login');

    Route::post('user/login', [UserAuthenticatedSessionController::class, 'store']);

    Route::get('user/forgot-password', [UserPasswordResetLinkController::class, 'create'])
        ->name('user.password.request');

    Route::post('/user/forgot-password', [UserPasswordResetLinkController::class, 'store'])
        ->name('user.password.email');

    Route::get('user/reset-password/{token}', [UserNewPasswordController::class, 'create'])
        ->name('user.password.reset');

    Route::post('user/reset-password', [UserNewPasswordController::class, 'store'])
        ->name('user.password.store');

    // student add by register
    Route::get('student/register', [StudentRegisteredUserController::class, 'create'])->name('student.register');
    Route::post('student/register', [StudentRegisteredUserController::class, 'store']);
    


    Route::get('student/login', [StudentAuthenticatedSessionController::class, 'create'])
        ->name('student.login');

    Route::post('student/login', [StudentAuthenticatedSessionController::class, 'store']);

    Route::get('student/forgot-password', [StudentPasswordResetLinkController::class, 'create'])
        ->name('student.password.request');

    Route::post('student/forgot-password', [StudentPasswordResetLinkController::class, 'store'])
        ->name('student.password.email');

    Route::get('student/reset-password/{token}', [StudentNewPasswordController::class, 'create'])
        ->name('student.password.reset');

    Route::post('reset-password', [StudentNewPasswordController::class, 'store'])
        ->name('student.password.store');

    // admin
    Route::get('admin/login', [AdminController::class, 'create'])
        ->name('admin.login');
    Route::post('admin/login', [AdminController::class, 'store']);
});
