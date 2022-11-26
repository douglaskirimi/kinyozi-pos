<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use App\Models\Role;
use App\Models\Permission;
use App\Providers\RouteServiceProvider;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function roles_testing() {
       if(Gate::allows('isAdmin')) {
        $roles = Role::paginate(6);
        return view ('pages.roles.index',compact('roles'));
       }
       else{
         redirect(RouteServiceProvider::HOME);
       }
    }

    public function index() {  
        $roles = Role::paginate(6);
        return view ('pages.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $permissions = Permission::all();
       return view ('pages.roles.add',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = $request->permissions;
        // dd($permissions);

       Role::create([    
        'role_name' => $request['role_name'],
        'permissions' => $permissions,
       ]);
       return redirect()->action([RoleController::class, 'index']);
    }

    public function permissionSave(Request $request)
    {
        Permission::create([    
        'permission' => $request['permission_name'],
       ]);
       return back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Role::where('id',$id)->delete();
       Alert::info("Deleted!");
       return back();
    }
}
