<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    
    Route::post('/company' , [CompanyController::class, 'store']);
    Route::get('/company' , [CompanyController::class, 'index'])->name('company');
    Route::get('/company/edit' , [CompanyController::class, 'edit']);
    Route::put('/company' , [CompanyController::class, 'update']);
    Route::get('/company/create/' , [CompanyController::class, 'create']);
    
    Route::get('/jobs' , [JobController::class, 'index'])->name('jobs');
    Route::post('/jobs' , [JobController::class, 'store']);
    Route::get('/jobs/create/' , [JobController::class, 'create']);
    Route::get('/jobs/{job}' , [JobController::class, 'show']);

    Route::middleware(['can:edit,job'])->group( function () {
        Route::get('/jobs/{job}/edit' , [JobController::class, 'edit']);
        Route::put('/jobs/{job}' , [JobController::class, 'update']);
        Route::delete('/jobs/{job}' , [JobController::class, 'destroy']);
    });

}) ;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
