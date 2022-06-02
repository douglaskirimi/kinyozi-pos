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
      <label for="service-name">Service name</label>
      <input type="text" class="form-control" name="service_name" placeholder="Service Name..."  required autofocus> @if ($errors->has('fname'))
        <span class="invalid-feedback" role="alert">
         <strong>{{ $errors->first('fname') }}</strong>
        </span>
        @endif
    </div>
     <div class="form-group col-md-6">
      <label for="service-category">Service Category</label>
      <input type="text" class="form-control" name="service_category" placeholder="Service Category"  required autofocus>
    </div>
  </div>
   <div class="form-row">
     <div class="form-group col-md-6">
      <label for="charges">Service Charges</label>
      <input type="text" class="form-control" name="service_charges" placeholder="Service Charges">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone">Phone</label>
      <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Phone Number..." required autofocus>
    </div>
  </div>

  <div class="text-right">
     <button class="btn btn-primary">+ ADD SERVICE</button>
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
        
        <!-- @include('layouts.footers.auth') -->
    </div>
@endsection
