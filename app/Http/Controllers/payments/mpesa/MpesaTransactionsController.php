<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\payments\mpesa\MPESAResponsesController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        $access_token=json_decode($curl_response);
        // dd($access_token->access_token);
        if (!empty($access_token)) {
         return $access_token->access_token;
        } 
        else{
            return back()->withError('Failed: Sorry for inconvinience. Check your internet connection and try again');
        }   
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


        public function stkPush(Request $request)
    {
        $phone = ltrim($request->mpesa_number,0);
        $customer_payment_number = '254' . $phone;
        $service_fees = $request->service_fees;
        $data = $request;
        // dd($data);


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
            'PartyA' => $customer_payment_number, // replace this with your phone number
            'PartyB' => 174379,
            'PhoneNumber' => $customer_payment_number, // replace this with your phone number
            'CallBackURL' => 'https://kinyozi-point-of-sale.herokuapp.com/' . 'api/Mpesa/payment/responses',
            'AccountReference' => "Glitter Barbershop",
            'TransactionDesc' => "Testing stk push on sandbox"
        ];

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        if(curl_exec($curl)) {   
            $curl_response = curl_exec();
            $stkPullResponse = json_decode($curl_response);
            // dd($stkPullResponse);
            $stkResCode  = $stkPullResponse->ResponseCode;
            // dd($stkResCode);

        // Log::info($stkResCode);
        if ($stkResCode == 0) {
           // return view('/pages.transactions.completeTransaction',compact('data'))->with('data',$data);
        	return redirect()->action([MpesaResponsesController::class, 'stkResponseMsg']);
        }
        else{
            return null;
        }
     }
     else{
     	return "Error 109";
     }
 
    }

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
