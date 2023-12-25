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
use App\Http\Controllers\Auth\User\ConfirmablePasswordController as UserConfirmablePasswordController;
use App\Http\Controllers\Auth\User\EmailVerificationNotificationController as UserEmailVerificationNotificationController;
use App\Http\Controllers\Auth\User\EmailVerificationPromptController as UserEmailVerificationPromptController;
use App\Http\Controllers\Auth\User\PasswordController as UserPasswordController;
use App\Http\Controllers\Auth\user\TwoFactorController as UserTwoFactorController;
use App\Http\Controllers\Auth\User\VerifyEmailController as UserVerifyEmailController;
use App\Http\Controllers\Auth\VerifyEmailController;

use Illuminate\Support\Facades\Route;



Route::middleware('auth:user')->group(function () {
    Route::get('user/verify-email', UserEmailVerificationPromptController::class)
                ->name('user.verification.notice');

    Route::get('user/verify-email/{id}/{hash}', UserVerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('user.verification.verify');

    Route::post('user/email/verification-notification', [UserEmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('user.verification.send');

    Route::get('user/confirm-password', [UserConfirmablePasswordController::class, 'show'])
                ->name('user.password.confirm');

    Route::post('user/confirm-password', [UserConfirmablePasswordController::class, 'store']);

    Route::put('user/password', [UserPasswordController::class, 'update'])->name('user.password.update');


    // otp
    Route::get('user/otp-verify', [UserTwoFactorController::class, 'index'])->name('user.otp-verify');
    Route::post('user/otp-verify', [UserTwoFactorController::class, 'confirm'])->name('user.otp-confirm');


});
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




