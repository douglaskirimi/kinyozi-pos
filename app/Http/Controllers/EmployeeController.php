<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Category;      
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('pages.employees.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
       $validatedData = $request->validate([
          'fname' => 'required',
          'lname' => 'required',
          'email' => 'required|unique:employees|max:255',
          'phone' => 'required|unique:employees|max:255',
          'specialization' => 'required',
          'password' => 'required|min:6', 
          // 'password_confirmation' => 'required|same:password|min:6',
        ]);

       Employee::create($request->all());
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
        $data = $employee; 
        $id= $employee->id;
        return view('pages.employees.edit',compact('data','id'));
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
        Employee::where('id',$id)->delete();
        Alert::warning('Delete warning', 'Employee record deleted successfully');
        return back()->with("delete","Record deleted successfuly");
    }
}
