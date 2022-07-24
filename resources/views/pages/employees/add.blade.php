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
 <form action="{{ route('employee.create') }}" method="POST" autocomplete="on">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputFname">First name</label>
      <input type="text" class="form-control" name="fname" id="inputFname" placeholder="First name..." value="{{ old('fname')}}"> 
      @error('fname')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
     <div class="form-group col-md-6">
      <label for="inputFname">Second name</label>
      <input type="text" class="form-control" name="lname" id="inputSname" placeholder="Second name..." value="{{ old('lname')}}">
        @error('lname')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
   <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email..." value="{{ old('email')}}">
       @error('email')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone">Phone</label>
      <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Phone Number..." value="{{ old('phone')}}">
      @error('phone')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <div class="form-row">
   <div class="form-group col-md-6">
    <label for="inputCategoryname">Employee Specialization <b class="text-danger"></b></label>
    <select class="form-control" name="specialization" value="{{ old('specialization')}}">
      <option value="">-- Select Specialization --</option>
      <!-- Read Categories -->
      @foreach($categories as $category)  
      <<option value='{{ $category->category_name }}'>{{ $category->category_name }}</option>
      @endforeach
    </select>     
     @error('specialization')
         <span class="text-danger">{{ $message }}</span>
      @enderror  
    </div>

     <div class="form-group col-md-6">
      <label for="inputpassword">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Set password...">
       @error('password')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
<!--     <div class="form-group col-md-6">
      <label for="inputPassword">Confirm password</label>
      <input type="password" class="form-control" name="password_confirmation" id="inputPassword" placeholder="Confirm password...">
       @error('password_confirmation')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div> -->
  </div>

  <div class="text-right">
     <button class="btn btn-primary">+ ADD EMPLOYEE</button>
  </div>

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
        
        @include('layouts.footers.auth')
    </div>
@endsection
