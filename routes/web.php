<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PropertyOperationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


/////// Main Landing Page Routes

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::post('/bookmessage', [LandingPageController::class, 'bookMessage'])->name('book.message');
Route::post('/sendmessage', [LandingPageController::class, 'sendMessage'])->name('send.message');

Route::get('/balloons', [LandingPageController::class, 'balloons'])->name('balloons');
Route::get('/single-balloon/{id}', [LandingPageController::class, 'singleBalloon'])->name('single.balloon');

Route::get('/occasions', [LandingPageController::class, 'occasions'])->name('occasions');
Route::get('/single-occasion/{id}', [LandingPageController::class, 'singleOccasion'])->name('single.occasion');

Route::get('/seasonal-holidays', [LandingPageController::class, 'seasonalHolidays'])->name('seasonal.holidays');

Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
Route::get('/404', [LandingPageController::class, 'error404'])->name('404');









////// End Main Landing Page Routes


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('/message/seen', [AdminController::class, 'MessageSeen'])->name('message.seen');

    Route::get('/appuser/create', [AdminController::class, 'AppUserCreateView'])->name('appUser.create');

    Route::post('/appuser/create', [AdminController::class, 'AppUserCreatePost'])->name('appUser.create.post');

    Route::get('/appuser/edit/{id}', [AdminController::class, 'AppUserEditView'])->name('appUser.edit');

    Route::post('/appuser/edit', [AdminController::class, 'AppUserEditPost'])->name('appUser.edit.post');

    Route::get('/appuser/status/{id}/{status}', [AdminController::class, 'AppUserStatusUpdate'])->name('appUser.status');


    // Start Balloon Operations
    Route::get('/user/balloons', [PropertyOperationController::class, 'BalloonList'])->name('user.balloons');

    Route::get('/user/balloon/create', [PropertyOperationController::class, 'BalloonCreateView'])->name('user.balloon.create');

    Route::post('/user/balloon/create', [PropertyOperationController::class, 'BalloonCreatePost'])->name('user.balloon.create.post');

    Route::get('/user/balloon/edit/{id}', [PropertyOperationController::class, 'BalloonEditView'])->name('user.balloon.edit');

    Route::post('/user/balloon/edit', [PropertyOperationController::class, 'BalloonEditPost'])->name('user.balloon.edit.post');

    Route::get('/user/balloon/delete/{id}', [PropertyOperationController::class, 'BalloonDelete'])->name('user.balloon.delete');

    // End Ballon Operations


    // Start Occasion Operations
    Route::get('/user/occasions', [PropertyOperationController::class, 'OccasionList'])->name('user.occasions');

    Route::get('/user/occasion/create', [PropertyOperationController::class, 'OccasionCreateView'])->name('user.occasion.create');

    Route::post('/user/occasion/create', [PropertyOperationController::class, 'OccasionCreatePost'])->name('user.occasion.create.post');

    Route::get('/user/occasion/edit/{id}', [PropertyOperationController::class, 'OccasionEditView'])->name('user.occasion.edit');

    Route::post('/user/occasion/edit', [PropertyOperationController::class, 'OccasionEditPost'])->name('user.occasion.edit.post');

    Route::get('/user/occasion/delete/{id}', [PropertyOperationController::class, 'OccasionDelete'])->name('user.occasion.delete');
    // End Occasion Operations


    // Start Holiday Operations
    Route::get('/user/holidays', [PropertyOperationController::class, 'HolidayList'])->name('user.holidays');

    Route::get('/user/holiday/create', [PropertyOperationController::class, 'HolidayCreateView'])->name('user.holiday.create');

    Route::post('/user/holiday/create', [PropertyOperationController::class, 'HolidayCreatePost'])->name('user.holiday.create.post');

    Route::get('/user/holiday/edit/{id}', [PropertyOperationController::class, 'HolidayEditView'])->name('user.holiday.edit');

    Route::post('/user/holiday/edit', [PropertyOperationController::class, 'HolidayEditPost'])->name('user.holiday.edit.post');

    Route::get('/user/holiday/delete/{id}', [PropertyOperationController::class, 'HolidayDelete'])->name('user.holiday.delete');
    // End Holiday Operations


}); // End Admin Group Middleware



// Employee Group Middleware
Route::middleware(['auth', 'role:employee'])->group(function(){

}); // End Employee Group Middleware