<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">


<!-- Mirrored from coderthemes.com/hyper_2/modern/{{url('home')}} by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 09:34:18 GMT -->
<head>
    <meta charset="utf-8" />
    <title> User Dashboard | UpwardtradeOption</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="uassets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link href="uassets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">

    <!-- Vector Map css -->
    <link href="uassets/vendor/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="uassets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="uassets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="uassets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

    <div class="header">
        <div class="balance">${{$user_balance}}.00</div>
        <a href="{{url('accounthistory')}}" class="deposit">Deposit</a>
    </div>
    <div class="container mt-5">
        <h1 class="text-center" id="tradingRoomTitle">Trading Room</h1>
        <div id="tradingViewContainer" class="mt-4"></div>
        <div class="trading-actions text-center mt-3">
            <style>
                .btn {
                    padding: 10px 20px;
                    font-size: 16px;
                    margin: 5px;
                    cursor: pointer;
                }
                .btn-success {
                    background-color: green;
                    color: white;
                }
                .btn-danger {
                    background-color: red;
                    color: white;
                }
            </style>
        </head>
        <body>
            <form id="tradeForm">
                
                <button type="button" class="btn btn-success" onclick="buy()">UP</button>
                <button type="button" class="btn btn-danger" onclick="sell()">DOWN</button>
            </form>
        
            <script>
                function getBalance() {
                    return parseFloat(document.getElementById('balance').value);
                }
        
                function getAmount() {
                    return parseFloat(document.getElementById('amount').value);
                }
        
                function buy() {
                    let balance = getBalance();
                    let amount = getAmount();
                    
                    if (balance >= amount) {
                        alert('Buy action triggered!');
                        // Update the balance
                        document.getElementById('balance').value = balance - amount;
                    } else {
                        alert('Amount not sufficient');
                    }
                }
        
                function sell() {
                    let balance = getBalance();
                    let amount = getAmount();
                    
                    if (balance >= amount) {
                        alert('Sell action triggered!');
                        // Update the balance
                        document.getElementById('balance').value = balance + amount;
                    } else {
                        alert('Amount not sufficient');
                    }
                }
            </script>
        </div>
    </div>
    <script src="tradingroom.js"></script>
    <script src="https://s3.tradingview.com/tv.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>

document.addEventListener('DOMContentLoaded', () => {
    const item = JSON.parse(localStorage.getItem('selectedItem'));
    if (!item) {
        alert('No item selected!');
        window.location.href = 'index.html';
        return;
    }

    document.getElementById('tradingRoomTitle').innerText = `${item.name} Trading Room`;
    loadTradingViewChart(item);
});

function loadTradingViewChart(item) {
    new TradingView.widget({
        container_id: "tradingViewContainer",
        width: "100%",
        height: 500,
        symbol: getSymbol(item),
        interval: "D",
        timezone: "Etc/UTC",
        theme: "light",
        style: "1",
        locale: "en",
        toolbar_bg: "#f1f3f6",
        enable_publishing: false,
        allow_symbol_change: true,
        details: true,
        hotlist: true,
        calendar: true,
    });
}

function getSymbol(item) {
    switch (item.type) {
        case 'crypto':
            return item.symbol.toUpperCase() + "USD";
        case 'stocks':
            return item.symbol;
        case 'currencies':
            return "OANDA:" + item.name;
        case 'indices':
            return item.symbol;
        default:
            return "";
    }
}

function buy() {
    alert('Buy action triggered');
}

function sell() {
    alert('Sell action triggered');
}

</script>

<style>
    .mt-5 { margin-top: 3rem !important; }
    .mt-4 { margin-top: 1.5rem !important; }
    .mt-3 { margin-top: 1rem !important; }
    .header { 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        padding: 1rem; 
        background-color: #f8f9fa; 
    }
    .header .balance { 
        font-size: 1.25rem; 
        font-weight: bold; 
    }
    .header .deposit { 
        font-size: 1.25rem; 
        color: #007bff; 
        text-decoration: none; 
    }
    .header .deposit:hover { 
        text-decoration: underline; 
    }
</style>
  @include('dashboard.navbar')
  
@include('dashboard.footer')