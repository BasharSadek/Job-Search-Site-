<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;


Route::get('/homeCompany', [CompanyController::class, 'homeCompany'])->name('homeCompany');
Route::get('/showProfileCompany', [CompanyController::class, 'showProfileCompany'])->name('showProfileCompany');
Route::post('/storeProfileCompany', [CompanyController::class, 'storeProfileCompany'])->name('storeProfileCompany');
Route::get('/addJob', [CompanyController::class, 'addJob'])->name('addJob');
Route::get('/viewJobCompany', [CompanyController::class, 'viewJobCompany'])->name('viewJobCompany');
Route::get('/searchCourseCompany', [CompanyController::class, 'searchCourseCompany'])->name('searchCourseCompany');


Route::post('/storeJob', [CompanyController::class, 'storeJob'])->name('storeJob');
Route::get('/deleteJobCompany/{id}', [CompanyController::class, 'deleteJobCompany'])->name('deleteJobCompany');
Route::get('/editJob/{id}', [CompanyController::class, 'editJob'])->name('editJob');
Route::post('/UpdateJob/{id}', [CompanyController::class, 'UpdateJob'])->name('UpdateJob');
Route::get('/viewCourseCompany', [CompanyController::class, 'viewCourseCompany'])->name('viewCourseCompany');
Route::get('/addCourse', [CompanyController::class, 'addCourse'])->name('addCourse');
Route::post('/storeCourse', [CompanyController::class, 'storeCourse'])->name('storeCourse');
Route::get('/deleteCourseCompany/{id}', [CompanyController::class, 'deleteCourseCompany'])->name('deleteCourseCompany');
Route::get('/editCourse/{id}', [CompanyController::class, 'editCourse'])->name('editCourse');
Route::post('/UpdateCourse/{id}', [CompanyController::class, 'UpdateCourse'])->name('UpdateCourse');
Route::get('/viewPay', [CompanyController::class, 'viewPay'])->name('viewPay');
Route::post('/payCompany/{id}', [CompanyController::class, 'payCompany'])->name('payCompany');





