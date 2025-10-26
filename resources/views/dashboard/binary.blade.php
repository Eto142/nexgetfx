@include('dashboard.header')

     <!-- content @s -->
               <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div style="margin-right:520px" class="nk-content-body">
                            <div class="buysell wide-xs m-auto">
                                <div>
                                        <ul class="nk-block-tools gx-3">
                                            <li><button type="button" class="btn btn-primary"><span>Deposit</span> <em class="icon ni ni-arrow-long-right"></em></button></li>
                                            <li><button type="button" data-bs-toggle="modal"
                                                data-bs-target="#pass"
                                                class="btn btn-white btn-light"><span>Withdraw</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></button></li>
                                        </ul>
                                    </div><!-- .nk-block-head-content -->
                                <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_b4b8d"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">EURUSD Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": 610,
  "height": 610,
  "symbol": "FX:EURUSD",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "withdateranges": true,
  "hide_side_toolbar": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_b4b8d"
}
  );
  </script>
                                
</div>
<!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
                
    @include('dashboard.footer')