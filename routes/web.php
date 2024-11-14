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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('jobs', 'JobController@index');
Route::get('view-jobs/{id}', 'JobController@show');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('active_applicant_at');
    
    # User
    Route::get('user', 'UserController@index');
    Route::post('add_user', 'UserController@store');
    Route::post('update_user/{id}', 'UserController@update');
    Route::post('deactivate/{id}', 'UserController@deactivate');
    Route::post('activate/{id}', 'UserController@activate');
    Route::post('change-password/{id}', 'UserController@changePassword');
    Route::get('view-password', 'UserController@viewPassword');
    
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
    // Route::post('delete-mrf/{id}', 'ManPowerRequisitionFormController@destroy');
    Route::post('cancelled-mrf/{id}', 'ManPowerRequisitionFormController@cancelMrf');
    Route::get('print-mrf/{id}', 'ManPowerRequisitionFormController@print');
    Route::post('update-progress/{id}', 'ManPowerRequisitionFormController@progress');
    Route::post('assign-recruiter/{id}', 'ManPowerRequisitionFormController@assign');
    
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
    Route::post('add_interviewer/{id}', 'ApplicantController@interviewer');
    Route::get('for-interview', 'ApplicantController@forInterview');
    Route::post('applicant-action', 'ApplicantController@applicantAction');
    Route::post('update-applicant-status/{id}', 'ApplicantController@updateStatus');
    Route::post('update-schedule/{id}', 'ApplicantController@updateSchedule');
    
    # Job Application
    Route::get('job-application', 'JobApplicationController@index');
    Route::post('submit-ja', 'JobApplicationController@store');
    Route::get('print-job-application/{id}', 'JobApplicationController@printJobApplicationForm');
    
    # Interview Assessment
    Route::get('interview-assessment/{id}', 'InterviewAssessmentController@show');
    Route::post('submit-interview-assessment', 'InterviewAssessmentController@store');
    Route::get('print-interview-assessment/{id}', 'InterviewAssessmentController@printInterviewAssessment');
    
    # Upload Documents
    Route::get('applicant-documents', 'ApplicantDocumentController@index');
    Route::post('new-applicant-document', 'ApplicantDocumentController@store');
    Route::post('returned-applicant-document/{id}', 'ApplicantDocumentController@returnedDocument');
    
    # Document
    Route::get('document', 'DocumentController@index');
    Route::post('new-document', 'DocumentController@store');
    Route::post('update-document/{id}', 'DocumentController@update');
    
    # Job Description
    Route::get('job-position', 'JobPositionController@index');
    Route::post('new-job-position', 'JobPositionController@store');
    Route::post('update-job-position/{id}', 'JobPositionController@update');
    Route::post('deactivate-job-position/{id}', 'JobPositionController@deactivate');
    Route::post('activate-job-position/{id}', 'JobPositionController@activate');
    
    # Job Offer
    Route::post('add-job-offer', 'JobOfferController@store');
    
    Route::get('approved-mrf', 'ApprovedMrfController@index');
    Route::post('upload-mrf/{id}', 'ApprovedMrfController@update');
    
    Route::get('google/callback', 'ApplicantController@handleGoogleCallback')->name('google.callback');
    
    Route::post('add-exam', 'ApplicantExamResultController@store');
    Route::post('update-exam/{id}', 'ApplicantExamResultController@update');
});