@include('dashboard.header')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="card card-custom mt-5">
                    <div class="card-header pb-0 p-3">
                        <b class="text-xs mb-0" style="color:black"> <h4 class="text-center">Withdraw to Cashapp</h4> </b>
                        <!-- Uncomment the line below to include a link to the pricing page -->
                        <!-- <p class="text-center"><a href="{{url('pricing')}}" style="color: lightskyblue;"><b>VIEW PRICING</b></a></p> -->
                    </div>
                    <div class="card-body">
                        <!-- Display success message -->
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Display success message -->
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <!-- Display error message -->
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Form to make a withdrawal -->
                        <form accept-charset="utf-8" method="post" action="{{url('make-paypal-withdrawal')}}">
                            {{ csrf_field() }}

                            <!-- From selection -->
                            <div class="form-group">
                                <label for="trading_name">From</label>
                                <select class="form-select" id="trading_name" aria-label="Default select example" name="trading_name" onchange="updateAmountLabel()">
                                    <option value="Trading">Trading</option>
                                    <option value="Bitcoin Mining">Bitcoin Mining</option>
                                    <option value="Ethereum Mining">Ethereum Mining</option>
                                    <option value="Cosmos Mining">Cosmos Mining</option>
                                    <option value="Dogecoin Mining">Dogecoin Mining</option>
                                    <option value="Binance Coin Mining">Binance Coin Mining</option>
                                </select>
                            </div>
                            <br>

                            <!-- Withdrawal Code input -->
                            <div class="form-group">
                                <label for="withdrawalcode">Withdrawal Code</label>
                                <input type="number" class="form-control" id="withdrawalcode" placeholder="Withdrawal Code" name="withdrawalcode" required>
                            </div>
                            <br>

                            <!-- Cash Tag input -->
                            <div class="form-group">
                                <label for="cashtag">Cash Tag</label>
                                <input type="text" class="form-control" id="cashtag" placeholder="Enter Cash Tag" name="cashtag" required>
                            </div>
                            <br>

                            <!-- Amount input -->
                            <div class="form-group">
                                <label for="amount" id="amount-label">Amount (USD)</label>
                                <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" required>
                            </div>
                            <br>

                            <!-- Submit button -->
                            <div class="text-center">
                                <input type="submit" name="d" class="btn btn-custom btn-lg" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

 <style>
        .card-custom {
            border-radius: 20px;
            margin: auto;
        }
        .btn-custom {
            background-color: deepskyblue;
            color: white;
        }
    </style>




@include('dashboard.footer')