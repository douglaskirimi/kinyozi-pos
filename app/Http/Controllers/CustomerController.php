<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;    
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
       public function index() {
       	 $customers = Customer::all();
         return view('pages.customers.index',['customers'=>$customers]);
       }
   public function create(Request $request)
    {
             $validatedData = $request->validate([
          'name' => 'required',
          'email' => 'unique:customers|max:255',
          'phone' => 'required|unique:customers|max:255',
        ]);

        $formatted_phone = str_replace('0','+254',$request->phone);

        $newCustomer = new Customer;
        $newCustomer->name = $request->name;
        $newCustomer->email = $request->email;
        $newCustomer->gender = $request->gender;
        $newCustomer->phone = $formatted_phone;
        $newCustomer->save();


        // dd($newCustomer);


       // Customer::create($request->all());
       Alert::success('New Customer','Customer added successfully');
       return redirect()->route('customers_list');
    }

    public function store(Request $request)
    {
        //
    }

    public function showform()
    {        
         $categories['data'] = Category::orderby("category_name","asc")->select('id','category_name')->get();
       return view('pages.customers.add')->with('categories',$categories);
    }

    public function edit(Customer $customer)
    {
         $categories['data'] = Category::orderby("category_name","asc")->select('id','category_name')->get();
        $data = $customer; 
        $id= $customer->id;
        return view('pages.customers.edit',compact('data','id'))->with('categories',$categories);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        Alert::success("Customer Update","Customer record updated successfuly");
        return redirect()->route('customers_list');
    }

    public function delete($id)
    {       
        Customer::where('id',$id)->delete();
        Alert::warning('Delete Customer', 'Customer removed successfully');
        return back()->with("delete","Customer removed successfully");
    }
}
