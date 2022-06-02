@extends('layouts.app', ['title' => __('Employees')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">NEW EMPLOYEE</h3>
            </div>
            <div class="text-right">
              <a href="{{ route('show_employees') }}" class="btn btn-md btn-primary">+ See all</a>
            </div>
 <form action="/empoyees/edit/{{$id}}" method="POST" autocomplete="off">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputFname">First name</label>
      <input type="text" class="form-control" name="fname" id="inputFname" placeholder="First name..." value="{{ $data->fname }}">
    </div>
     <div class="form-group col-md-6">
      <label for="inpuSname">Second name</label>
      <input type="text" class="form-control" name="lname" id="inputSname" placeholder="Second name..." value="{{ $data->lname }}">
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
