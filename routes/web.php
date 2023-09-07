<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // dashboard
    Route::get('/dashboard',function (){

           return view('dashboard.dashboard') ;
    })->name('dashboard');
    Route::get('/students', [StudentController::class, 'index'])->name('student.index');
    Route::patch('/students', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/students', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::post('/students', [StudentController::class, 'store'])->name('student.store');

    });
Route::get('/', function()
{
    return View('home.index');
})->name("home");
Route::get('profile', function()
{
    return View('home.profile');
})->name("profile");;
Route::get('courses', function()
{
    return View('home.courses');
})->name("courses");
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



require __DIR__.'/auth.php';
