<?php

use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\Auth\Student\AuthenticatedSessionController as StudentAuthenticatedSessionController;
use App\Http\Controllers\Auth\User\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\StudentProfileController;
use App\Http\Controllers\Home\ProfileController;
use Illuminate\Support\Facades\Route;



// Route::middleware(['auth:admin'])->group(function () {

//     Route::post('admin/logout', [AdminController::class, 'destroy'])
//                 ->name('admin.logout');
// });

Route::middleware('auth:user,student,admin')->group(function () {

    // Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    // Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::post('profile', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    // Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // student
    Route::get('student/profile', [StudentProfileController::class, 'edit'])->name('student.profile');
    Route::patch('student/profile', [StudentProfileController::class, 'update'])->name('student.profile.update');
    Route::post('student/profile', [StudentProfileController::class, 'updateImage'])->name('student.profile.updateImage');
    Route::delete('student/profile', [StudentProfileController::class, 'destroy'])->name('student.profile.destroy');

    Route::post('/user/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('user.logout');
    Route::post('/student/logout', [StudentAuthenticatedSessionController::class, 'destroy'])
    ->name('student.logout');
    Route::post('/admin/logout', [AdminController::class, 'destroy'])
    ->name('admin.logout');

});



