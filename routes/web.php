<?php
# @Date:   2019-11-06T14:41:00+00:00
# @Last modified time: 2019-12-08T19:38:35+00:00




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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
//Route::get('/user/home', 'User\HomeController@index')->name('user.home');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');
Route::get('patient/home', 'Patient\HomeController@index')->name('patient.home');



Route::get('/admin/doctors', 'Admin\DoctorController@index')->name('admin.doctors.index');
Route::get('/admin/doctors/create', 'Admin\DoctorController@create')->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', 'Admin\DoctorController@show')->name('admin.doctors.show');
Route::post('/admin/doctors/store', 'Admin\DoctorController@store')->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', 'Admin\DoctorController@edit')->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', 'Admin\DoctorController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', 'Admin\DoctorController@destroy')->name('admin.doctors.destroy');

Route::get('/admin/patients', 'Admin\PatientController@index')->name('admin.patients.index');
Route::get('/admin/patients/create', 'Admin\PatientController@create')->name('admin.patients.create');
Route::get('/admin/patients/{id}', 'Admin\PatientController@show')->name('admin.patients.show');
Route::post('/admin/patients/store', 'Admin\PatientController@store')->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', 'Admin\PatientController@edit')->name('admin.patients.edit');
Route::put('/admin/patients/{id}', 'Admin\PatientController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}', 'Admin\PatientController@destroy')->name('admin.patients.destroy');

Route::get('/admin/visits', 'Admin\VisitController@index')->name('admin.visits.index');
Route::get('/admin/visits/create', 'Admin\VisitController@create')->name('admin.visits.create');
Route::get('/admin/visits/{id}', 'Admin\VisitController@show')->name('admin.visits.show');
Route::post('/admin/visits/store', 'Admin\VisitController@store')->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', 'Admin\VisitController@edit')->name('admin.visits.edit');
Route::put('/admin/visits/{id}', 'Admin\VisitController@update')->name('admin.visits.update');
Route::delete('/admin/visits/{id}', 'Admin\VisitController@destroy')->name('admin.visits.destroy');

Route::get('/patient/doctors', 'Patient\DoctorController@index')->name('patient.doctors.index');
Route::get('/patient/doctors/{id}', 'Patient\DoctorController@show')->name('patient.doctors.show');

Route::get('/patient/doctors/{id}/visits/create', 'Patient\VisitController@create')->name('patient.visits.create');
Route::post('/patient/doctors/{id}/visits/store', 'Patient\VisitController@store')->name('patient.visits.store');

Route::get('/patient/visits', 'Patient\VisitController@index')->name('patient.visits.index');
Route::get('/patient/visits/{id}', 'Patient\VisitController@show')->name('patient.visits.show');
