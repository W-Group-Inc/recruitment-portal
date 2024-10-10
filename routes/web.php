<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('active_applicant_at');

# User
Route::get('user', 'UserController@index');
Route::post('add_user', 'UserController@store');
Route::post('update_user/{id}', 'UserController@update');
Route::post('deactivate/{id}', 'UserController@deactivate');
Route::post('activate/{id}', 'UserController@activate');
Route::post('change-password/{id}', 'UserController@changePassword');

# Company
Route::get('company', 'CompanyController@index');
Route::post('add_company', 'CompanyController@store');
Route::post('update_company/{id}', 'CompanyController@update');
Route::post('deactivate-company/{id}', 'CompanyController@deactivate');
Route::post('activate-company/{id}', 'CompanyController@activate');

# Department
Route::get('department', 'DepartmentController@index');
Route::post('add_department', 'DepartmentController@store');
Route::post('update_department/{id}', 'DepartmentController@update');
Route::post('deactivate-department/{id}', 'DepartmentController@deactivate');
Route::post('activate-department/{id}', 'DepartmentController@activate');

# Department Head
Route::get('mrf', 'ManPowerRequisitionFormController@index');
Route::post('new-mrf', 'ManPowerRequisitionFormController@store');
Route::post('update-mrf/{id}', 'ManPowerRequisitionFormController@update');
Route::post('delete-mrf/{id}', 'ManPowerRequisitionFormController@destroy');
Route::get('print-mrf/{id}', 'ManPowerRequisitionFormController@print');
Route::post('add_interviewer/{id}', 'ManPowerRequisitionFormController@interviewer');

# Human Resources
Route::get('for-approval', 'ForApprovalController@index');
Route::post('mrf-action/{id}', 'ForApprovalController@update');
Route::post('post-indeed/{id}', 'ForApprovalController@postIndeed');

# Applicant
Route::get('applicant', 'ApplicantController@index');
Route::post('add-applicant', 'ApplicantController@store');
Route::post('update-applicant/{id}', 'ApplicantController@update');
Route::get('view-applicant/{id}', 'ApplicantController@show');
Route::post('schedule-interview', 'ApplicantController@schedule');
Route::get('print-jo/{id}', 'ApplicantController@printJo');
Route::post('update-status/{id}', 'ApplicantController@updateApplicantStatus');
Route::get('applicants', 'ApplicantController@applicant');
Route::post('submit-ja', 'ApplicantController@jobApplicationForm');

# Interview Assessment
Route::get('interview-assessment/{id}', 'InterviewAssessmentController@show');
Route::post('submit-interview-assessment', 'InterviewAssessmentController@store');
Route::get('print-interview-assessment/{id}', 'InterviewAssessmentController@printInterviewAssessment');