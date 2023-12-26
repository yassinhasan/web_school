<?php
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\Student\ConfirmablePasswordController as StudentConfirmablePasswordController;
use App\Http\Controllers\Auth\Student\EmailVerificationNotificationController as StudentEmailVerificationNotificationController;
use App\Http\Controllers\Auth\Student\EmailVerificationPromptController as StudentEmailVerificationPromptController;
use App\Http\Controllers\Auth\Student\PasswordController as StudentPasswordController;
use App\Http\Controllers\Auth\Student\TwoFactorController as StudentTwoFactorController;
use App\Http\Controllers\Auth\Student\VerifyEmailController as StudentVerifyEmailController;
use App\Http\Controllers\Auth\TwoFactorController ;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\OnlineCourseController;
use App\Http\Controllers\Dashboard\ParentController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Auth\Student\StudentController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\AttendanceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Livewire\Calendar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\StudentProfileController;
use App\Http\Controllers\Auth\Student\AuthenticatedSessionController as StudentAuthenticatedSessionController;
use Livewire\Livewire;

Route::middleware('auth:student')->group(function () {
    Route::get('student/verify-email', StudentEmailVerificationPromptController::class)
                ->name('student.verification.notice');

    Route::get('student/verify-email/{id}/{hash}', StudentVerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('student.verification.verify');

    Route::post('student/email/verification-notification', [StudentEmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('student.verification.send');

    Route::get('student/confirm-password', [StudentConfirmablePasswordController::class, 'show'])
                ->name('student.password.confirm');

    Route::post('student/confirm-password', [StudentConfirmablePasswordController::class, 'store']);

    Route::put('student/password', [StudentPasswordController::class, 'update'])->name('student.password.update');


    // otp
    Route::get('student/otp-verify', [StudentTwoFactorController::class, 'index'])->name('student.otp-verify');
    Route::post('student/otp-verify', [StudentTwoFactorController::class, 'confirm'])->name('student.otp-confirm');

});
