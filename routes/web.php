<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/test', function () {
//     return view('company.index');
// });

Route::get('/', [Controller::class, 'main'])->name('/');
Route::get('/redirect', [Controller::class, 'redirect'])->name('redirect');
Route::get('/homeUser', [Controller::class, 'homeUser'])->name('homeUser');
Route::post('/logoutWebsite', [Controller::class, 'logoutWebsite'])->name('logoutWebsite');
Route::get('/showProfileUser', [Controller::class, 'showProfileUser'])->name('showProfileUser');
Route::post('/storeProfileUser', [Controller::class, 'storeProfileUser'])->name('storeProfileUser');
Route::get('/jobClient', [UserController::class, 'jobClient'])->name('jobClient');
Route::get('/searchJobClient', [UserController::class, 'searchJobClient'])->name('searchJobClient');
Route::get('/searchCourseClient', [UserController::class, 'searchCourseClient'])->name('searchCourseClient');
Route::get('/searchCompanyClient', [UserController::class, 'searchCompanyClient'])->name('searchCompanyClient');


Route::get('/courseClient', [UserController::class, 'courseClient'])->name('courseClient');
Route::get('/viewOrganizations', [UserController::class, 'viewOrganizations'])->name('viewOrganizations');
Route::get('/followCompany/{id}', [UserController::class, 'followCompany'])->name('followCompany');
Route::get('/showJob/{id}', [UserController::class, 'showJob'])->name('showJob');
Route::get('/profileClient', [UserController::class, 'profileClient'])->name('profileClient');
Route::post('/saveProfileClient', [UserController::class, 'saveProfileClient'])->name('saveProfileClient');
Route::get('/saveJob/{id}', [UserController::class, 'saveJob'])->name('saveJob');
Route::get('/showCourse/{id}', [UserController::class, 'showCourse'])->name('showCourse');
Route::get('/registerCompany', [UserController::class, 'registerCompany'])->name('registerCompany');
Route::get('/registerClient', [UserController::class, 'registerClient'])->name('registerClient');
Route::get('/archive', [UserController::class, 'archive'])->name('archive');
Route::get('/deleteArchives/{id}', [UserController::class, 'deleteArchives'])->name('deleteArchives');
Route::get('/specialities', [UserController::class, 'specialities'])->name('specialities');
Route::get('/companyFollow', [UserController::class, 'companyFollow'])->name('companyFollow');
Route::get('/followCancel/{id}', [UserController::class, 'followCancel'])->name('followCancel');




























// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
