@extends('layouts.app', ['title' => __('Customers')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row my-5">
        <div class="col">
          <div class="card py-2 px-3">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Customers</h3>
            </div>
            <div class="text-right">
              <a href="{{ route('customers_add_form') }}" class="btn btn-md btn-primary">+ Add Customer</a>
            </div>
            <br> <!-- Light table -->
            <div class="table-responsive">

              <table class="table align-items-center table-bordered">
                <thead class="bg-primary text-light">
                    <tr class="align-items-center">
                    <th scope="col" data-sort="id">#</th>
                    <th scope="col" data-sort="id">Customer Name</th>
                    <th scope="col" data-sort="email">Email</th>
                    <th scope="col" data-sort="phone">Gender</th>
                    <th scope="col" data-sort="join_date">Phone</th>
                    <!-- <th scope="col" data-sort="join_date">Specialization</th> -->
                    <th scope="col" data-sort="action">Action</th>
                  </tr>
                </thead>
                @foreach($customers as $customer)
                <tbody class="list">
                 <td class="">{{ $customer->id }}</td>
                 <td class="">{{ $customer->name }}</td>
                 <td class="">{{ $customer->email }}</td>
                 <td class="">{{ $customer->gender }}</td>
                 <td class="">{{ $customer->phone }}</td>  

                 <td class="text-right">
                 <div class="dropdown">
                 <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-ellipsis-v"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="margin-right:-70px;margin-top:10px; background-color:transparent!important!">
                 <a class="dropdown-item" href="/customers/edit/{{ $customer->id  }}"><i class="fa fa-edit" style="color: blue;background-color:transparent!important;font-size: 14px;">  Edit</i></a>
                 <a class="dropdown-item" href="/customers/delete/{{ $customer->id }}"><i class="fa fa-trash" style="color: red;font-size: 14px;">&nbsp;Remove</i></a>
                 <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                 </div>
                 </div>
                 </td>
               </tbody>
               @endforeach
             </table>
               @forelse ($customers as $customers)
               @empty
              <p class="text-center text-danger">No customer record found</p>
               @endforelse
           </div>
         </div>
    </div>
  </div>
    </div>

@endsection
