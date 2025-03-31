

<?php

use App\Http\Controllers\AccountList;
use App\Http\Controllers\Accounts;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\AccountUpdate;
use App\Http\Controllers\AdminStudentUpdate;
use App\Http\Controllers\DisplayStudent;
use App\Http\Controllers\Planner;
use App\Http\Controllers\Reminder;
use App\Http\Controllers\Schedule;
use App\Http\Controllers\Student;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Stories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\Dietary;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\DietaryDisplay;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use Pusher\Pusher;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use Symfony\Component\HttpKernel\HttpCache\Store;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CreateAccount;
use App\Http\Controllers\SearchStudentID;
use App\Http\Controllers\Settings;
use App\Http\Controllers\UpdateStudent;
use App\Http\Controllers\TeacherAccountUpdate;

Route::get('/', function () {
    return view('login');
})->name('user.login');
Route::get('/staff', function () {
    return view('admin.login'); // Your login form view
})->name('admin.login');


Route::get('/register', function () {
    return view('register');
});
// google login
Route::get('/profile', function () {
    return view('auth/add_address_phone');
});

//user
Route::post('/', [UserLogin::class, 'login'])->name('login');
Route::get('/logout', [UserLogin::class, 'logout'])->name('logout');

//admin
Route::post('/login/admin', [AdminLogin::class, 'login'])->name('admin.login.submit');
Route::get('/logout/admin', [AdminLogin::class, 'logout'])->name('admin.logout');

//protected user page
Route::middleware(['auth:user', 'verified'])->group(function () {
    Route::get('/home', [Student::class, 'index'])->name('index') ->middleware([RedirectIfNotAuthenticated::class]);;
    Route::get('/schedule',[Schedule::class, 'index'])->name('schedule');
    Route::put('/home/account/{id}', [AccountUpdate::class, 'update'])->name('account.update');
    Route::get('/home/account', [AccountUpdate::class, 'view'])->name('profile');
    Route::get('/home/dietary', [DietaryDisplay::class, 'index'])->name('dietary');


});


Route::get('/chat', [MessagesController::class, 'index'])
    ->middleware(['auth:admin,user'])
    ->name('chat.index');

//protected admin page
Route::middleware(['auth:admin','verified'])->group(function () {
    Route::get('/dashboard', [Admin::class, 'index'])->name('admin.index');
    Route::get('/planner', [Planner::class, 'index'])->name('planner.table');
    Route::delete('/planner/{id}', [Planner::class, 'delete'])->name('planner.destroy');
    Route::put('/planner/{id}', [Planner::class, 'update'])->name('planner.update');

    Route::get('/reminder', [Reminder::class, 'index'])->name('reminder.index');
    Route::delete('/reminder/{id}', [Reminder::class, 'delete'])->name('reminder.destroy');
    Route::put('/reminder/{id}', [Reminder::class, 'update'])->name('reminder.update');

    Route::get('/student', [DisplayStudent::class, 'index'])->name('student.index');
    Route::put('/student/{id}', [UpdateStudent::class, 'update'])->name('admin.student.update');
    Route::delete('/student/{id}', [UpdateStudent::class, 'destroy'])->name('admin.student.destroy');
    Route::get('/account-list', [AccountList::class, 'index'])->name('account-list.index');

    Route::post('/account/store', [Accounts::class, 'register'])->name('create.account');
    Route::get('/account-update', [TeacherAccountUpdate::class, 'index'])->name('teacher.account');
    Route::put('/account-update', [TeacherAccountUpdate::class, 'update'])->name('teacher.account.update');

    
    Route::get('/stories', [Stories::class, 'index'])->name('stories.index');
    
    Route::get('/dietary', [Dietary::class, 'index'])->name('dietary.index');
    Route::get('/settings',[Settings::class, 'index'])->name('settings.index');

    // Route::get('/admin/charts', [ChartController::class, 'index'])->name('chart.index');

});