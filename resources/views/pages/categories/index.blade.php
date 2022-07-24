@extends('layouts.app', ['title' => __('Categories')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row my-5">
        <div class="col">
          <div class="card py-2 px-3">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Categories</h3>
            </div>
            <div class="text-right">
              <a href="{{ route('category.add') }}" class="btn btn-md btn-primary">Add a Category</a>
            </div>
            <br> <!-- Light table -->
            <div class="table-responsive">

              <table class="table align-items-center table-bordered">
                <thead class="bg-primary text-light">
                    <tr class="align-items-center">
                    <th scope="col" data-sort="id">#</th>
                    <th scope="col" data-sort="id">Category Name</th>
                    <th scope="col" data-sort="join_date">Category Added On</th>
                    <th scope="col" data-sort="action">Action</th>
                  </tr>
                </thead>
                @foreach($categories as $category)
                <tbody class="list">
                 <td class="">{{ $category->id }}</td>
                 <td class="">{{ $category->category_name }}</td>
                 <td class="">{{ $category->created_at }}</td>       

                 <td class="text-right">
                 <div class="dropdown">
                 <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-ellipsis-v"></i>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="margin-right:-70px;margin-top:10px; background-color:transparent!important!">
                 <a class="dropdown-item" href="/categories/edit/{{ $category->id }}"><i class="fa fa-edit" style="color: blue;background-color:transparent!important;font-size: 14px;">  Edit</i></a>
                 <a class="dropdown-item" href="/categories/delete/{{ $category->id }}"><i class="fa fa-trash" style="color: red;font-size: 14px;">&nbsp;Remove</i></a>
                 <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                 </div>
                 </div>
                 </td>
               </tbody>
               @endforeach
             </table>
               @forelse ($categories as $category)
               @empty
              <p class="text-center text-danger">No categories found</p>
               @endforelse
           </div>
         </div>
    </div>
  </div>
    </div>

        @include('layouts.footers.auth')
@endsection
