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

Route::get('/','JobController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');
//company
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/coverphoto','CompanyController@coverphoto')->name('company.photo');
//user profile
Route::get('user/profile','UserController@index')->name('profile.view');
Route::post('user/profile/create','UserController@store')->name('profile.create');
Route::post('user/uploads','UserController@uploads')->name('cover.uploads');
Route::post('user/avatar','UserController@avatar')->name('avatar');

//employer register
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');




