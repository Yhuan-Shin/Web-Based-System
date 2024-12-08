<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\AccountUpdate;
use App\Http\Controllers\Planner;
use App\Http\Controllers\Reminder;
use App\Http\Controllers\Schedule;
use App\Http\Controllers\Student;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Stories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLogin;
use Symfony\Component\HttpKernel\HttpCache\Store;

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
Route::get('/profile', function () {
    return view('auth/add_address_phone');
});
Route::post('/profile', [SocialAuthController::class, 'add_address_phone'])->name('add.address.phone');
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
    Route::get('/home', [Student::class, 'index'])->name('index');
    Route::post('/home/student', [Student::class, 'submit'])->name('student.submit');
    Route::put('/home/student/{id}', [Student::class, 'update'])->name('student.update');
    Route::delete('/home/student/{id}', [Student::class, 'destroy'])->name('student.destroy');
    Route::get('/schedule',[Schedule::class, 'index'])->name('schedule');

    Route::put('account/{id}', [AccountUpdate::class, 'update'])->name('account.update');
    Route::get('account', [AccountUpdate::class, 'view'])->name('profile');
});


//protected admin page
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [Admin::class, 'index'])->name('admin.index');
    Route::get('/admin/planner', [Planner::class, 'index'])->name('planner.table');
    Route::delete('/admin/planner/{id}', [Planner::class, 'delete'])->name('planner.destroy');
    Route::put('/admin/planner/{id}', [Planner::class, 'update'])->name('planner.update');

    Route::get('/admin/reminder', [Reminder::class, 'index'])->name('reminder.index');
    Route::delete('/admin/reminder/{id}', [Reminder::class, 'delete'])->name('reminder.destroy');
    Route::put('/admin/reminder/{id}', [Reminder::class, 'update'])->name('reminder.update');

});