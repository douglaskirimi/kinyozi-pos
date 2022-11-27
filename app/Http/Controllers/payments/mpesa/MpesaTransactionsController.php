<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\payments\mpesa\MPESAResponsesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use App\Models\MpesaPayments;

class MpesaTransactionsController extends Controller
{
        public function generateAccessToken()
    {
        $consumer_key=env('MPESA_CONSUMER_KEY');
        $consumer_secret=env('MPESA_CONSUMER_SECRET');
        $credentials = base64_encode(env('MPESA_CONSUMER_KEY').":".env('MPESA_CONSUMER_SECRET'));
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $data=json_decode($curl_response);
        $access_token = $data->access_token;
        // dd($access_token);
        return $access_token;  
    }
        public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $BusinessShortCode = env('MPESA_STK_SHORTCODE');
        $passkey = env('MPESA_PASSKEY');
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }

public function stkPush(Request $request) {
    $phone = ltrim($request->mpesa_number,0);
    $customer_payment_number = '254' . $phone;
    $service_fees = $request->service_fees;
    $data = $request;

    $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
    $curl_post_data = [
        //Fill in the request parameters with valid values
        'BusinessShortCode' => 174379,
        'Password' => $this->lipaNaMpesaPassword(),
        'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $service_fees,
        'PartyA' => '254758319193', //$customer_payment_number, // replace this with your phone number
        'PartyB' => 174379,
        'PhoneNumber' => $customer_payment_number, // replace this with your phone number
        'CallBackURL' => 'https://kinyozi-point-of-sale.herokuapp.com/api/responses',
        'AccountReference' => "The Glitters Barbershop",
        'TransactionDesc' => "Testing stk push on sandbox"
    ];

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);    	
    $stkPullResponse = json_decode($curl_response);
    $stkResCode  = $stkPullResponse->ResponseCode;


    if ($stkResCode == 0) {
    Log::info($stkPullResponse->CustomerMessage);
    // return view('pages.transactions.completeTransaction',compact('data'))->with('data',$data);
    return redirect()->route('payment.complete')->with('data',$data);
}
       else{
        } 
        return redirect()->action([TransactionController::class, 'new_transaction']);
}

 public function mpesaRes(Request $request) {
// die("");
       $response =json_decode($request->getContent(),true);
        $Item = $response['Body']['stkCallback']['CallbackMetadata']['Item'];
        $metadata = array(
            'MerchantRequestID' => $response['Body']['stkCallback']['MerchantRequestID'],
            'CheckoutRequestID' => $response['Body']['stkCallback']['CheckoutRequestID'],
            'ResultCode' => $response['Body']['stkCallback']['ResultCode'],
            'ResultDesc' => $response['Body']['stkCallback']['ResultDesc'],
        );
    
        $mpesaData = array_column($Item, 'Value', 'Name');
        $mpesaData = array_merge($metadata, $mpesaData);
        
        if($mpesaData['ResultCode']==0) {
            $newTransaction = new MpesaPayments;   
        
            $newTransaction->MerchantRequestID = $mpesaData['MerchantRequestID'];
            $newTransaction->CheckoutRequestID = $mpesaData['CheckoutRequestID'];
            $newTransaction->ResultCode = $mpesaData['ResultCode'];
            $newTransaction->ResultDesc = $mpesaData['ResultDesc'];
            $newTransaction->Amount = $mpesaData['Amount'];
            $newTransaction->MpesaReceiptNumber = $mpesaData['MpesaReceiptNumber'].rand(0,9999);            
            $newTransaction->Status = "Success";

           $transaction_date = $mpesaData['TransactionDate'];
           $formatedDateTime = date("Y-m-d", strtotime($transaction_date)); 

            $newTransaction->TransactionDate = $formatedDateTime;

            // die($newTransaction->TransactionDate);
            $newTransaction->PhoneNumber = $mpesaData['PhoneNumber'];
           $m = $newTransaction->save();
        
            if($m==1) {
              Log::info("Transaction completed successfully!");
              return response()->json("success");
            }
            else{
               Log::info("Error");
            }
    
        }
        elseif($mpesaData['ResultCode']==1) {
            Log::info("Error Occurred. Try again!");
            return   response()->json(array('feedback'=>'Transaction failed! We are sorry, try again!'));
        }
    return response()->json("retry!");
}




    // error_log(print_r($mpesaData, true),0);

    // echo "{
    //     'ResultCode': 0,
    //     'ResultDesc': 'Accepted'

    // }";
// }

    // if(property_exists($response,'Body') && $response->Body->stkCallback->ResultCode =='0') {
    //     $merchant_request_id=$response->Body->stkCallback->MerchantRequestID;
    //     $checkout_request_id=$response->Body->stkCallback->CheckoutRequestID;
    //     $trn = new MpesaStkPush;

    //     dd($trn);

    //     $trn =MpesaStkPush::where('merchant_request_id', $merchant_request_id)->where('checkout_request_id', $checkout_request_id)->first();

    
    //     $data=[
    //         'result_desc'=> $response->Body->stkCallback->ResultDesc,
    //         'result_code'=> $response->Body->stkCallback->ResultCode,
    //         'merchant_request_id' => $merchant_request_id,
    //         'checkout_request_id' => $checkout_request_id,
    //         'amount' => $response->Body->stkCallback->CallbackMetadata[0]->Value,
    //         'mpesa_receipt_number'=> $response->Body->stkCallback->CallbackMetadata[1]->Value,
    //     //'b2c_utility_account_available_funds',
    //         'transaction_date' => $response->Body->stkCallback->CallbackMetadata[2]->Value,
    //         'phone_number'=> $response->Body->stkCallback->CallbackMetadata[3]->Value,
    //     ];


    //     $trn->fill($data)->save();

    // }
// }

 
    // public function transactionResponse(Request $request) {
    // {
    //     $stkResponse = $request->getContent();
    //     $response = json_decode($stkResponse, true);
    //     $body = $response['Body'];
    //     $stkCallback = $body['stkCallback'];
    //     $CheckoutRequestID = $stkCallback['CheckoutRequestID'];
    //     $ResultCode = $stkCallback['ResultCode'];
    //     // Log::info($ResultCode);
    //     if ($ResultCode == 0) {
    //         $CallbackMetadata = $stkCallback['CallbackMetadata'];
    //         $Items = collect($CallbackMetadata['Item']);
    //         $phone_number = collect($Items->firstWhere('Name', 'PhoneNumber'))->get('Value');
    //         $transaction_code = collect($Items->firstWhere('Name', 'MpesaReceiptNumber'))->get('Value');
    //         $PhoneNumber = ltrim($phone_number, '254');
    //         $PhoneNumber = '0' . $PhoneNumber;
    //         $t = MpesaTransaction::where('CheckoutRequestID', $CheckoutRequestID)->where('status', 'Push Sent')->first();
    //         if ($t) {
    //             $t->update([
    //                 'status' => 'Paid Complete',
    //                 'MpesaReceiptNumber' => $transaction_code,
    //             ]);
    //             $order = $t->plan_order;
    //             $response_data = [
    //                 "MerchantRequestID" => $stkCallback['MerchantRequestID'],
    //                 "CheckoutRequestID" => $CheckoutRequestID,
    //                 "ResultCode" => $stkCallback['ResultCode'],
    //                 "ResultDesc" => $stkCallback['ResultDesc']
    //             ];
    //             MpesaResponseReceived::dispatch($order, $order->user, $response_data);

    //             $data = [
    //                 'domain' => $order->domain,
    //                 'name' => $order->business_name,
    //                 'order' => $order->id,
    //             ];

    //             return   PaymentHandledEvent::dispatch($data);
    //         }
    //     } else {
    //         $data = [
    //             "MerchantRequestID" => $stkCallback['MerchantRequestID'],
    //             "CheckoutRequestID" => $CheckoutRequestID,
    //             "ResultCode" => $stkCallback['ResultCode'],
    //             "ResultDesc" => $stkCallback['ResultDesc']
    //         ];
    //         $tr = MpesaTransaction::where('CheckoutRequestID', $CheckoutRequestID)->first();
    //         $tr->update(['status' => 'Payment Failed']);
    //         return MpesaPaymentFailed::dispatch($data, $CheckoutRequestID);
    //     }
    // }

    }
