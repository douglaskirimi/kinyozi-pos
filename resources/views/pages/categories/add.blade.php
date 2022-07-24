@extends('layouts.app', ['title' => __('Customers')])

@section('content')
 @include('layouts.headers.basic')

    <div class="container-fluid mt--40">
      <div class="row">
        <div class="col">
          <div class="card" style="background-color: transparent;padding: 8px 10px;">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">New Category</h3>
            </div>
            <div class="text-right">
              <a href="{{ route('show_employees') }}" class="btn btn-md btn-primary">+ See all</a>
            </div>
 <form action="{{ route('category.create') }}" method="POST" autocomplete="on">
    @csrf
    <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputCategoryname">Category Name <b class="text-danger">*</b></label>
      <input type="text" class="form-control" name="category_name" id="inputname" placeholder="Category Name...">
           @error('category_name')
         <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

      <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputCategoryThumbnail">Thumbnail <b class="text-danger"></b></label>
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
     <button class="btn btn-primary">ADD</button>
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
        
        <!-- @include('layouts.footers.auth') -->
    </div>
@endsection
