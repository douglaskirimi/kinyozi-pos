<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MpesaTransactionsController;
use App\Http\Controllers\payments\mpesa\MPESAResponsesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();

// Route::post('/transactions/mpesa/send_stk','App\Http\Controllers\TransactionController@send_stk')->name('send_stk');

// Route::post('/transactions/records','App\Http\Controllers\TransactionController@stk_response')->name('receive_stk_response');
// // });


// Route::get('/mpesa-apis', function () {
//     return view('welcome');
// });

// Route::post('get-token',[MpesaApisTestController::class,'getAccessToken'])->name('get-token');

Route::post('v1/access/token', 'MpesaController@generateAccessToken');
Route::post('v1/hlab/stk/push', 'MpesaController@customerMpesaSTKPush');




Route::get('/mpesa-apis', function () {
    return view('welcome');
});


Route::post('/get-token', [MpesaTransactionsController::class, 'generateAccessToken'])->name('generateAccessToken');

Route::post('/mpesa-stkPush', [MpesaTransactionsController::class, 'stkPush'])->name('stkPush');


Route::get('/Mpesa-payment/responses',[MpesaResponsesController::class, 'stkResponseMsg'])->name('stkResponseMsg');


Route::post('/responses', [MpesaTransactionsController::class, 'mpesaRes'])->name('mpesaRes');



