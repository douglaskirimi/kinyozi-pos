<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Service;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Transaction;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\TransactionRequestUpdator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TransactionController extends Controller
{
    public function index() {
         $transactions=DB::table('transactions')->select('id','cust_name','customer_id','payment_number','amount','receipt_number')->where('status','active')->distinct()->get();
         // dd($transactions);
     // $transactions =Transaction::orderby("id","asc")->select("receipt_number")->distinct();

    return view('pages.transactions.index')->with('transactions', $transactions);
    }

    public function index2() {
         $transactions=DB::table('mpesa_payments')->select('id','PhoneNumber','ResultDesc','MpesaReceiptNumber','Amount','Status','TransactionDate','created_at')->distinct()->get();
      return view('pages.transactions.mpesa_payments')->with('transactions', $transactions);
    }

    public function new_transaction() {

    	// Fetch Services Available
     $customers['data'] = Customer::orderby("name","asc")->select('id','name')->get();
             // dd($customers['data']);
     $categories = Category::orderby("category_name","asc")->select('id','category_name')->get();
     $services['data'] = Service::orderby("service_name","asc")->select('id','service_name')->get();
     $employees['data'] = Employee::orderby("name","asc")->select('id','name')->get();
        return view('pages.transactions.make_transaction')->with('customers', $customers)->with('employees',$employees)->with('services',$services);
    }
    
   public function confirm_payment(Request $request){
    $data = $request;
    $name = $request->name; 
    // dd($name);
    $served_by = Auth::user()->name;
    $service_name = $request->service_name;

    $customer_data = DB::table('customers')->where('name',$name)->first();

    $service_data = DB::table('services')->where('service_name',$service_name)->first();

    $unformatted_phone = DB::table('customers')->where('name',$name)->first()->phone;
    $phone = str_replace('254',0,$unformatted_phone);

// dd($phone);

    // $customer_name = $request->name;
    // $served_by = $request->empl_name;
    // $service_name = $request->service_name;
    // dd($phone);
    return view('pages.transactions.confirm_payment',compact('data','customer_data','service_data','phone'));
   }

   public function save(Request $request) {  
    $customer_id  = $request->customer_id;  
    $name  = $request->customer_name;
    $customer_phone  = $request->mpesa_number;
    $servicce_offered  = $request->service_offered;
    $service_fee  = $request->service_fees;
    $served_by  = auth()->user()->name;
    $service_fee  = $request->service_fees;

    $transaction = new Transaction;
    $transaction->cust_name = $request->customer_name;
    $transaction->service_offered  = $request->service_offered;
    $transaction->customer_id = $customer_id;
    $transaction->payment_number = $request->mpesa_number;
    $transaction->served_by = $served_by;
    $transaction->receipt_number = 'LXCRGJ'.rand(1,10000);
    // dd($transaction->receipt_number);
    $transaction->amount = $request->service_fees;
    $transaction->status = 'active';
    $transaction->save();
    return redirect()->route('all_transactions');
   }

   public function send_stk(Request $request) {
    // $name  = $request->customer_name;
    // $customer_phone  = $request->mpesa_number;
    // $servicce_offered  = $request->service_offered;
    // $service_fee  = $request->service_fees;
    // $served_by  = $request->$payment_data;
    // $service_fee  = $request->service_fees;
    // dd($name);
    $url = "https://tinypesa.com/api/v1/express/initialize";

    $phone = $request->mpesa_number;
    $amount = $request->service_fees;

    

// session_destroy(); 
// session_start();
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "ApiKey: o4gX18UN9y5",
   "Content-Type: application/x-www-form-urlencoded",
   // "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "amount=$amount&msisdn=$phone";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
 // return $resp;
curl_close($curl);
$json=json_decode($resp,true);
 // return $json;

// $_SESSION['init']=$json->success;
// $_SESSION['phone']=$phone; 
  
    $transaction = new Transaction;
    $transaction->cust_name = $request->customer_name;
    $transaction->service_offered  = $request->service_offered;
    $transaction->customer_id = "1".rand(0,9);
    $transaction->payment_number = $request->mpesa_number;
    $transaction->served_by = $request->served_by;
    $transaction->receipt_number = 'LXCRGJ'.rand(1,10000);
    // dd($transaction->receipt_number);
    $transaction->amount = $request->service_fees;
    $transaction->status = 'active';
    $transaction->save();

// return redirect('/transactions/records');
return redirect()->route('receive_stk_response');
// return redirect()->action([controllerPath::class, 'classMethod'], [' dataParameter' => 'if exist']);
   }

   public function stk_response(Request $request) {
    // $transaction = new Transaction;
    // $transaction->cust_name= 'Douglas Murimi';
    // $transaction->customer_id = "1".rand(0,9);
    // $transaction->payment_number= $request->mpesa_number;
    // $transaction->receipt_number = 'LXCRGJ'.rand(1,10000);
    // // dd($transaction->receipt_number);
    // $transaction->amount = 500;
    // $transaction->status = 'active';
    // $transaction->save();
    // $transactionId = $transaction->id;
    // dd($transactionId);
    return redirect()->route('all_transactions');
// return redirect('/generate/receipt/'.$transactionId);
    // return redirect()->action([TransactionController::class, 'generatePDF'], [' $id' => $transactionId ]);
   }


    public function showform(Transaction $transaction)
    {        
       return view('pages.transactions.add');
    }

    public function edit(Transaction $transaction)
    {
        $data = $transaction; 
        $id= $transaction->id;
        return view('pages.transactions.edit',compact('data','id'));
    }

    public function update(Request $request, Transaction $transaction)
    {
          $request->validate([
            'category_name' => 'required',
            'category_thumbnail' => 'required',
        ]);

           $input = $request->all();

           if($request->file('category_thumbnail')){
            $file= $request->file('category_thumbnail');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Categories Thumbnails'), $filename);
            $input['category_thumbnail']= $filename;
        }
        else{
            unset($input['category_thumbnail']);
        }

        if($category->update($input)) {
        Alert::success("Update Category ","Category updated successfuly");
        return redirect()->route('show_categories');            
        }
        else{
        Alert::danger("Error! ","Failed to update category!");
        return redirect()->back();            
        }            
        }
        
        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->category_thumbnail = $filename;
        // $category->save();

        // $category->update($request->validated());
      
    // }

    public function delete($id)
    {      
        // Transaction::where('id', $id)->update(array('status' => 'inactive'));
        Transaction::where('id',$id)->delete();

        Alert::warning('Delete Transaction Record', 'Transaction record removed successfully');
        return back()->with("delete","Transaction record removed successfully");
    }

     public function generatePDF($id)
      {

        // $receiptDetails=DB::table('transactions')->select('id','cust_name','service_offered','customer_id','payment_number','amount','served_by','receipt_number','created_at')->where('id',$id)->get();

        $receiptDetails=DB::table('mpesa_payments')->select('id','PhoneNumber','Amount','MpesaReceiptNumber','TransactionDate')->where('id',$id)->get();


        $data = [
            'title' => 'Glitters Barbershop',
            'date' => date('m/d/Y'),
            'customer_name' => 'CustomerA',
            'service_offered' => 'Special Cut',
            'payment_number' => $receiptDetails[0]->PhoneNumber,
            'amount' => $receiptDetails[0]->Amount,
            'served_by' => 'Douglas',
            'receipt_number' => $receiptDetails[0]->MpesaReceiptNumber,
            'transaction_date' => $receiptDetails[0]->TransactionDate            
        ];
          
        $pdf = PDF::loadView('pages.transactions.pdfgenerator', $data);
    
        // return $pdf->download('kpos_receipt.pdf');
        return $pdf->stream('kpos_receipt.pdf');
    }

}
