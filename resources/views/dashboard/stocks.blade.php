@include('dashboard.header')

      <!-- content @s -->
                <!-- TradingView Widget BEGIN -->
<div style="margin-top:64px" class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/stocks-usa/" rel="noopener" target="_blank"><span class="blue-text">Stock Market Today</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
  {
  "colorTheme": "light",
  "dateRange": "12M",
  "exchange": "US",
  "showChart": true,
  "locale": "en",
  "width": "100%",
  "height": "500px",
  "largeChartUrl": "",
  "isTransparent": false,
  "showSymbolLogo": false,
  "showFloatingTooltip": false,
  "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
  "plotLineColorFalling": "rgba(41, 98, 255, 1)",
  "gridLineColor": "rgba(42, 46, 57, 0)",
  "scaleFontColor": "rgba(120, 123, 134, 1)",
  "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
  "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
  "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
  "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
  "symbolActiveColor": "rgba(41, 98, 255, 0.12)"
}
  </script>
</div>
<!-- TradingView Widget END -->
                    </div>
                </div>
                
    @include('dashboard.footer')