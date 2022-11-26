@extends('layouts.app', ['title' => __('Categories')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
        <div class="text-right mt-4">
              <a href="{{ route('show_categories') }}" class="btn btn-md btn-info">+ See all</a>
            </div>
            <div class="bg-transparent my-2 mt-4 mb-4">
              <h3 class="mb-0">Edit Category</h3>
          </div>

 <form action="/categories/update/{{$id}}" method="POST" autocomplete="on">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputCategoryname">Category Name <b class="text-danger">*</b></label>
      <input type="text" class="form-control" name="category_name" id="inputname" placeholder="Category Name..." value="{{ $data->category_name }}" required autofocus> @if ($errors->has('category_name'))
        <span class="invalid-feedback" role="alert">
         <strong>{{ $errors->first('category_name') }}</strong>
        </span>
        @endif
    </div>
  </div>

    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputCategoryThumbnail"><a href="{{ asset('Categories Thumbnails') }}/{{$data->category_thumbnail}}">Old Thumbnail <b class="text-danger">{{ $data->thumbnail }}</b></a></label>
    </div>
  </div>  

      <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputCategoryThumbnail">New Thumbnail <b class="text-danger"></b></label>
       <input type="file" name="category_thumbnail">
           @error('category_thumbnail')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

<!--    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputpassword">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Set password..." required autofocus>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Confirm password</label>
      <input type="password" class="form-control" name="confirm-password" id="inputPassword" placeholder="Confirm password..." required autofocus>
    </div>
  </div -->

  <div class="text-left">
     <button class="btn btn-info">Update</button>
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
        
        <!-- include('layouts.footers.auth') -->
    </div>
@endsection
