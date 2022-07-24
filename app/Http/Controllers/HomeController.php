<?php

namespace App\Http\Controllers;
use App\Models\Service;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data=Service::all();
        $array=array();
        $array[]=['Service', 'Customers Per Day'];
        foreach ($data as $dt) {
            $array[]=[$dt->service_name,(float)$dt->service_charges];
        }
       // $array[]=   ['Service', 'Customers Per Day'];
      //  die(json_encode($array));
        return view('dashboard')->with(['data'=>$array]);
    }
}
