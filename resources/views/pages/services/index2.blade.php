@extends('layouts.app', ['title' => __('Services')])

@section('content')
 @include('layouts.headers.basic')
<div class="container-fluid mt--40">
  <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Our Services</h3>
            </div>

      </div>
            <div class="text-right mb-5">
              <a href="{{ route('add_service') }}" class="btn btn-md btn-info">+ Add Service</a>
            </div>
    </div>
      <div class="row d-flex justify-content-space-around my-3 mx-3">
        @foreach($services as $service)
        <div class="service-card my-2 mx-2 pb-3" style="width: 12rem;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
            <div class="hover_color_bubble"></div>
            <div style="height:200px; width:18rem;overflow:hidden;">
                <img class="card-img-top" src="" alt="Card image cap">
            </div>
            <div class="card-body text-white">
                <h3 class="card-title">{{ $service->service_name }}</</h3>
                <p>Category: <b>{{ $service->service_category }}</b></p>
                <p>Service Fee: <b>{{ $service->service_charges }}</b></</p>
            </div>

           <div class="btn-group d-flex justify-content-center mt-0">
            <!-- <button type="button" class="btn btn-success"></button> -->
             <button type="button" class="btn btn-danger"><a href="/services/delete/{{ $service->id }}"><i class="fa fa-trash" style="color: floralwhite;font-size: 14px;"></i></a></button>
              <button type="button" class="btn btn-info"><a href="/services/edit/{{ $service->id }}"><i class="fa fa-edit" style="color: floralwhite;background-color:transparent!important;font-size: 14px;"></i></a></button>
         </div>
        </div>
        @endforeach
    </div>
</div>
@include('layouts.footers.auth')
@endsection