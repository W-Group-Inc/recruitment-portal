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

Route::get('/home', 'HomeController@index')->name('home');

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