@include('dashboard.header')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






<div class="container my-5">
  <div class="card mx-auto" style="border-radius: 20px; max-width: 400px;">
    <div class="card-header text-center pb-0 p-3">
    <b class="text-xs mb-0" style="color:black"> <h4>Withdraw to Crypto</h4></b>
    
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

      <form accept-charset="utf-8" method="post" action="{{ url('make-crypto-withdrawal') }}">
        {{ csrf_field() }}
        <br>
        
        <div class="form-group mb-3">
          <label for="mode">From</label>
          <select class="form-select" id="mode" name="mode" aria-label="Default select example" onchange="updateAmountLabel()">
            <option value="Trading">Trading</option>
            <option value="Bitcoin Mining">Bitcoin Mining</option>
            <option value="Ethereum Mining">Ethereum Mining</option>
            <option value="Cosmos Mining">Cosmos Mining</option>
            <option value="Dogecoin Mining">Dogecoin Mining</option>
            <option value="Binance Coin Mining">Binance Coin Mining</option>
          </select>
        </div>
        
        <div class="form-group mb-3">
          <label for="trading_name">From</label>
          <select class="form-select" id="trading_name" name="trading_name" aria-label="Default select example" onchange="updateAmountLabel()">
            <option value="Bitcoin">Bitcoin BTC</option>
            <option value="Tether">Tether USDT</option>
            <option value="Ethereum">Ethereum ETH</option>
          </select>
        </div>

        <div class="form-group mb-3">
          <label for="wallet_address">Wallet Address</label>
          <input type="text" class="form-control" id="wallet_address" name="wallet_address" placeholder="Wallet Address" required>
        </div>

        <div class="form-group mb-3">
          <label for="amount" id="amount-label">Amount (USD)</label>
          <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" required>
        </div>

        <div class="text-center">
          <input type="submit" name="d" class="btn btn-lg" value="Submit" style="background-color: deepskyblue;">
        </div>
      </form>
    </div>
  </div>
</div>
    
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