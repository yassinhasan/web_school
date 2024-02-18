<?php

use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\Auth\User\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\StudentProfileController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\UserExportController;
use Illuminate\Support\Facades\Route;



// Route::middleware(['auth:admin'])->group(function () {

//     Route::post('admin/logout', [AdminController::class, 'destroy'])
//                 ->name('admin.logout');
// });

// Route::middleware('auth:user,student,admin')->group(function () {
Route::middleware('auth:admin')->group(function () {

    // Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    // Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::post('profile', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    // Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::post('/admin/logout', [AdminController::class, 'destroy'])
    ->name('admin.logout');

    Route::get("/users/export",[UserExportController::class,'export'])
    ->name('users-export');
});



