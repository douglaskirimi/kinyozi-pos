@extends('layouts.app', ['title' => __('Services')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row my-5">
        <div class="col">
          <div class="card py-2 px-3">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Services</h3>
            </div>
            <div class="text-right">
              <a href="{{ route('add_service') }}" class="btn btn-md btn-primary">+ Add Service</a>
            </div>
            <br> <!-- Light table -->
            <div class="table-responsive">

              <table class="table align-items-center table-bordered">
                <thead class="bg-primary text-light">
                    <tr class="align-items-center">
                    <th scope="col" data-sort="id">#</th>
                    <th scope="col" data-sort="id">SERVICE NAME</th>
                    <th scope="col" data-sort="id">SERVICE CATEGORY</th>
                    <th scope="col" data-sort="id">SERVICE CHARGES</th>
                    <th scope="col" data-sort="action">Action</th>
                  </tr>
                </thead>
                @foreach($services as $service)
                <tbody class="list">
                 <td class="">{{ $service->id }}</td>
                 <td class="">{{ $service->service_name }}</td>
                 <td class="">{{ $service->service_category }}</td>
                 <td class="">{{ $service->service_charges }}</td> 

                 <td class="text-right">
                 <div class="dropdown">
                 <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-ellipsis-v"></i>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="margin-right:-70px;margin-top:10px; background-color:transparent!important!">
                 <a class="dropdown-item" href="/services/edit/{{ $service->id }}"><i class="fa fa-edit" style="color: blue;background-color:transparent!important;">  Edit</i></a>
                 <a class="dropdown-item" href="/services/delete/{{ $service->id }}"><i class="fa fa-trash" style="color: red;">&nbsp;Remove</i></a>
                 <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                 </div>
                 </div>
                 </td>
               </tbody>
               @endforeach
             </table>
               @forelse ($services as $service)
               @empty
              <p class="text-center text-danger">No Records Found</p>
               @endforelse
           </div>
         </div>
    </div>
  </div>
    </div>

        @include('layouts.footers.auth')
@endsection
