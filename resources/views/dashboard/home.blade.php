@include('dashboard.header')

                       
               
    
     <div class="content-page">
      <div class="content">
        <div class="container mt-5">
            <h4 class="page-title">Trading</h4>
            <marquee class="marquee" behavior="scroll" direction="left" scrollamount="5">
 Notification: {{Auth::user()->update_notification}}
  </marquee>
            <div class="crypto-box">
    <div class="row align-items-center text-center">
        <div class="col-4 text-left">
            <div class="amount">${{$user_balance}}.00</div>
            <b>BALANCE</b>
        </div>

        <div class="col-4">
            <div class="amount">${{$profit}}.00</div>
            <b>PROFIT</b>
        </div>

        <div class="col-4 text-right">
            <div class="amount">${{$deposit}}.00</div>
            <b>DEPOSIT</b>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="progress">
                <div class="progress-bar" role="progressbar" 
                     style="width: {{Auth::user()->signal_strength}}%;" 
                     aria-valuenow="{{Auth::user()->signal_strength}}" 
                     aria-valuemin="0" 
                     aria-valuemax="100"></div>
            </div>
            <div class="text-center mt-2 signal-strength">
                <b>Signal Strength: {{Auth::user()->signal_strength}}%</b>
            </div>
        </div>
    </div>
</div>

            <div class="text-center mt-3">
                <a href="{{url('deposit')}}"><button class="custom-button">Add Funds</button></a>
                <a href="{{url('traders')}}"> <button class="custom-button">Trading Bot</button></a>
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

  
  
                         
<div class="mb-5 row">
    <div class="col text-center card p-4" style="font-family: Helvetica, Arial, sans-serif;">
        <nav>
            <!-- Navigation tabs -->
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <!-- Tab for Open Trades -->
                <a class="pt-3 nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true" style="font-size: 14px;">Open Trades</a>
                <!-- Tab for Closed Trades -->
                <a class="pt-3 nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="nav-profile" aria-selected="false" style="font-size: 14px;">Closed Trades</a>
            </div>
        </nav>
        <!-- Tab content -->
        <div class="tab-content" id="nav-tabContent">
            <!-- Open Trades tab pane -->
            <div class="tab-pane fade show active" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
    <?php if (!empty($profithistory)): ?>
        <?php foreach ($profithistory as $history): ?>
            <div class="col-12 mb-3">
                <div class="card shadow-sm" style="border-radius: 20px; background-color: #f9f9f9; border: none;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-primary text-white mr-3">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0"><b>{{ \Carbon\Carbon::parse($history->created_at)->format('M d, Y') }}</b></h5>
                                  
                                </div>
                            </div>
                            <div class="text-right">
                                <h5 class="mb-0"><b>${{ number_format($history->amount, 2) }}</b></h5>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No profit history available.</p>
</div>

                    <div class="mt-3 pl-3">
                        <h4 class="text-muted" style="font-size: 12px;">NO OPEN TRADES</h4>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Closed Trades tab pane -->
            <div class="tab-pane fade" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php if (!empty($withdrawalhistory)): ?>
                    <?php foreach ($withdrawalhistory as $withdrawalhistory): ?>
                        <div class="col-12 mb-2">
                            <div class="card" style="border-radius: 20px; background-color: white; border: 1px solid #ddd; padding: 10px; color:black">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <span style="font-size: 24px; margin-right: 20px;"><b>{{ \Carbon\Carbon::parse($withdrawalhistory->created_at)->format('M d') }}</b></span>
                                            <div>
                                                <span><b>${{$withdrawalhistory->amount}}</b></span><br>
                                                <span><b>{{$withdrawalhistory->mode}}</b></span><br>
                                                @if($withdrawalhistory->status == '0')
                                                <span class="badge badge-warning mt-1">Pending</span>
                                                @else
                                                <span class="badge badge-success mt-1">Approved</span>
                                                @endif
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="mt-3 pl-3">
                        <h4 class="text-muted" style="font-size: 12px;">NO CLOSED TRADES</h4>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
                            <!-- Bitcoin Address Section -->
                            
                        </div>
                        
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var openTradesTab = document.getElementById("nav-home-tab");
                                var closedTradesTab = document.getElementById("nav-profile-tab");
                                var openTradesContent = document.getElementById("1");
                                var closedTradesContent = document.getElementById("2");
                        
                                openTradesTab.addEventListener("click", function() {
                                    openTradesContent.classList.add("show", "active");
                                    closedTradesContent.classList.remove("show", "active");
                                });
                        
                                closedTradesTab.addEventListener("click", function() {
                                    closedTradesContent.classList.add("show", "active");
                                    openTradesContent.classList.remove("show", "active");
                                });
                            });
                        </script>
                        

<style>
                            .crypto-box {
                            background: url('stock.jpg') no-repeat center center;
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
/*                         
                        .crypto-box .progress {
                            height: 10px;
                        }
                        
                        .crypto-box .progress-bar {
                            background-color: rgba(255, 255, 255, 0.8);
                        } */
                        
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
                        
                        .container {
                            padding-bottom: 0; /* Adjust as needed */
                        }

    .container {
    padding-bottom: 0; /* Adjust as needed */
}

    
    </style>                        
 
 @include('dashboard.navbar')

@include('dashboard.footer')