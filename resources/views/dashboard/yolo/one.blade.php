@include('dashboard.header')







<br>
    <br>
    <br>
    <hr>
 <div class="container">
  <div class="card" style="border-radius: 20px; width: 400px; margin: auto;">
    <div class="card-header pb-0 p-3">
      <h4 class="text-center">FUND ACCOUNT</h4>  
      <p class="text-center"><a href="{{url('pricing')}}" style="color: lightskyblue;"><b>VIEW PRICING</b></a></p>
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

      <form accept-charset="utf-8" method="post" action="{{url('get-deposit')}}">
          {{csrf_field()}}
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="number" class="form-control" id="amount" placeholder="USD" name="amount" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
          <label for="trading_name">To</label>
          <select class="form-select" id="trading_name" aria-label="Default select example" name="trading_name">
            <option selected value="Trading">Trading</option>
            <option value="Bitcoin Mining">Bitcoin Mining</option>
            <option value="Ethereum Mining">Ethereum Mining</option>
            <option value="Dogecoin Mining">Dogecoin Mining</option>
            <option value="Binance Coin Mining">Binance Coin Mining</option>
          </select>
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