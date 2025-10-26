@include('dashboard.header')







 <style>
    .card-custom {
      border-radius: 20px;
    }
    .btn-custom {
      background-color: deepskyblue;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card card-custom">
          <div class="card-header pb-0 p-3">
          <b class="text-xs mb-0" style="color:black"> <h4 class="text-center">Withdraw to Bank</h4> </b> 
            <!-- <p class="text-center"><a href="{{url('pricing')}}" style="color: lightskyblue;"><b>VIEW PRICING</b></a></p> -->
          </div>  
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
        
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
        
            @if (session('error'))
              <div class="alert alert-danger" role="alert">
                {{ session('error') }}
              </div>
            @endif
        
            <p>For bank withdrawals, we may contact you for additional information.</p>
            <form accept-charset="utf-8" method="post" action="{{url('make-withdrawal')}}">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="trading_name">From</label>
                <select class="form-select" id="trading_name" aria-label="Default select example" name="mode" onchange="updateAmountLabel()">
                  <option value="Trading">Trading</option>
                  <option value="Bitcoin Mining">Bitcoin Mining</option>
                  <option value="Ethereum Mining">Ethereum Mining</option>
                  <option value="Cosmos Mining">Cosmos Mining</option>
                  <option value="Dogecoin Mining">Dogecoin Mining</option>
                  <option value="Binance Coin Mining">Binance Coin Mining</option>
                </select>
              </div>
              <div class="form-group">
                <label for="withdrawalcode">Withdrawal Code</label>
                <input type="number" class="form-control" id="withdrawalcode" placeholder="Withdrawal Code" name="withdrawal_code" required>
              </div>
              <div class="form-group">
                <label for="bname">Bank Name</label>
                <input type="text" class="form-control" id="bname" placeholder="Bank Name" name="bank_name" required>
              </div>
              
                <div class="form-group">
                <label for="aname">Account Name</label>
                <input type="text" class="form-control" id="aname" placeholder="Account Name" name="account_name" required>
              </div>
              <div class="form-group">
                <label for="aname">Account Number</label>
                <input type="text" class="form-control" id="aname" placeholder="Account Number" name="account_number" required>
              </div>
              <div class="form-group">
                <label for="amount" id="amount-label">Amount (USD)</label>
                <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" required>
              </div>
              
              @if (Auth::check() && Auth::user()->country === 'United States')
        <div class="form-group">
            <label for="ssn">
                <i class="fa fa-user-secret"></i> SSN:
            </label>
            <input type="text" id="ssn" name="ssn" class="form-control" placeholder="Enter SSN">
        </div>
        @endif
              <br>
              <div class="text-center">
                <input type="submit" name="d" class="btn btn-lg btn-custom" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <br>
    <br>
    <br>
    <br>

    </div>
  </main>







    <script>
        function updateAmountLabel() {
            const tradingName = document.getElementById('trading_name').value;
            const amountLabel = document.getElementById('amount-label');
            
            switch(tradingName) {
                case 'Bitcoin Mining':
                    amountLabel.innerText = 'Amount (BTC)';
                    break;
                case 'Ethereum Mining':
                    amountLabel.innerText = 'Amount (ETH)';
                    break;
                case 'Cosmos Mining':
                    amountLabel.innerText = 'Amount (ATOM)';
                    break;
                case 'Dogecoin Mining':
                    amountLabel.innerText = 'Amount (DOGE)';
                    break;
                case 'Binance Coin Mining':
                    amountLabel.innerText = 'Amount (BNB)';
                    break;
                default:
                    amountLabel.innerText = 'Amount (USD)';
            }
        }
    </script>
    
@include('dashboard.footer')