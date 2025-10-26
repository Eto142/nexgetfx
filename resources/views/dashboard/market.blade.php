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
     <b class="text-xs mb-0" style="color:black;"><div class="balance">Markets</div></b>
   <b class="text-xs mb-0" style="color:black;"> <a href="#" class="deposit">Deposit</a> </b>
</div>
        <div class="container mt-5">
        
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <select id="dataType" class="form-control" onchange="fetchData()">
                        <option value="" disabled selected>Select an option</option>
                        <option value="crypto">Crypto</option>
                        <option value="currencies">Currencies</option>
                        <option value="stocks">Stocks</option>
                        <option value="indices">Indices</option>
                    </select>
                </div>
            </div>
            <div class="crypto-container mt-4" id="cryptoContainer"></div>
        </div>
    <script>
async function fetchData() {
    const dataType = document.getElementById('dataType').value;
    let url;

    switch (dataType) {
        case 'crypto':
            url = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd';
            break;
        case 'currencies':
            url = 'https://api.exchangerate-api.com/v4/latest/USD';
            break;
        case 'stocks':
            url = 'https://financialmodelingprep.com/api/v3/quote/AAPL,GOOGL,MSFT,AMZN,FB?apikey=demo';
            break;
        case 'indices':
            url = 'https://financialmodelingprep.com/api/v3/quotes/index?apikey=demo';
            break;
        default:
            return;
    }

    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        displayData(data, dataType);
    } catch (error) {
        console.error('Error fetching data:', error);
        document.getElementById('cryptoContainer').innerText = 'Error fetching data. Please try again.';
    }
}

function displayData(data, dataType) {
    const container = document.getElementById('cryptoContainer');
    container.innerHTML = '';

    if (dataType === 'crypto') {
        data.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'crypto-item';
            itemDiv.innerHTML = `
                <div class="crypto-info">
                    <img class="crypto-logo" src="${item.image}" alt="${item.name}">
                    <div class="crypto-details">
                        <div class="crypto-name">${item.name}</div>
                        <div class="crypto-price">$${item.current_price}</div>
                        <div class="crypto-change">$${item.price_change_24h.toFixed(2)}</div>
                    </div>
                </div>
                <div>
                    <span class="trade-value">$${item.current_price}</span>
                    <span class="watchlist-icon" onclick="toggleWatchlist(this)">&#9733;</span>
                </div>
            `;
            itemDiv.addEventListener('click', () => openTradingRoom(item, dataType));
            container.appendChild(itemDiv);
        });
    } else if (dataType === 'stocks' || dataType === 'indices') {
        data.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'crypto-item';
            itemDiv.innerHTML = `
                <div class="crypto-info">
                    <img class="crypto-logo" src="https://financialmodelingprep.com/image-stock/${item.symbol}.png" alt="${item.name || item.symbol}">
                    <div class="crypto-details">
                        <div class="crypto-name">${item.name || item.symbol}</div>
                        <div class="crypto-price">$${item.price}</div>
                        <div class="crypto-change">$${(item.change || 0).toFixed(2)}</div>
                    </div>
                </div>
                <div>
                    <span class="trade-value">$${item.price}</span>
                    <span class="watchlist-icon" onclick="toggleWatchlist(this)">&#9733;</span>
                </div>
            `;
            itemDiv.addEventListener('click', () => openTradingRoom(item, dataType));
            container.appendChild(itemDiv);
        });
    } else if (dataType === 'currencies') {
        for (const [currency, rate] of Object.entries(data.rates)) {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'crypto-item';
            itemDiv.innerHTML = `
                <div class="crypto-info">
                    <img class="crypto-logo" src="https://countryflagsapi.com/png/${currency.slice(0, 2)}" alt="${currency}">
                    <div class="crypto-details">
                        <div class="crypto-name">${currency}</div>
                        <div class="crypto-price">${rate}</div>
                        <div class="crypto-change">$0.00</div>
                    </div>
                </div>
                <div>
                    <span class="trade-value">${rate}</span>
                    <span class="watchlist-icon" onclick="toggleWatchlist(this)">&#9733;</span>
                </div>
            `;
            itemDiv.addEventListener('click', () => openTradingRoom({ name: currency, price: rate }, dataType));
            container.appendChild(itemDiv);
        }
    }
}

function toggleWatchlist(element) {
    element.classList.toggle('active');
    if (element.classList.contains('active')) {
        element.style.color = 'red';
    } else {
        element.style.color = 'gold';
    }
}

function openTradingRoom(item, dataType) {
    localStorage.setItem('selectedItem', JSON.stringify({ ...item, type: dataType }));
    window.location.href = 'tradingroom';
}

    </script>
    <!-- Bootstrap JS and dependencies -->


    
</body>
</html>


<style>
body {
    /*font-family: Arial, sans-serif;*/
    /*background-color: #f4f4f4;*/
}

.crypto-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

.crypto-item {
    /*background-color: white;*/
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
}

.crypto-info {
    display: flex;
    align-items: center;
}

.crypto-logo {
    width: 50px;
    height: 50px;
    margin-right: 15px;
}

.crypto-details {
    display: flex;
    flex-direction: column;
}

.crypto-name {
    font-size: 1.2rem;
    font-weight: bold;
}

.crypto-price,
.crypto-change {
    font-size: 1rem;
}

.trade-value {
    margin-right: 10px;
    font-size: 1rem;
    font-weight: bold;
}

.watchlist-icon {
    font-size: 1.5rem;
    cursor: pointer;
    color: gold;
}

.trading-actions {
    margin-top: 20px;
}

.btn {
    margin: 0 10px;
}

</style>

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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  @include('dashboard.navbar')
  
@include('dashboard.footer')