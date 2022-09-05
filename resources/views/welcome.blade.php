<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MPESA DARAJA APIS</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/bootstrap.css') }}">
</head>
<body>
  <div class="">
    <div class="card-header">
      <h3 class="mt-4 mx-auto text-success">MPESA ONLINE PAYMENTS</h3>
  </div>
  <div class="card-body">
    <div class="card-header">Request Access Token</div>
    <form action="{{ route('get-token') }}" method="post">
        @csrf
   <div class="form-group col-md-6">
       <button type="submit" name="" class="btn btn-primary form-control" id="getAccessToken">Request Access Token</button>
   </div>
    <div class="col-md-8">
       <p>Access Token: <span class="text-primary" id="access_token"></span></p>
   </div>
  </form>
 </div>


  <div class="card-body">
    <h4>Simulate Transaction</h4>
    <form action="" method="post">
        @csrf
    <div class="form-group col-md-6">
      <label for="inputCategoryname">Amount</label>
      <input type="text" class="form-control" name="">
    </div>

       <div class="form-group col-md-6">
      <label for="inputCategoryname">Phone Number</label>
      <input type="text" class="form-control" name="">
    </div>

   <div class="form-group col-md-6">
       <input type="button" name="" class="btn btn-success form-control" value="Simulate">
   </div>
  </form>
 </div>




  <div class="card-body">
    <h4>Generate Access Token</h4>
    <form action="" method="post">
        @csrf
    <div class="form-group col-md-6">
      <label for="inputCategoryname">Access Token</label>
      <input type="text" class="form-control" name="">
    </div>

   <div class="form-group col-md-6">
       <input type="button" name="" class="btn btn-success form-control" value="Generate">
   </div>
  </form>
 </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script type="text/javascript">
    document.getElementById('getAccessToken').addEventListener('click',(event) =>{
        event.preventDefault()

        axios.post('get-token', {})
        .then((response) => {
            console.log(response.data); 
            document.getElementById('access_token').innerHTML = response.data.access_token
        })
        .catch((error) => {
            console.log(error);
        })
    })
</script>


</body>
</html>