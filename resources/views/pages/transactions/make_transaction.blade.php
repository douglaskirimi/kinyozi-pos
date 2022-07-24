@extends('layouts.app', ['title' => __('Transaction')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Make New Transaction</h3>
            </div>
            <div class="text-right">
              <a href="{{ route('show_employees') }}" class="btn btn-md btn-primary">+ See all</a>
            </div>
 <form action="{{ route('category.create') }}" method="POST" autocomplete="on">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCategoryname">Customer <b class="text-danger">*</b></label>
      <select class="form-control" name="name" id="choose_customer">
      <option value="">--Choose Customer --</option>
      <!-- Read Categories -->
      @foreach($customers['data'] as $customer)  
        <option value='{{ $customer->name }}'>{{ $customer->name }}</option>
      @endforeach
      </select>      
      @error('name')
         <span class="text-danger">{{ $message }}</span>
      @enderror 
      </select>
    </div>

  <div class="form-group col-md-6">
    <label for="inputCategoryname">Served By [Employee] <b class="text-danger"></b></label>
    <select class="form-control" name="name">
      <option value='0'>--- Select Employee ---</option>
      <option value=''></option>  
    </select>   
    </div>
  </div>


  <!-- <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCategoryname">Service Category <b class="text-danger"></b></label>
      <select class="form-control" name="category_name" id="category_name">
      <option value='0'>-- Select Service Category --</option>
      <option value=''></option>  
      </select>
    </div>
 -->

   <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputCategoryname">Service <b class="text-danger"></b></label>
      <select class="form-control" name="service_name" id="choose_service">
      <option value='0'>-- Select Service--</option>
      <option value=''></option>  
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="inputPhone">Customer's Phone</label>
      <input type="number" class="form-control" name="phone" id="inputPhone" value="" placeholder="Phone Number e.g 07xxxxxxxx" readonly="readonly">
      @error('phone')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>


  <div class="text-left">
     <button class="btn btn-primary">Record Transaction</button>
  </div>

  <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type='text/javascript'>
   $(document).ready(function(){

      // Department Change
      $('#category_name').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         // $('#sel_emp').find('option').not(':first').remove();

         // AJAX request 
         $.ajax({
           url: 'getServices/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
                len = response['data'].length;
             }

             if(len > 0){
                // Read data and create <option >
                for(var i=0; i<len; i++){

                   var id = response['data'][i].id;
                   var name = response['data'][i].service_name;

                   var option = "<option value='"+id+"'>"+service_name+"</option>";

                   $("#choose_service").append(option); 
                }
             }

           }
         });
      });
   });
   </script>

</div>
</form>       
           
           </div>
         </div>
    </div>
  </div>
    </div>
@endsection
