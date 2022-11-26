<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Category;      
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('access_employees');
        $employees = Employee::all();
        return view('pages.employees.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

        protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required|unique:employees|max:255',
            'specialization' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function create(Request $request)
    {


        // $this->authorize('access_employees');
       
       // $validatedData = $request->validate([
       //    'name' => 'required',
       //    'gender' => 'required',
       //    'email' => 'required|unique:employees|max:255',
       //    'phone' => 'required|unique:employees|max:255',
       //    'specialization' => 'required',
       //    'password' => ['required', 'string', 'min:8', 'confirmed'],
       //  ]);

       // Employee::create($request->all());
       // User::create($request->all());
       // Alert::success('Employee Record','Employee record added successfully');
       // return redirect()->route('show_employees');

             Employee::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'specialization' => $request['specialization'],
            'password' => Hash::make($request['password']),
        ]);

             User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

       Alert::success('Employee Record','Employee record added successfully');
       return redirect()->route('show_employees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Employee $employee)
    {  

        // $this->authorize('access_employees');
        $categories = Category::orderby("category_name","asc")->select('id','category_name')->get();
       return view('pages.employees.add')->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    { 

        // $this->authorize('access_employees');
        $categories = Category::orderby("category_name","asc")->select('id','category_name')->get();

        $data = $employee; 
        $id= $employee->id;
        return view('pages.employees.edit',compact('data','id'))->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {

        // $this->authorize('access_employees');
        $employee->update($request->validated());
        Alert::success("Update","Record was updated successfuly");
        return redirect()->route('show_employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        
        // $this->authorize('access_employees');

        $employee_email = Employee::where('id',$id)->first()->email;
        // dd($employee_email);
        //Delete employee from the employees table     
        Employee::where('id',$id)->delete();
        //Delete employee from the users table 
        User::where('email',$employee_email)->delete();
        Alert::warning('Delete warning', 'Employee record deleted successfully');
        return back()->with("delete","Record deleted successfuly");
    }
}
