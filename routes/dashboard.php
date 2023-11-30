<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfilecardsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\WebsiteController;
use App\Http\Livewire\Tester;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth','two_factor')->group(function () {
Route::middleware('auth')->group(function () {

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
});