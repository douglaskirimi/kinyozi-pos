@extends('layouts.app', ['title' => __('Services')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">New Service</h3>
            </div>
            <div class="text-right">
              <a href="{{ route('show_services') }}" class="btn btn-md btn-primary">+ See all</a>
            </div>
 <form action="{{ route('add_service') }}" method="POST" autocomplete="on">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="service-name">Service name <b>*</b></label>
      <input type="text" class="form-control" name="service_name" placeholder="Service Name..."  value="{{ old('service_name') }}" required autofocus>
      @error('service_name')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
     <div class="form-group col-md-6">
      <label for="service-category">Service Category <b>*</b></label>
      <select class="form-control" name="service_category" id="category_name" value="{{ old('service_category') }}">
        <option value="">--Select Service Category --</option>
      <!-- Read Categories -->
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
      <label for="charges">Service Charges <b>*</b></label>
      <input type="text" class="form-control" name="service_charges" value="{{ old('service_charges')}}" placeholder="Service Charges">
      @error('service_charges')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
 <!--    <div class="form-group col-md-6">
      <label for="inputPhone">Service Specialists</label>
      <input type="text" class="form-control" name="specialists" id="" placeholder="Number of Specialists" required autofocus>
    </div> -->
  </div>

  <div class="text-right">
     <button class="btn btn-primary">+ ADD SERVICE</button>
  </div>
    </div>
</form>       
           
           </div>
         </div>
    </div>
  </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
