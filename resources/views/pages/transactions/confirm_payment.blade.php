@extends('layouts.app', ['title' => __('Transaction')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
               <div class="text-right mt-4">
              <a href="{{ route('all_transactions') }}" class="btn btn-md btn-dark">&#8618; All Transactions</a>
            </div>
            <div class="bg-transparent my-2 mt-4 mb-4">
              <h3 class="mb-0 text-dark">Confirm Transaction Details</h3>
          </div>

 <form action="{{ route('send_stk') }}" autocomplete="on" method="post">
    @csrf

    <div class="card">
        <div class="card-body">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCategoryname">Customer Name : <b class="text-success"> {{ $customer_data->name }} </b></label>
      <input type="hidden" name="customer_name" value="{{ $customer_data->name }}">
    </div>
    </div>

      <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputCategoryname">Customer Mpesa Number : <b class="text-success"> {{ $phone }} </b></label>
      <input type="hidden" name="mpesa_number" value="{{$phone }}">
    </div>
    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCategoryname">Service Offered : <b> {{ $service_data->service_category }}</b> / <b class="text-success">{{ $service_data->service_name }} </b></label>
      <input type="hidden" name="service_offered" value="{{ $service_data->service_name }} ">
    </div>
 </div>

  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputCategoryname">Service Fees : <b class="text-success"> Ksh. {{ $service_data->service_charges }} </b></label>
      <input type="hidden" name="service_fees" value="{{ $service_data->service_charges }}">
    </div>
    </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCategoryname">Served By : <b class="text-success"> {{ $data->empl_name }} </b></label>
      <input type="hidden" name="served_by" value="{{ $data->empl_name }}">
    </div>
    </div>

<!--   <div class="form-group col-md-6">
      <p class="my-2">New Customer</p>
  <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
</div>
 -->

  <div class="text-left">
     <button class="btn btn-success" data-toggle="" data-target="">Send STK PUSH</button>
  </div>
</div>
</div>
</form>    

        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body ">
                            
                            <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-uppercase">Pay Now</span>
                                    <i class="fa fa-close close" data-dismiss="modal"></i>
                            </div>

                            <div class="row mt-3">

                                <div class="col-md-6">
                                    
                                    <div class="d-flex flex-column">
                                        <small>Customer</small>
                                        <span class="font-weight-bold">
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <small>Tuition Fee Due Date</small>
                                        <span class="font-weight-bolder">12/10/2020</span>
                                    </div>

                                </div>
                                

                            </div>

                            <div class="mt-3 d-flex flex-column">
                                
                               <small>Class</small>
                               <span class="font-weight-bolder">Stage 1A</span>                                 

                            </div>

                            <div class="mt-3">

                                <small>Payment Plan</small>
                                <div class="row mt-1">
                                    
                                    <div class="col-md-6">
                                        
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                          <label class="form-check-label" for="flexRadioDefault1">
                                            Monthly
                                          </label>
                                        </div>
                                    </div>              

                                    <div class="col-md-6">


                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                          <label class="form-check-label" for="flexRadioDefault2">
                                            Weekly
                                          </label>
                                        </div>
                                        
                                    </div>                      

                                </div>
                                
                            </div>

                            <div class="mt-3">


                                <label class="radio"> <input type="radio" name="week" value="1" checked> <span>1st Week</span> </label> 

                                <label class="radio"> <input type="radio" name="week" value="2"> <span>2nd Week</span> </label>

                                <label class="radio"> <input type="radio" name="week" value="3"> <span>3rd Week</span> </label>


                                <label class="radio"> <input type="radio" name="week" value="4"> <span>4th Week</span> </label>
                                
                            </div>


                            <div class="mt-3 text-center fee align-items-center">

                                <h3 class="mb-0 font-weight-light">$1,000</h3>
                                
                            </div>


                            <div class="mt-3">

                                <small>Payment Method</small>
                                
                                <div class="d-flex flex-row">

                                    <label class="radio1"> <input type="radio" name="payment" value="bank">  <span><i class="fa fa-bank"></i>  BANK TRANSFER</span> </label>


                                <label class="radio1"> <input type="radio" name="payment" value="card"> <span><i class="fa fa-credit-card-alt"></i> CREDIT CARD</span> </label>
                                    
                                </div>

                            </div>


                            <div class="mt-3 mr-2">

                                <div class="row g-2">

                                    <div class="col-md-6">

                                        <div class="inputbox">
                                            
                                            <small>Card Number</small>

                                            <input type="text" class="form-control" name="">

                                        </div>
                                        
                                    </div>


                                    <div class="col-md-6">

                                        <div class="inputbox">
                                            
                                            <small>Card Name</small>

                                            <input type="text" class="form-control" name="">

                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>


                            <div class="mt-3 mr-2">

                                <div class="row g-2">

                                    <div class="col-md-6">

                                        <div class="row g-2">

                                            <div class="col-md-6">
                                                
                                                <div class="inputbox">
                                            
                                            <small>Date</small>

                                            <input type="text" class="form-control" name="">

                                        </div>
                                        

                                            </div>

                                            <div class="col-md-6">

                                                <div class="inputbox">
                                            
                                            <small>Month</small>

                                            <input type="text" class="form-control" name="">

                                        </div>
                                        
                                                
                                            </div>
                                            
                                        </div>

                                        
                                    </div>


                                    <div class="col-md-6">

                                        <div class="inputbox">
                                            
                                            <small>CVV</small>

                                            <input type="text" class="form-control" name="">

                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>

                            <hr class="mr-2 mt-4">


                            <div class="mt-3 mr-2 d-flex justify-content-end align-items-center">

                               <!--  <a href="#" class="cancel">Cancel</a> -->
                                <button class=" ml-2 btn btn-primary pay">PAY NOW</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
           
           </div>
         </div>
    </div>
  </div>
    </div>
@endsection