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
    .payment-info {
      font-size: 36px; /* Increased font size */
      font-weight: bold; /* Bold font weight */
      margin-bottom: 10px; /* Adjusted margin */
      text-align: center;
    }
    .select-payment {
      font-size: 18px; /* Decreased font size */
      color: #666; /* Adjusted color */
      margin-bottom: 20px; /* Adjusted margin */
      text-align: center;
    }
    .payment-option {
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      text-align: center;
      background-color: #fff;
      transition: transform 0.3s ease, background-color 0.3s ease;
      margin-bottom: 10px;
      cursor: pointer;
      width: 80%;
      max-width: 400px;
    }
    .payment-option:hover {
      transform: scale(1.05);
      background-color: #e0f7fa;
    }
    .payment-option .title {
      font-family: 'Arial', sans-serif; /* Changed font family */
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 5px; /* Adjusted margin */
    }
    .payment-option .description {
      font-size: 14px; /* Decreased font size */
      color: #777; /* Adjusted color */
    }
    .payment-option .icon {
      font-size: 24px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="payment-info">
      PAY ${{ $data['amount'] }}<!-- Adjusted font size and weight -->
    </div>
    <div class="select-payment">
      SELECT PAYMENT METHOD <!-- Adjusted font size -->
    </div>
    <a href="{{url('get-ipayment')}}">
    <div class="row w-100 justify-content-center">
      <div class="col-12 mb-3 d-flex justify-content-center">
        <div class="payment-option" role="button" aria-label="Send Crypto" tabindex="0">
          <div class="icon">
            <i class="bi bi-currency-bitcoin"></i> <!-- Bootstrap Bitcoin Icon -->
          </div>
          <div class="title">Send Crypto</div>
          <div class="description">Send supported cryptocurrencies</div>
        </div>
      </div>
    </a>
      <div class="col-12 d-flex justify-content-center">
        <div class="payment-option" role="button" aria-label="Wallet Connect" tabindex="0">
          <div class="icon">
            <i class="bi bi-wallet2"></i> <!-- Bootstrap Wallet Icon -->
          </div>
          <div class="title">Wallet Connect</div>
          <div class="description">
            Pay with Ether or supported ERC20 tokens
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

@include('dashboard.footer')
