<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Http\Controllers\GuestController;

Route::get('/', [GuestController::class, 'index']);

Route::view('/about', 'pages.guest.about');
Route::view('/contact', 'pages.guest.contact');
Route::view('/all-jobs', 'pages.guest.jobs');

Route::get('/job-detail/{job}', function (Job $job) {
    return view('job-detail', ['job'=>$job]);
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
