<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateServiceRequest;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('pages.services.index2',['services'=>$services]);
        Alert::warning('Warning Title', 'Warning Message');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function display_form()
    {      
       $categories['data'] = Category::orderby("category_name","asc")->select('id','category_name')->get();
       // print($categories['data']);
       return view('pages.services.add_service')->with('categories',$categories);
    }

    public function create(Request $request)
    {
         $validatedData = $request->validate([
          'service_name' => 'required|unique:services|max:255',
          'service_charges' => 'required',
          'service_category' => 'required', 
        ]);

        Service::create($request->all());
        Alert::success('Notification','Service added successfully');
       return redirect()->route('show_services');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $data = $service; 
        $id= $service->id;
        // die($data);
        return view('pages.services.edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
         $service->update($request->validated());
        Alert::success("Update","Service was updated successfuly");
        return redirect()->route('show_services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id',$id)->delete();
        Alert::warning('Delete Service warning', 'Service record removed!');
        return redirect()->route('show_services');
    }
}
