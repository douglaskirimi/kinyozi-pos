@extends('layouts.app', ['title' => __('Transaction')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40 text-center">
      <div class="row">
        <div class="col">
          <form action="{{ route('mpesaRes') }}" method="post">
          <div class="card mt-4 my-4 col-md-10 ms-auto bg-transparent">
            <div class="card-header bg-transparent">
              <h1 class="text-success">MPESA TRANSACTIONS</h1>
           </div>
              <div class="text-success" role="alert">
                <h3>Mpesa Payment of to the Glitters barbershop has been <span class="text-success">initiated successfully!</span></h3>
                <span class="text-warning">The customer to enter their Mpesa Pin to complete transaction.</span>
              </div>

           <div class="my-5 text-center">
             <div class="col-md-12">Transaction Status: <span class="text-muted">Waiting...</span>
             </div> 
           </div>
         <div class="my-4">           
             <button class="btn btn-success col-md-8">Complete Transaction</button> 
         </div>
         </div>
       </form>
    </div>
  </div>
 </div>
@endsection
