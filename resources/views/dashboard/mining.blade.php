@include('dashboard.header')

<title>
  Mining - NexgetFX
</title>

<body class="g-sidenav-show  bg-gray-100">


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  
  
  
  
    <style>
      .crypto-box {
        background: url('mining.jpg') no-repeat center center;
        background-size: cover;
        border-radius: 15px;
        padding: 30px;
        color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        height: 250px;
        font-family: Arial, sans-serif;
      }
      .crypto-box h3 {
        margin-bottom: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .crypto-box .nav-item {
        margin-right: 20px;
      }
      .crypto-box .amount {
        font-size: 1.5em;
        margin-bottom: 5px;
      }
      .crypto-box .progress {
        height: 10px;
      }
      .crypto-box .progress-bar {
        background-color: rgba(255, 255, 255, 0.8);
      }
      .crypto-box .signal-strength {
        font-size: 1em;
      }
      .custom-button {
        border-radius: 20px;
        border: 2px solid skyblue;
        color: skyblue;
        padding: 10px 20px;
        background: transparent;
        margin: 10px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
      }
      .custom-button:hover {
        background-color: skyblue;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="content-page">
      <div class="content">
    <div class="container mt-5">
      <div class="crypto-box">
        <div class="row">
          <div class="col-6 text-left">
            <div class="amount">${{$user_balance}}.00</div> <!-- Example of dynamic balance -->
            <b>BALANCE</b>
          </div>
          {{-- <div class="col-6 text-right">
            <div class="amount">${{$deposit}}</div> <!-- Example of dynamic deposit -->
            <b>DEPOSIT</b>
          </div> --}}
        </div>
        <div class="row mt-4">
          <div class="col-12">
            {{-- <div class="progress">
              <div class="progress-bar w-75" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div> <!-- Example of dynamic signal strength -->
            </div> --}}
            <div class="text-center mt-2 signal-strength">
              {{-- <b>Signal Strength</b> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-3">
        <a href="{{url('deposit')}}"><button class="custom-button">Buy Contract</button></a>
        <a href="{{url('mininghistory')}}"> <button class="custom-button"> My Contracts</button></a>
      </div>
    </div>
      <br>
  
     
  
        <div class="mother">                       
                
  <div class="rows">
  <!-- TradingView Widget BEGIN -->
  <div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Ticker Tape</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
    "symbols": [
      {
        "proName": "FOREXCOM:SPXUSD",
        "title": "S&P 500"
      },
      {
        "proName": "FOREXCOM:NSXUSD",
        "title": "Nasdaq 100"
      },
      {
        "proName": "FX_IDC:EURUSD",
        "title": "EUR/USD"
      },
      {
        "proName": "BITSTAMP:BTCUSD",
        "title": "BTC/USD"
      },
      {
        "proName": "BITSTAMP:ETHUSD",
        "title": "ETH/USD"
      }
    ],
    "showSymbolLogo": true,
    "colorTheme": "light",
    "isTransparent": false,
    "displayMode": "adaptive",
    "locale": "en"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- First TradingView Widget -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=FX" rel="noopener" target="_blank">
                        <span class="blue-text">BTCUSD Rates</span>
                    </a> by TradingView
                </div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                {
                    "symbol": "FX:BTCUSD",
                    "width": "100%",
                    "height": "100%",
                    "locale": "en",
                    "dateRange": "12M",
                    "colorTheme": "light",
                    "trendLineColor": "rgba(33, 150, 243, 1)",
                    "underLineColor": "rgba(33, 150, 243, 0.3)",
                    "underLineBottomColor": "rgba(33, 150, 243, 0.0)",
                    "isTransparent": false,
                    "autosize": true,
                    "largeChartUrl": ""
                }
                </script>
            </div>
            <!-- End of First TradingView Widget -->
        </div>

        <div class="col-md-4">
            <!-- Second TradingView Widget -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="https://www.tradingview.com/symbols/ETHUSD/?exchange=FX" rel="noopener" target="_blank">
                        <span class="blue-text">ETHUSD Rates</span>
                    </a> by TradingView
                </div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                {
                    "symbol": "FX:ETHUSD",
                    "width": "100%",
                    "height": "100%",
                    "locale": "en",
                    "dateRange": "12M",
                    "colorTheme": "light",
                    "trendLineColor": "rgba(33, 150, 243, 1)",
                    "underLineColor": "rgba(33, 150, 243, 0.3)",
                    "underLineBottomColor": "rgba(33, 150, 243, 0.0)",
                    "isTransparent": false,
                    "autosize": true,
                    "largeChartUrl": ""
                }
                </script>
            </div>
            <!-- End of Second TradingView Widget -->
        </div>

        <div class="col-md-4">
            <!-- Third TradingView Widget -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="https://www.tradingview.com/symbols/LTCUSD/?exchange=FX" rel="noopener" target="_blank">
                        <span class="blue-text">LTCUSD Rates</span>
                    </a> by TradingView
                </div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                {
                    "symbol": "FX:LTCUSD",
                    "width": "100%",
                    "height": "100%",
                    "locale": "en",
                    "dateRange": "12M",
                    "colorTheme": "light",
                    "trendLineColor": "rgba(33, 150, 243, 1)",
                    "underLineColor": "rgba(33, 150, 243, 0.3)",
                    "underLineBottomColor": "rgba(33, 150, 243, 0.0)",
                    "isTransparent": false,
                    "autosize": true,
                    "largeChartUrl": ""
                }
                </script>
            </div>
            <!-- End of Third TradingView Widget -->
        </div>
    </div>
</div>

<style>
  .crypto-container {
    display: flex;
    flex-direction: column;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%; /* Set default width to 100% */
    margin: 0 auto; /* Center align on smaller screens */
  }

  .crypto-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    width: 100%;
  }

  .crypto-info {
    display: flex;
    align-items: center;
    flex-grow: 1;
  }

  .crypto-logo {
    width: 40px;
    height: 40px;
    margin-right: 15px;
  }

  .crypto-details {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .crypto-name {
    font-size: 20px;
    font-weight: bold;
    color: #333;
  }

  .crypto-price,
  .crypto-change {
    font-size: 18px;
    color: #333;
  }

  .crypto-change.negative {
    color: red;
  }

  .crypto-change.positive {
    color: green;
  }

  .amount-of-zero {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-left: auto;
  }

  @media screen and (min-width: 1024px) {
    .crypto-container {
      width: 100vw; /* Set width to 100% of viewport width for laptop screens */
      max-width: none; /* Remove max-width */
      padding: 40px; /* Adjust padding if needed */
    }
  }
</style>

<div class="crypto-container" id="cryptoContainer">
  <!-- Bitcoin -->
  <div class="crypto-item" id="bitcoin">
    <div class="crypto-info">
      <img class="crypto-logo" src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="Bitcoin">
      <div class="crypto-details">
        <div class="crypto-name">BTC</div>
        <div class="crypto-price" id="bitcoin-price">0.000000 BTC</div>
        <div class="crypto-change" id="bitcoin-change">$0.00</div>
      </div>
    </div>
    <div class="amount-of-zero">GH/s</div>
  </div>
  <!-- Ethereum -->
  <div class="crypto-item" id="ethereum">
    <div class="crypto-info">
      <img class="crypto-logo" src="https://cryptologos.cc/logos/ethereum-eth-logo.png" alt="Ethereum">
      <div class="crypto-details">
        <div class="crypto-name">ETH</div>
        <div class="crypto-price" id="ethereum-price">0.000000 ETH</div>
        <div class="crypto-change" id="ethereum-change">$0.00</div>
      </div>
    </div>
    <div class="amount-of-zero">GH/s</div>
  </div>
 
  <!-- BNB -->
  <div class="crypto-item" id="binancecoin">
    <div class="crypto-info">
      <img class="crypto-logo" src="https://cryptologos.cc/logos/binance-coin-bnb-logo.png" alt="BNB">
      <div class="crypto-details">
        <div class="crypto-name">BNB</div>
        <div class="crypto-price" id="binancecoin-price">0.000000 BNB</div>
        <div class="crypto-change" id="binancecoin-change">$0.00</div>
      </div>
    </div>
    <div class="amount-of-zero">0GH/s</div>
  </div>



 <!-- Dogde -->
<div class="crypto-item" id="dogde">
  <div class="crypto-info">
    <img class="crypto-logo" src="pair-icon-dogeusd.img.svg" alt="Dogde">
    <div class="crypto-details">
      <div class="crypto-name">DOGE</div>
      <div class="crypto-price" id="dogde-price">0.000000 DOGE</div>
      <div class="crypto-change" id="dogde-change">$0.00</div>
    </div>
  </div>
  <div class="amount-of-zero">GH/s</div>
</div>




  <!-- Atom -->
<div class="crypto-item" id="atom">
  <div class="crypto-info">
    <img class="crypto-logo" src="pair-icon-atomusd.img.svg" alt="Atom">
    <div class="crypto-details">
      <div class="crypto-name">Atom</div>
      <div class="crypto-price" id="atom-price">0000.00 ATOM</div>
      <div class="crypto-change" id="atom-change">$0.00</div>
    </div>
  </div>
  <div class="amount-of-zero">GH/s</div>
</div>
</div>
</div>




  @include('dashboard.navbar')
  
@include('dashboard.footer')