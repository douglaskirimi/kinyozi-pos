@extends('layouts.app', ['title' => __('Roles')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0 text-dark">Roles</h3>

            <div class="text-right mt-4">
              <a href="{{ route('roles.create') }}" class="btn btn-md btn-dark"><span class="fa fa-share"></span> View Roles</a>
            </div>
      </div>

<div class="card-body">
 <form action="{{ route('role.create') }}" method="POST" autocomplete="on" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputCategoryname">Role name<b class="text-danger"> *</b></label>
      <input type="text" class="form-control" name="role_name" id="inputname" placeholder="Role name...">
           @error('role_name')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

    <div class="" style="margin-top: 20px;">
     <div class="card-header bg-transparent">Permissions</div>
        <div class="card-body">
          <div class="row">
           @foreach ($permissions as $permission)
             <div class="col-md-2 col-sm-2 col-4">
              <label class="switch checkbox-inline">
               <input type="checkbox" name="permissions[]" value="{{ $permission->permission }}">
                <span class="slider round"></span>
              </label>
               <p>{{ $permission->permission }}</p>
           </div> 

     @endforeach

            <div class="col-md-2 col-sm-2 col-4">
              <label class="switch checkbox-inline">
               <input type="checkbox" name="permissions[]" value="addemployee">
                <span class="slider round"></span>
              </label>
               <p>{{__('Add Employees')}}</p>
           </div> 


<!--                   <div class="col-md-2 col-sm-2 col-4">
              <label class="switch checkbox-inline">
               <input type="checkbox" name="addRole">
                <span class="slider round"></span>
              </label>
               <p>{{__('Add Role')}}</p>
           </div> 
    </div>
 </div>
</div> -->

  <div class="text-left">
     <button class="btn btn-info">+ Create Role</button>
  </div>

<!--    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputpassword">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Set password..." required autofocus>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Confirm password</label>
      <input type="password" class="form-control" name="confirm-password" id="inputPassword" placeholder="Confirm password..." required autofocus>
    </div>
  </div -->

    <!--  <div class=""> 
        <input type="submit" class="form-control btn btn-primary" name="add_employee" id="inputSname" value="+ ADD EMPLOYEE">     
    </div> -->

<!--   <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputSkill">Skills\Expertise</label>
      <select name="skill" id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Hair Cutting i.e all cuts categories</option>
        <option>Hair Styling</option>
        <option>Hair colouring</option>
        <option>Face Scrubbing and Treatment</option>
        <option>Beard Trimming</option>
      </select>
    </div> 
  <div class="form-group col-md-6">
      <label for="disabledTextInput">Service Charges</label>
      <input type="text" class="form-control" name="tel" id="disabledTextInput" placeholder="Service cost/charge..." readonly="true">
    </div>
</div> -->
    </div>
</form>   
</div>    
           
           </div>
         </div>
    </div>
  </div>
  </div>
@endsection
