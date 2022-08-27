@extends('layouts.app', ['title' => __('Customers')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
        <div class="text-right mt-4">
              <a href="{{ route('customers_list') }}" class="btn btn-md btn-primary">All Customers</a>
            </div>
            <div class="bg-transparent my-2 mt-4 mb-4">
              <h3 class="mb-0">Edit Customer Details</h3>
          </div>

 <form action="/customers/update/{{$id}}" method="POST" autocomplete="off">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputname">Name</label>
      <input type="text" class="form-control" name="name" id="inputname" placeholder="First name..." value="{{ $data->name }}">
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email..." value="{{ $data->email }}">
    </div>
  </div>
   <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputEmail4">Gender</label>
      <input type="text" class="form-control" name="gender" id="inputEmail4" placeholder="Gender..." value="{{ $data->gender }}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone">Phone</label>
      <input type="number" class="form-control" name="phone" id="inputPhone" placeholder="Phone Number..." value="{{ $data->phone }}">
    </div>
  </div>
<!--    <div class="form-row">
      <div class="form-group col-md-6">
      <label for="specialization">Specialization</label>
      <select class="form-control" name="specialization" id="specialization" value="{{ $data->specialization}}">
        <option value="{{ $data->specialization}}">{{ $data->specialization}}</option>

      @foreach($categories['data'] as $category)  
        <option value='{{ $category->category_name }}'>{{ $category->category_name }}</option>
      @endforeach
      </select>      
      @error('service_category')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
 --><!--    <div class="form-row">
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
        
    </div>
@endsection
