<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('register/student', [StudentController::class, 'showForm'])->name('register.student');
// Route::post('register', [StudentController::class, 'storeStudent']);

Route::middleware('guest')->group(function () {
    Route::get('register/{role}', [StudentController::class, 'showForm'])->name('register.student');
    Route::post('register', [StudentController::class, 'storeStudent']);
});

require __DIR__.'/auth.php';
