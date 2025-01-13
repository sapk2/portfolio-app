<?php

use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Resumecontroller;
use App\Http\Middleware\isuser;
use App\Models\resume;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(isuser::class)->group(function () {
    Route::get('/users/dashboard', [Dashboardcontroller::class, 'userindex'])->name('users.dashboard');
    

    //resume management
    Route::get('/users/resume',[Resumecontroller::class,'index'])->name('users.resumes.index');
    //Route::get('/resume-create',[Resumecontroller::class,'create'])->name('users.resume.create');
    Route::post('/resume/store',[Resumecontroller::class,'store'])->name('users.resumes.store');
    Route::get('/resumes/{id}/edit',[Resumecontroller::class,'edit'])->name('users.resumes.edit');
    Route::post('/resumes/{id}/update',[Resumecontroller::class,'update'])->name('users.resumes.update');
    Route::get('/resumes/{id}/delete',[Resumecontroller::class,'delete'])->name('users.resumes.delete');
});

require __DIR__ . '/auth.php';
