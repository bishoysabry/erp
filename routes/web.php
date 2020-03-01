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
    return view('welcome');
});
// disable register
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('companies', 'CompaniesController')->middleware('auth');
Route::resource('employees', 'EmployeesController')->middleware('auth');
Route::post('/employees/{employee}', 'EmployeesController@update')->middleware('auth');
Route::post('/employees/{employee}/delete', 'EmployeesController@destroy')->middleware('auth');
Route::post('/companies/{company}', 'CompaniesController@update')->middleware('auth');
Route::post('/companies/{company}/delete', 'CompaniesController@destroy')->middleware('auth');
