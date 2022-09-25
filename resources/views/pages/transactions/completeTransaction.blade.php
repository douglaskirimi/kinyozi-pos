@extends('layouts.app', ['title' => __('Transaction')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40 text-center">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
            <div class="card-header">
              <h1 class="text-success">MPESA TRANSACTIONS</h1>
              <div class="text-success" role="alert">
                <h3>Mpesa Payment of {{ $data->service_fees }} to the Glitters barbershop has been <span class="text-success">initiated successfully!</span></h3>
                <span class="text-warning">{{ $data->customer_name }} enter their Mpesa Pin to complete transaction.</span>
               </div>

            <div class="my-5 text-center">
             <div class="card col-md-12">Transaction Status: <span class="text-muted">Waiting...</span></div> 
           </div>
           <form action="/api/responses" class="text-center">
             <button class="btn btn-success col-md-12">Complete Transaction</button> 
           </div>
         </div>
    </div>
  </div>
 </div>
</div>

@endsection
