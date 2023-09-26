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

Route::get('welcome', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // update user profile
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/user/profile', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // dashboard

    Route::get('/dashboard',function (){return view('dashboard.dashboard') ;})->name('dashboard');

    Route::get('students', [StudentController::class, 'index'])->name('student.index');
    Route::get('students/all', [StudentController::class, 'all'])->name('students.all');
    Route::patch('students', [StudentController::class, 'update'])->name('student.update');
    Route::delete('students', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::post('students', [StudentController::class, 'store'])->name('student.store');
  
    // categories
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::patch('categories', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('categories/addSub', [CategoryController::class, 'addSub'])->name('categories.addSub');
    
    // sections
    Route::get('sections', [SectionController::class, 'index'])->name('sections.index');
    Route::patch('sections', [SectionController::class, 'update'])->name('sections.update');
    Route::delete('sections', [SectionController::class, 'destroy'])->name('sections.destroy');
    Route::post('sections', [SectionController::class, 'store'])->name('sections.store');
    Route::post('sections/addSub', [SectionController::class, 'addSub'])->name('sections.addSub');
    
    // add student in home not admin dashboard
    Route::get('/addStudent', [StudentController::class, 'show'])->name('addstudent');
    Route::post('/addStudent/add', [StudentController::class, 'add'])->name('addstudent.add');    
    
    // profile page
    Route::get('profile', [ProfilecardsController::class, 'index'])->name('profile');
    Route::get('rating', [RatingController::class, 'index'])->name('rating');
    Route::get('websites', [WebsiteController::class, 'index'])->name('websites');
    Route::post('rating/like', [RatingController::class, 'like'])->name('rating.like');

    // parents
    Route::get('parents',[ParentController::class,'index'])->name("parents.index");
    Route::post('parents',[ParentController::class,'store'])->name("parents.store");
    Route::post('parents/search',[ParentController::class,'search'])->name("parents.search");
    Route::delete('parents',[ParentController::class,'destroy'])->name("parents.destroy");
});
Route::get('/', function()
{
    return View('home.home');
})->name("home");

Route::get('courses',[CoursesController::class,'index'])->name("courses");

Route::get('html/images', function()
{
    return View('home.html.images');
})->name("html.images");;
Route::get('html/videos', function()
{
    return View('home.html.videos');
})->name("html.videos");;
Route::get('html/lessons', function()
{
    return View('home.html.lessons');
})->name("html.lessons");;

// contact
Route::post('contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact');





require __DIR__.'/auth.php';
