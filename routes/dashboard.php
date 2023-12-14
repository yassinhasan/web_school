<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\OnlineCourseController;
use App\Http\Controllers\Dashboard\ParentController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\AttendanceController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth','two_factor')->group(function () {
Route::middleware(['auth:admin'])->group(function () {

    Route::get('/dashboard',function (){return view('dashboard.dashboard') ;})->name('dashboard');

    Route::get('students', [StudentController::class, 'index'])->name('student.index');
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
    Route::patch('sections', [SectionController::class, 'update'])->name('sections.update');
    Route::delete('sections', [SectionController::class, 'destroy'])->name('sections.destroy');
    Route::post('sections', [SectionController::class, 'store'])->name('sections.store');
    Route::post('sections/addSub', [SectionController::class, 'addSub'])->name('sections.addSub');


    // parents
    Route::get('parents',[ParentController::class,'index'])->name("parents.index");
    Route::post('parents',[ParentController::class,'store'])->name("parents.store");
    Route::get('parents/search',[ParentController::class,'search'])->name("parents.search");
    Route::delete('parents',[ParentController::class,'destroy'])->name("parents.destroy");
   
    // posts in dashboard
    Route::get('posts/create',[PostController::class,'create'])->name("posts.create");
    Route::get('posts/edit/{id}',[PostController::class,'edit'])->name("posts.edit");
    Route::get('posts',[PostController::class,'index'])->name("posts.index");
    Route::post('posts/store',[PostController::class,'store'])->name("posts.store");
    Route::patch('posts/update',[PostController::class,'update'])->name("posts.update");
    Route::post('posts/getSection',[PostController::class,'getSection']);
    Route::post('posts/upload',[PostController::class,'upload'])->name("posts.upload");
    Route::post('posts/search',[PostController::class,'search'])->name("posts.search");
    Route::delete('posts/delete',[PostController::class,'destroy'])->name("posts.destroy");


    // settings
        // parents
        Route::get('settings',[SettingsController::class,'index'])->name("settings.index");
        Route::patch('settings',[SettingsController::class,'update'])->name("settings.update");
            // test zoom
        // update user profile
        Route::get('zoom', [OnlineCourseController::class, 'index'])->name('zoom.index');
        Route::patch('zoom', [OnlineCourseController::class, 'update'])->name('zoom.update');
        Route::post('zoom', [OnlineCourseController::class, 'store'])->name('zoom.store');
        Route::delete('zoom', [OnlineCourseController::class, 'destroy'])->name('zoom.destroy');

        // update attendance
        Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::patch('attendance', [AttendanceController::class, 'update'])->name('attendance.update');
        Route::post('attendance', [AttendanceController::class, 'store'])->name('attendance.store');
        Route::delete('attendance', [AttendanceController::class, 'destroy'])->name('attendance.destroy');
});
