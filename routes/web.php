<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactMecontroller;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Projectcontroller;
use App\Http\Controllers\Resumecontroller;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Userscontroller;
use App\Http\Middleware\isuser;
use App\Models\resume; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(isuser::class)->group(function () {
    Route::get('/users/dashboard', [Dashboardcontroller::class, 'userindex'])->name('users.dashboard');
    /************************** skill management************************** */
    Route::get('users/skills',[SkillController::class,'index'])->name('users.skills.index');
    Route::get('/skills-create',[SkillController::class,'create'])->name('users.skills.create');
    Route::post('/skills/store',[SkillController::class,'store'])->name('users.skills.store');
    Route::get('/skills/{id}/edit',[SkillController::class,'edit'])->name('users.skills.edit');
    Route::post('/skills/{id}/update',[SkillController::class,'update'])->name('users.skills.update');
    Route::get('/skills/{id}/delete',[SkillController::class,'delete'])->name('users.skills.delete');
//project management
    Route::get('/users/projects',[Projectcontroller::class,'index'])->name('users.projects.index');
    Route::get('/projects-create',[Projectcontroller::class,'create'])->name('users.projects.create');
    Route::post('projects/store',[Projectcontroller::class,'store'])->name('users.projects.store');
    Route::get('/projects/{id}/edit',[Projectcontroller::class,'edit'])->name('users.projects.edit');
    Route::post('/projects/{id}/update',[Projectcontroller::class,'update'])->name('users.projects.update');
    Route::get('/projects/{id}/delete',[Projectcontroller::class,'delete'])->name('users.projects.delete');
    
    //resume management
    Route::get('/users/resume',[Resumecontroller::class,'index'])->name('users.resumes.index');
    //Route::get('/resume-create',[Resumecontroller::class,'create'])->name('users.resume.create');
    Route::post('/resume/store',[Resumecontroller::class,'store'])->name('users.resumes.store');
    Route::get('/resumes/{id}/edit',[Resumecontroller::class,'edit'])->name('users.resumes.edit');
    Route::post('/resumes/{id}/update',[Resumecontroller::class,'update'])->name('users.resumes.update');
    Route::get('/resumes/{id}/delete',[Resumecontroller::class,'delete'])->name('users.resumes.delete');

    //image- gallery
    Route::get('/users/image-gallery',[ImageGalleryController::class,'index'])->name('users.image-gallery');
    Route::post('image-gallery', [ImageGalleryController::class, 'upload']);
Route::delete('image-gallery/{id}', [ImageGalleryController::class, 'destroy']);
//user management
    Route::get('/users/manageusers',[Userscontroller::class,'index'])->name('users.manageusers.index');
    Route::get('/manageuser-create', [Userscontroller::class, 'create'])->name('users.manageusers.create');
    Route::post('/manageuser/store',[Userscontroller::class,'store'])->name('users.manageusers.store');
    Route::get('/manageuser/{id}/edit',[Userscontroller::class,'edit'])->name('users.manageusers.edit');
    Route::post('user/{id}/update', [Userscontroller::class, 'update'])->name('users.manageusers.update');
    Route::get('user/{id}/delete', [Userscontroller::class, 'delete'])->name('users.manageusers.delete');

    /******************about me*******************/
    Route::get('/users/aboutme',[AboutController::class,'index'])->name('users.aboutme.index');
    Route::put('/users/aboutme',[AboutController::class,'update'])->name('users.aboutme.update');
    
    /*************************contactme***************************************** */
    Route::get('/contact',[Pagecontroller::class,'contact'])->name('contact');
    Route::get('/users/contacts',[ContactMecontroller::class,'show'])->name('users.contacts.index');
    Route::post('/contact/store',[ContactMecontroller::class,'store'])->name('contact.store');
});

require __DIR__ . '/auth.php';
