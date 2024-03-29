@extends('layouts.app', ['title' => __('Services')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
        <div class="text-right mt-4">
              <a href="{{ route('show_services') }}" class="btn btn-md btn-dark">+ See all</a>
            </div>
            <div class="bg-transparent my-2 mt-4 mb-4">
              <h3 class="mb-0">Edit Service</h3>
          </div>


 <form action="/services/edit/{{$id}}" method="POST" autocomplete="off">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputFname">Service Name</label>
      <input type="text" class="form-control" name="service_name" id="inputFname" placeholder="First name..." value="{{ $data->service_name }}">
    </div>
     <div class="form-group col-md-6">
      <label for="inpuSname">Service Category</label>
      <select class="form-control" name="service_category" id="inputSname" placeholder="Second name...">
      <option value="{{ $data->service_category }}">{{ $data->service_category }}</option>
      @foreach($categories['data'] as $category)  
        <option value='{{ $category->category_name }}'>{{ $category->category_name }}</option>
      @endforeach
      </select>      
      @error('service_category')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
   <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputEmail4">Service Charges</label>
      <input type="text" class="form-control" name="service_charges" id="inputEmail4" placeholder="Email..." value="{{ $data->service_charges }}">
    </div>
  </div>    
    <div class="form-row">
     <div class="form-group"> 
        <input type="submit" class="form-control btn btn-info" name="updateservice" id="inputSname" value="UPDATE">     
    </div>
  </div>
    </div>
</form>       
           
           </div>
         </div>
    </div>
  </div>
        
        <!-- ('layouts.footers.auth') -->
    </div>
@endsection
