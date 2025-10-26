@include('dashboard.header')







<br>
    <br>
    <br>
    <hr>
 <div class="container">
  <div class="card" style="border-radius: 20px; width: 400px; margin: auto;">
    <div class="card-header pb-0 p-3">
      <p class="text-center"><a href="" style="color: lightskyblue;"><b>{{ Auth::user()->email }}</b></a></p>
    </div>  
    <div class="card-body">
     
      @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger" role="alert">
          {{ session('error') }}
      </div>
      @endif
      @if($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{$message}}</p>
      </div>
      @endif

      <form accept-charset="utf-8" method="post" action="{{url('update-email')}}">
          {{csrf_field()}}
        <div class="form-group">
          <label for="amount">Current Mail</label>
          <input type="text" class="form-control" id="amount" value="{{ Auth::user()->email }}" name="current_email" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <br>


        <div class="form-group">
          <label for="amount">New Mail</label>
          <input type="text" class="form-control" id="amount" placeholder="Enter New Mail" name="new_email" required>
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