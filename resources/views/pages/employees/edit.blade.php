@extends('layouts.app', ['title' => __('Employees')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
        <div class="text-right mt-4">
              <a href="{{ route('show_employees') }}" class="btn btn-md btn-primary">+ See all</a>
            </div>
            <div class="bg-transparent my-2 mt-4 mb-4">
              <h3 class="mb-0">Edit Employee Details</h3>
          </div>

 <form action="/empoyees/update/{{$id}}" method="POST" autocomplete="off">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="employee_name">Employee Name</label>
      <input type="text" class="form-control" name="empl_name" id="empl_name" placeholder="Employee name..." value="{{ $data->empl_name }}">
    </div>
     <div class="form-group col-md-6">
      <label for="inpuSname">Gender</label>     
      <select class="form-control" class="form-control" name="gender" id="employee_name">
      <option value="{{ $data->gender }}">{{ $data->gender }}</option>
      <!-- Read Categories -->
      <option value='male'>Male</option>
      <option value=''>Female</option>
      <option value='Rather Not Say'>Rather Not Say</option>
    </select> 
    </div>
  </div>
   <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email..." value="{{ $data->email }}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone">Phone</label>
      <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Phone Number..." value="{{ $data->phone }}">
    </div>
  </div>

     <div class="form-row">
     <div class="form-group col-md-6">
      <label for="specialization">Sepcialization</label>
      <select class="form-control" class="form-control" name="specialization" id="specialization">
      <option value="{{ $data->email }}">{{ $data->specialization }}</option>
      <!-- Read Categories -->
      @foreach($categories as $category)  
      <option value='{{ $category->category_name }}'>{{ $category->category_name }}</option>
      @endforeach
    </select>     
    </div>
  </div>
<!--    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputpassword">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Set password..." value="{{ $data->fname }}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Confirm password</label>
      <input type="password" class="form-control" name="confirm-password" id="inputPassword" placeholder="Confirm password...">
    </div>
  </div> -->

    
    <div class="form-row">
     <div class="form-group"> 
        <input type="submit" class="form-control btn btn-primary" name="add_employee" id="inputSname" value="UPDATE">     
    </div>
  </div>
    </div>
</form>       
           
           </div>
         </div>
    </div>
  </div>
        
        <!-- @include('layouts.footers.auth') -->
    </div>
@endsection
