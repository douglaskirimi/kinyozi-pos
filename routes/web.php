<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MpesaApisTestController;

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


// APIS TESTING - NOT PART OF THE APP

Route::get('/mpesa-apis', function () {
    return view('welcome');
});

Route::post('get-token',[MpesaApisTestController::class,'getAccessToken'])->name('get-token');

// Route::get('list', [AjaxController::class, 'index']);
// Route::get('show-user', [AjaxController::class, 'show']);





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
   Route::post('/empoyees/update/{employee}','App\Http\Controllers\EmployeeController@update')->name('employee.update');

   //Services Page Routes
   Route::get('services',[App\Http\Controllers\ServicesController::class,'index'])->name('show_services');
   Route::get('services/add',[App\Http\Controllers\ServicesController::class,'display_form'])->name('add_service');
   Route::post('services/add',[App\Http\Controllers\ServicesController::class,'create'])->name('add_service');
   Route::get('/services/delete/{id}','App\Http\Controllers\ServicesController@destroy')->name('service.delete');
   Route::get('/services/edit/{service}','App\Http\Controllers\ServicesController@edit')->name('service.edit');
   Route::post('/services/edit/{service}','App\Http\Controllers\ServicesController@update')->name('service.update');


    // Customer Pages Routes
   Route::get('/customers/list','App\Http\Controllers\CustomerController@index')->name('customers_list');
   Route::get('/customers/add','App\Http\Controllers\CustomerController@showform')->name('customers_add_form');
   Route::post('/customers/add','App\Http\Controllers\CustomerController@create')->name('customers.create');
   Route::get('/customers/delete/{id}','App\Http\Controllers\CustomerController@delete')->name('customer.delete');
   Route::get('/customers/edit/{customer}','App\Http\Controllers\CustomerController@edit')->name('customer.edit');
   Route::post('/customers/update/{customer}','App\Http\Controllers\CustomerController@update')->name('customer.update');

   // Categories Pages RouteServiceProvider
    Route::get('/categories/list','App\Http\Controllers\CategoryController@index')->name('show_categories');
   Route::get('/categories/add','App\Http\Controllers\CategoryController@showform')->name('category.add');
   Route::post('/categories/add','App\Http\Controllers\CategoryController@create_category')->name('category.create'); 

   Route::get('/categories/edit/{category}','App\Http\Controllers\CategoryController@edit')->name('category.edit'); 

   Route::get('/categories/delete/{id}','App\Http\Controllers\CategoryController@delete')->name('category.delete');
   Route::post('/categories/update/{category}','App\Http\Controllers\CategoryController@update')->name('category.update');

 // Transactions Pages Routes
   Route::get('/transactions/list','App\Http\Controllers\TransactionController@index')->name('all_transactions');

   Route::get('/transactions','App\Http\Controllers\TransactionController@new_transaction')->name('make-transaction');

      Route::post('/transactions/confirm_payment','App\Http\Controllers\TransactionController@confirm_payment')->name('confirm_payment');

      // Route::get('/transactions/mpesa/send_stk','App\Http\Controllers\TransactionController@send_stk')->name('send_stk');

    // Route::get('/transactions/records','App\Http\Controllers\TransactionController@stk_response')->name('receive_stk_response');

  Route::get('/transactions/edit/{transaction}','App\Http\Controllers\TransactionController@edit')->name('transaction.edit'); 

   Route::get('/transactions/delete/{id}','App\Http\Controllers\TransactionController@delete')->name('transaction.delete');

   Route::post('/transactions/update/{transaction}','App\Http\Controllers\TransactionController@update')->name('transaction.update');


  Route::get('/generate/receipt/{transaction}', 'App\Http\Controllers\TransactionController@generatePDF')->name('generate_receipt');

  // Route::get('/generate-pdf', 'App\Http\Controllers\TransactionController@generatePDF')->name('generate_receipt');







   Route::get('/charts', 'HomeController@chartjs');  
   

});

