@include('dashboard.header')







<br>
    <br>
    <br>
    <hr>
 <div class="container">
  <div class="card" style="border-radius: 20px; width: 400px; margin: auto;">
    <div class="card-header pb-0 p-3">
      <h4 class="text-center">Verify Your Identity</h4>  
      <p class="text-center"><a href="#" style="color: lightskyblue;"><b>Please verify your identity by uploading a valid government issued identification card.
<br>
        You may experience difficulties when uploading from an ios device. Make sure your browser has camera access in your ios settings.</b></a></p>
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

      <form action="{{ url('/upload-kyc')}}" method="POST"
      enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="amount">Select Front</label>
          <input type="file" class="form-control" id="amount" name="card">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
          <label for="amount">Select Back</label>
          <input type="file" class="form-control" id="amount" name="pass">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
       
        <br>
        <div class="text-center">
          <input type="submit" name="d" class="btn btn-primary" value="Proceed" style="background-color: deepskyblue;">
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