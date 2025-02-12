<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Middleware\UserMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PastEducationController;
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//user routes
Route::middleware(['auth','userMiddleware'])->group(function(){

    Route::get('dashboard', [UserController::class,'index'])->name('dashboard');
    Route::get('favourite', [FavouriteController::class,'index'])->name('user.favourite');

});
//Admin routes
Route::middleware(['auth','adminMiddleware'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('admin/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::match(['get', 'post'], '/students', [StudentController::class, 'store']);
    Route::resource('students', StudentController::class);
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::match(['get', 'post'],'admin/students/index', [StudentController::class, 'index'])->name('students.index');

   
   
    Route::get('/admin/students/past', function () {
        return view('admin.students.past');
    })->name('students.past');

    Route::get('/admin/students/edit', function () { return view ('admin.students.edit');})->name('students.edit');
    Route::get('/admin/students/family', function () { return view ('admin.students.family');})->name('students.family');
    Route::get('/admin/students/document', function () { return view ('admin.students.document');})->name('students.document');
    Route::get('/admin/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/document/store', [DocumentController::class, 'store']);
    Route::post('admin/document/store', [DocumentController::class, 'store'])->name('document.store');
    Route::get('/admin/students/document/{id}', [DocumentController::class, 'index'])->name('students.document');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
   // Route::resource('students', StudentController::class);
    Route::put('/admin/students/{id}', [StudentController::class, 'update'])->name('students.update');

    Route::post('/past-education/store', [PastEducationController::class, 'store'])->name('past-education.store');
    Route::get('/past-education/create/{student_id}', [PastEducationController::class, 'create'])->name('past.create');
});
