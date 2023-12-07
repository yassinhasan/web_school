<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfilecardsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
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

// Route::get('html/lessons', [CoursesController::class, 'index'])->name("courses");

// Route::get('html/images', function () {
//     return View('home.html.images');
// })->name("html.images");;
// Route::get('html/videos', function () {
//     return View('home.html.videos');
// })->name("html.videos");;
// Route::get('html/lessons', function () {
//     return View('home.html.lessons');
// })->name("html.lessons");;

// contact
Route::post('contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact');
