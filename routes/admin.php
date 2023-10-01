<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/homeAdmin', [AdminController::class, 'homeAdmin'])->name('homeAdmin');
Route::get('/addCompany', [AdminController::class, 'addCompany'])->name('addCompany');
Route::post('/storeCompanyAdmin', [AdminController::class, 'storeCompanyAdmin'])->name('storeCompanyAdmin');
Route::get('/viewCompanies', [AdminController::class, 'viewCompanies'])->name('viewCompanies');
Route::get('/searchCompany', [AdminController::class, 'searchCompany'])->name('searchCompany');
Route::get('/deleteCompany/{id}', [AdminController::class, 'deleteCompany'])->name('deleteCompany');
Route::get('/editCompany/{id}', [AdminController::class, 'editCompany'])->name('editCompany');
Route::post('/updateCompany/{id}', [AdminController::class, 'updateCompany'])->name('updateCompany');
Route::get('/viewClients', [AdminController::class, 'viewClients'])->name('viewClients');
Route::get('/searchClient', [AdminController::class, 'searchClient'])->name('searchClient');
Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
Route::get('/editUser/{id}', [AdminController::class, 'editUser'])->name('editUser');
Route::post('/updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
Route::get('/addJobType', [AdminController::class, 'addJobType'])->name('addJobType');
Route::post('/storeJobType', [AdminController::class, 'storeJobType'])->name('storeJobType');
Route::get('/viewJobsType', [AdminController::class, 'viewJobsType'])->name('viewJobsType');
Route::get('/searchJobType', [AdminController::class, 'searchJobType'])->name('searchJobType');


Route::get('/deleteJobType/{id}', [AdminController::class, 'deleteJobType'])->name('deleteJobType');
Route::get('/editJobType/{id}', [AdminController::class, 'editJobType'])->name('editJobType');
Route::post('/updateJobType/{id}', [AdminController::class, 'updateJobType'])->name('updateJobType');


Route::get('/showProfileAdmin', [AdminController::class, 'showProfileAdmin'])->name('showProfileAdmin');
Route::post('/storeProfileAdmin', [AdminController::class, 'storeProfileAdmin'])->name('storeProfileAdmin');
Route::get('/viewJobAdmin', [AdminController::class, 'viewJobAdmin'])->name('viewJobAdmin');
Route::get('/searchJob', [AdminController::class, 'searchJob'])->name('searchJob');
Route::get('/deleteJobAdmin/{id}', [AdminController::class, 'deleteJobAdmin'])->name('deleteJobAdmin');
Route::get('/addJobAdmin', [AdminController::class, 'addJobAdmin'])->name('addJobAdmin');
Route::post('/storeJobAdmin', [AdminController::class, 'storeJobAdmin'])->name('storeJobAdmin');
Route::get('/editJobAdmin/{id}', [AdminController::class, 'editJobAdmin'])->name('editJobAdmin');
Route::post('/UpdateJobAdmin/{id}', [AdminController::class, 'UpdateJobAdmin'])->name('UpdateJobAdmin');
Route::get('/viewCourseAdmin', [AdminController::class, 'viewCourseAdmin'])->name('viewCourseAdmin');
Route::get('/searchCourse', [AdminController::class, 'searchCourse'])->name('searchCourse');
Route::get('/deleteCourseAdmin/{id}', [AdminController::class, 'deleteCourseAdmin'])->name('deleteCourseAdmin');
Route::get('/addCourseAdmin', [AdminController::class, 'addCourseAdmin'])->name('addCourseAdmin');
Route::get('/editCourseAdmin/{id}', [AdminController::class, 'editCourseAdmin'])->name('editCourseAdmin');
Route::post('/UpdateCourseAdmin/{id}', [AdminController::class, 'UpdateCourseAdmin'])->name('UpdateCourseAdmin');

Route::post('/storeCourseAdmin', [AdminController::class, 'storeCourseAdmin'])->name('storeCourseAdmin');
Route::get('/viewRequests', [AdminController::class, 'viewRequests'])->name('viewRequests');
Route::post('/accept/{id}', [AdminController::class, 'accept'])->name('accept');
Route::get('/viewAccept', [AdminController::class, 'viewAccept'])->name('viewAccept');
Route::get('/acceptToPost/{id}', [AdminController::class, 'acceptToPost'])->name('acceptToPost');
