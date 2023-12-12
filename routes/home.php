<?php

use App\Http\Controllers\Home\CoursesController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Home\RatingController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Home\WebsiteController;
use App\Http\Controllers\Home\ContactUsFormController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProfilecardsController ;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:user,admin')->group(function () {
    // add student in home not admin dashboard
    Route::get('/addStudent', [StudentController::class, 'show'])->name('addstudent');
    Route::post('/addStudent/add', [StudentController::class, 'add'])->name('addstudent.add');

    // profile page
    Route::get('cards', [ProfilecardsController::class, 'index'])->name('cards');
    Route::get('rating', [RatingController::class, 'index'])->name('rating');
    Route::get('websites', [WebsiteController::class, 'index'])->name('websites');
    Route::post('rating/like', [RatingController::class, 'like'])->name('rating.like');

});


// Route::middleware('two_factor')->group(function () {
//     Route::get('/', function () {
//         return View('home.home');
//     })->name("home");

// });

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('courses', [CoursesController::class, 'index'])->name("courses");

Route::get('/trainning/{slug}', [SectionController::class,'index']);
// contact
Route::post('contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact');
