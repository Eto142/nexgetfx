@include('dashboard.header')



 <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <b class="text-xs mb-0" style="color:black"> <h4 class="text-center">Withdraw to Paypal</h4></b>
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

                        <form accept-charset="utf-8" method="post" action="{{ url('make-paypal-withdrawal') }}">
                            {{ csrf_field() }}
                            <br>
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
                            <br>

                            <div class="form-group">
                                <label for="withdrawalcode">Withdrawal Code</label>
                                <input type="number" class="form-control" id="withdrawalcode" placeholder="Withdrawal Code" name="withdrawal_code" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="paypal_email">Paypal Email</label>
                                <input type="email" class="form-control" id="paypal_email" placeholder="Enter Email" name="paypal_email" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="amount" id="amount-label">Amount (USD)</label>
                                <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" required>
                            </div>
                            <br>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-lg" value="Submit" style="background-color: deepskyblue;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    </div>
  </div>
</div>



        </div>
    <br>
 

    </div>
  </main>

 <style>
        .card {
            border-radius: 20px;
            margin: auto;
        }
        @media (min-width: 576px) {
            .card {
                width: 80%;
            }
        }
        @media (min-width: 768px) {
            .card {
                width: 60%;
            }
        }
        @media (min-width: 992px) {
            .card {
                width: 50%;
            }
        }
        @media (min-width: 1200px) {
            .card {
                width: 40%;
            }
        }
    </style>

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