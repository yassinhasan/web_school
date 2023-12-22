<?php

use App\Http\Controllers\Auth\Student\AuthenticatedSessionController as StudentAuthenticatedSessionController;
use App\Http\Controllers\Auth\User\AuthenticatedSessionController;
use App\Http\Controllers\Home\ProfileController;
use Illuminate\Support\Facades\Route;



// Route::middleware(['auth:admin'])->group(function () {

//     Route::post('admin/logout', [AdminController::class, 'destroy'])
//                 ->name('admin.logout');
// });

Route::middleware('auth:user,student,admin')->group(function () {

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/user/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('user.logout');
    Route::post('/student/logout', [StudentAuthenticatedSessionController::class, 'destroy'])
    ->name('student.logout');

});



