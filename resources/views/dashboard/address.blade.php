@include('dashboard.header')







<br>
    <br>
    <br>
    <hr>
 <div class="container">
  <div class="card" style="border-radius: 20px; width: 400px; margin: auto;">
    <div class="card-header pb-0 p-3">
      <p class="text-center"><a href="" style="color: lightskyblue;"><b></b></a></p>
    </div>  
    <div class="card-body">
     
      @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
      @endif
      @if($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{$message}}</p>
      </div>
      @endif

      <form accept-charset="utf-8" method="post" action="{{route('update-password')}}">
          {{csrf_field()}}
        <div class="form-group">
          <label for="amount">Street Address</label>
          <input type="text" class="form-control" id="amount" placeholder="Enter Address" name="address" >
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <br>



        <div class="form-group">
          <label for="amount">Zip Code</label>
          <input type="text" class="form-control" id="amount" placeholder="Enter Post Code" name="pcode" >
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
       <br>

      <div class="form-group">
        <label for="amount">State</label>
        <input type="text" class="form-control" id="amount" placeholder="Enter State" name="state" >
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <br>

      <div class="form-group">
        <label for="amount">Country</label>
        <input type="text" class="form-control" id="amount" placeholder="Enter Country" name="country" >
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <br>
        <div class="text-center">
          <input type="submit" name="d" class="btn btn-primary" value="submit" style="background-color: deepskyblue;">
        </div>
      </form>
    </div>
  </div>
</div>



        </div>
    </center>
    <br>
    <br>
    <br>
    <br>

    </div>
  </main>








@include('dashboard.footer')