<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::get('employees', ['as' => 'employees', 'uses' => 'App\Http\Controllers\EmployeeController@index']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


	// Employee Page Routes
   Route::get('employees',[App\Http\Controllers\EmployeeController::class,'index'])->name('show_employees');
   Route::get('employee/add',[App\Http\Controllers\EmployeeController::class,'show'])->name('display_add_form');
   Route::post('employees/add','App\Http\Controllers\EmployeeController@create')->name('employee.create');
   Route::get('/empoyees/delete/{id}','App\Http\Controllers\EmployeeController@delete')->name('employee.delete');
   Route::get('/empoyees/edit/{employee}','App\Http\Controllers\EmployeeController@edit')->name('employee.edit');
   Route::post('/empoyees/edit/{employee}','App\Http\Controllers\EmployeeController@update')->name('employee.update');

   //Services Page Routes
   Route::get('services',[App\Http\Controllers\ServicesController::class,'index'])->name('show_services');
   Route::get('services/add',[App\Http\Controllers\ServicesController::class,'display_form'])->name('add_service');
   Route::post('services/add',[App\Http\Controllers\ServicesController::class,'create'])->name('add_service');
   Route::get('/services/delete/{id}','App\Http\Controllers\ServicesController@destroy')->name('service.delete');

   Route::get('/charts', 'HomeController@chartjs');  


});

