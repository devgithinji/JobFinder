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

//Auth::routes();
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
//jobs
Route::get('/jobs/{id}/edit','JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/update','JobController@update')->name('job.update');
Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');
Route::get('/jobs/create','JobController@create')->name('job.create');
Route::post('/jobs/create','JobController@store')->name('job.store');
Route::get('/jobs/my-job','JobController@myjob')->name('my.job');
Route::get('/jobs/applications','JobController@applicant')->name('job.applicant');
Route::get('/jobs/alljobs','JobController@allJobs')->name('alljobs');
//company
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/uploads','CompanyController@uploads')->name('company.uploads');
//user profile
Route::get('user/profile','UserController@index')->name('profile.view');
Route::post('user/profile/create','UserController@store')->name('profile.create');
Route::post('user/uploads','UserController@uploads')->name('cover.uploads');
Route::post('user/avatar','UserController@avatar')->name('avatar');

//employer register
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');
Route::post('/applications/{id}','JobController@apply')->name('apply');

//save and unsave job
Route::post('/save/{id}','FavouriteController@saveJob');
Route::post('/unsave/{id}','FavouriteController@unSaveJob');

//Search
Route::get('/jobs/search','JobController@searchJobs');



