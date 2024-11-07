<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\BMI;
use App\Http\Controllers\Student;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLogin;
Route::get('/login', function () {
    return view('login');
});
Route::get('/login/admin', function () {
    return view('admin.login');
});

Route::get('/register', function () {
    return view('register');
});
// google login
Route::get('login/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('login/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
//user
Route::post('/login', [UserLogin::class, 'login'])->name('login');
Route::post('/register', [UserLogin::class, 'register'])->name('register') ;
Route::get('/logout', [UserLogin::class, 'logout'])->name('logout');
Route::get('/logout/admin', [AdminLogin::class, 'logout'])->name('admin.logout');

//admin
Route::post('/login/admin', [AdminLogin::class, 'login'])->name('admin.login');

//protected user page
Route::middleware(['auth:user'])->group(function () {
    Route::get('/dashboard', [Student::class, 'index'])->name('index');
    // submit bmi
   Route::post('/dashboard/bmi', [BMI::class, 'submit'])->name('bmi.submit');
   Route::post('/dashboard/student', [Student::class, 'submit'])->name('student.submit');

});
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [Admin::class, 'index'])->name('admin.index');
});