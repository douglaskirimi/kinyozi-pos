@extends('layouts.app', ['title' => __('Categories')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
          <div class="text-right mt-4">
              <a href="{{ route('all_transactions') }}" class="btn btn-md btn-dark">Transaction History</a>
            </div>
            <div class="bg-transparent my-2 mt-4 mb-4">
              <h3 class="mb-0 text-dark">Edit Transaction Record</h3>
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
    
    <div class="form-row">
     <div class="form-group"> 
        <input type="submit" class="form-control btn btn-info" name="add_employee" id="inputSname" value="UPDATE">     
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
