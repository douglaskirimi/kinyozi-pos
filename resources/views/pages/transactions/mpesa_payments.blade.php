@extends('layouts.app', ['title' => __('Services')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row my-5">
        <div class="col">
          <div class="card py-2 px-3">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Transactions</h3>
            </div>
            <div class="text-right">
              <a href="{{ route('make-transaction') }}" class="btn btn-md btn-dark">New  Transaction</a>
            </div>
            <br> <!-- Light table -->
            <div class="table-responsive">

              <table class="table align-items-center table-bordered">
                <thead class="bg-info text-dark">
                    <tr class="align-items-center">
                    <th scope="col" data-sort="id">Customer Number</th>
                    <th scope="col" data-sort="id">Amount Received</th>
                    <th scope="col" data-sort="id">Mpesa Receipt Number</th>
                    <th scope="col" data-sort="id">Status</th>
                    <th scope="col" data-sort="id">Transaction Date</th>                    <th scope="col" data-sort="action">Action</th>
                  </tr>
                </thead>
                @foreach($transactions as $transaction)
                <tbody class="list">
                 <td class="">{{ $transaction->PhoneNumber }}</td>
                 <td class="">{{ $transaction->Amount }}</td>
                 <td class="">{{ $transaction->MpesaReceiptNumber }}</td>
                 <td class="text-success">{{ $transaction->Status }}</td>
                 <td class="">{{ $transaction->created_at }}</td> 

                 <td class="text-right">
                 <div class="dropdown">
                 <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-ellipsis-v"></i>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="margin-right:-70px;margin-top:10px; background-color:transparent!important!">
               <!--   <a class="dropdown-item" href="/transactions/edit/{{ $transaction->id }}"><i class="fa fa-edit" style="color: blue;background-color:transparent!important;font-size: 14px;">  Edit</i></a> -->
                 <!-- <a class="dropdown-item" id="delete-confirm" href="/transactions/delete/{{ $transaction->id }}"><i class="fa fa-trash" style="color: red;font-size: 14px;">&nbsp;Remove</i></a> -->
                 <a class="dropdown-item" id="receipt_print" href="/generate/receipt/{{ $transaction->id }}"><i class="fa fa-print" style="color: limegreen;font-size: 14px;">&nbsp;Print Receipt</i></a>
                 <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                 </div>
                 </div>
                 </td>
               </tbody>
               @endforeach
             </table>
               @forelse ($transactions as $transaction)
               @empty
              <p class="text-center text-danger">No Transaction Records Found</p>
               @endforelse
           </div>
         </div>
         <script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
         </script>
    </div>
  </div>
    </div>
@endsection
