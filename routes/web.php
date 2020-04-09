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

Route::view('demo','demo');

Route::get('/','JobController@index')->name('welcome');

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
Route::get('/companies','CompanyController@company')->name('company');
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
/*Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');*/
Route::post('/applications/{id}','JobController@apply')->name('apply');

//save and unsave job
Route::post('/save/{id}','FavouriteController@saveJob');
Route::post('/unsave/{id}','FavouriteController@unSaveJob');

//Search
Route::get('/jobs/search','JobController@searchJobs');

//category
Route::get('/category/{id}/jobs','CategoryController@index')->name('category.index');

//email
Route::post('/job/mail','MailController@send')->name('mail');

//admin
Route::get('/dashboard','DashboardController@index')->name('post.index');
Route::get('/dashboard/create','DashboardController@create')->name('post.create');
Route::post('/dashboard/create','DashboardController@store')->name('post.store');
Route::post('/dashboard/{id}/delete','DashboardController@deletePost')->name('post.delete');
Route::get('/dashboard/{id}/edit','DashboardController@editPost')->name('post.edit');
Route::post('/dashboard/{id}/update','DashboardController@update')->name('post.update');
Route::get('/dashboard/trash','DashboardController@trash')->name('post.trash');
Route::get('/dashboard/{id}/trash','DashboardController@restore')->name('post.restore');
Route::get('/dashboard/{id}/toggle','DashboardController@toggle')->name('post.toggle');
Route::get('/post/{id}/{slug}','DashboardController@show')->name('post.show');

//jobs list admin
Route::get('/dashboard/jobs','DashboardController@jobsShow')->name('jobs.index');
Route::get('/job/{id}/toggle','DashboardController@Jobtoggle')->name('job.toggle');

//companies list admin
Route::get('/dashboard/companies','DashboardController@CompaniesShow')->name('companies.index');

//testimonials
Route::get('/testimonial/show','TestimonialController@index')->name('testimonial.show');
Route::get('/testimonial/create','TestimonialController@create')->name('testimonial.create');
Route::post('/testimonial/store','TestimonialController@store')->name('testimonial.store');
Route::get('/testimonial/{id}/edit','TestimonialController@edit')->name('testimonial.edit');
Route::post('/testimonial/{id}/update','TestimonialController@update')->name('testimonial.update');
Route::post('/testimonial/{id}/delete','TestimonialController@delete')->name('testimonial.delete');

