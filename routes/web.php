<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfilecardsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\WebsiteController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/home.php';
