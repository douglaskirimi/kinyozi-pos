@extends('layouts.app', ['title' => __('Roles')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row my-5">
        <div class="col">
          <div class="card py-2 px-3">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Roles</h3>
            </div>

            <div class="text-right">
              <a href="{{ route('roles.create') }}" class="btn btn-md btn-warning">+ Add Role</a>

              <a href="{{ route('permission.create') }}" class="btn btn-md btn-dark">+ Create Permission</a>
            </div>
            
            <br> <!-- Light table -->
            <div class="table-responsive">

              <table class="table align-items-center table-bordered">
                <thead class="bg-transparent text-dark">
                    <tr class="align-items-center">
                    <th scope="col" data-sort="id">#</th>
                    <th scope="col" data-sort="id">Name</th>
                    <th scope="col" data-sort="email">Permissions Assigned</th></th>
                    <th scope="col" data-sort="action">Action</th>
                  </tr>
                </thead>
                @foreach($roles as $role)
                <tbody class="list">
                 <td class="">{{ $role->id }}</td>
                 <td class="">{{ $role->role_name }}</td>   
                 <td class="">                 
                  <span class="">
                  @foreach($role->permissions as $permission) 
                   
                    {{ $permission }},
                 
                 @endforeach
                 </span>
                  </td>  
    
                 <td class="text-right">
                 <div class="dropdown">
                 <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-ellipsis-v"></i>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="margin-right:-70px;margin-top:10px; background-color:transparent!important!">
                 <a class="dropdown-item" href=""><i class="fa fa-edit" style="color: blue;background-color:transparent!important;font-size: 14px;">Edit</i></a>
                 <a class="dropdown-item" href="/roles/delete/{{ $role->id }}"><i class="fa fa-trash" style="color: red;font-size: 14px;">&nbsp;Remove</i></a>
                 <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                 </div>      

                 </div>
                 </td>
               </tbody>
               @endforeach
             </table>
           </div>
         </div>
    </div>
  </div>
    </div>

@endsection
