<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function new_transaction() {
    	// Fetch Services Available
     $customers['data'] = Customer::orderby("name","asc")->select('id','name')->get();
             // dd($customers['data']);
     $categories = Category::orderby("category_name","asc")->select('id','category_name')->get();
     $services['data'] = Service::orderby("service_name","asc")->select('id','service_name')->get();
        return view('pages.transactions.make_transaction')->with('customers', $customers);
    }

   public function getServices($customerid=0){

     // Fetch Employees by Departmentid
     $ServicesData['data'] = Employees::orderby("name","asc")->select('id','name')->where('department',$departmentid)->get();

     return response()->json($empData);

   }
}
