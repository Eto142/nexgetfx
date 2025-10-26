@include('dashboard.header')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .payment-box {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 500px;
      width: 100%;
      text-align: center;
    }
    .payment-info {
      font-size: 36px; /* Increased font size */
      font-weight: bold; /* Bold font weight */
      margin-bottom: 10px; /* Adjusted margin */
    }
    .select-payment {
      font-size: 18px; /* Decreased font size */
      color: #666; /* Adjusted color */
      margin-bottom: 20px; /* Adjusted margin */
    }
    .form-group {
      margin-bottom: 20px;
    }
    .btn-proceed {
      background-color: deepskyblue;
      border: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="payment-box">
      <div class="payment-info">
        PAY {{ $data['amount'] }} <!-- Adjusted font size and weight -->
      </div>
      <div class="select-payment">
        SELECT PAYMENT METHOD <!-- Adjusted font size -->
      </div>
      <form accept-charset="utf-8" method="post" action="{{url('make-deposit')}}">
        {{csrf_field()}}
        <input type="hidden" class="form-control" name="amount" value="{{ $data['amount'] }}"/>
        <input type="hidden" class="form-control" name="trading_name" value="{{ $data['trading_name'] }}"/>
        <div class="form-group">
          <label for="item">Payment Method</label>
          <select class="form-select" id="item" aria-label="Default select example" name="item">
            <option selected value="Bitcoin">Btc Bitcoin Wallet</option>
            <option value="Usdt">USDT USDT</option>
            <option value="Ethereum">ETH Ethereum</option>    
          </select>
        </div>
        <div class="text-center">
          <input type="submit" name="d" class="btn btn-primary btn-proceed" value="Proceed">
        </div>
      </form>
    </div>
  </div>

@include('dashboard.footer')

</body>
</html>
