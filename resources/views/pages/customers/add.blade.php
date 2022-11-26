@extends('layouts.app', ['title' => __('Customers')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
            
            <div class="text-right mt-4">
              <a href="{{ route('customers_list') }}" class="btn btn-md btn-dark"><span class="fa fa-share"></span> All Customers</a>
            </div>
            <div class="bg-transparent my-2 mt-4 mb-4">
              <h3 class="mb-0 text-dark">New Customer</h3>
            </div>
 <form action="{{ route('customers.create') }}" method="POST" autocomplete="on">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputFname">Name <b class="text-danger">*</b></label>
      <input type="text" class="form-control" name="name" id="inputname" placeholder="First name..." value="{{ old('name') }}"> 
        @error('name')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
        <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email..." value="{{ old('email') }}">
       @error('email')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
   <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputEmail4">Gender</label>
       <select class="form-control" name="gender">
        <option value="select">--Select Gender --</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Rather Not Say">Rather not say</option>         
       </select>
      <!-- <input type="text" class="form-control" name="gender" id="inputEmail4" placeholder="Customer Gender..."> -->
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone">Phone <b class="text-danger">*</b></label>
      <input type="number" class="form-control" name="phone" id="inputPhone" placeholder="Phone Number..." value="{{ old('phone') }}">      
      @error('phone')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

<!--      <div class="form-group col-md-6">
      <label for="specialization">Specialization <b class="text-danger">*</b></label>
      <select class="form-control" name="specialization" id="specialization" value="{{ old('specialization') }}">
        <option value="Not specified">--Select Specialization --</option>
    
      @foreach($categories['data'] as $category)  
        <option value='{{ $category->category_name }}'>{{ $category->category_name }}</option>
      @endforeach
      </select>      
      @error('service_category')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div> -->

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

  <div class="text-right">
     <button class="btn btn-info">Save</button>
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
        
    </div>
@endsection
