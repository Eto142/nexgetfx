<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            margin-top: 40px;
        }
        h1 {
            font-size: 1.75em;
            margin-bottom: 20px;
        }
        p {
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        .input-group input {
            font-size: 0.9em;
        }
        .input-group button {
            font-size: 0.9em;
        }
        .qr-code img {
            max-width: 100%;
            height: auto;
        }
        .timer {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .alert {
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: auto;
            max-width: 80%;
            text-align: center;
        }
        .btn {
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h3 class="mb-4">Send ${{ $data['amount'] }}.00 Worth of {{ $data['item'] }}. </h3>
        <p>To the wallet address below or scan the QR code with your wallet app:</p>
        <div class="input-group mb-3">
                   <!-- Wallet Address and QR Code -->
@if($data == 'Bitcoin')
    @foreach($wallets as $wallet)
        @if(strtolower($wallet->method) == 'btc')
            <label class="fw-bold">Bitcoin Wallet Address</label>
            <div class="input-group mb-3">
                <input type="text" id="btcAddress" class="form-control text-dark" value="{{ $wallet->address }}" readonly>
                <button class="btn btn-outline-primary" type="button" onclick="copyToClipboard('btcAddress')">Copy</button>
            </div>
            @if(!empty($wallet->qr_code))
                <img src="{{ asset('storage/' . $wallet->qr_code) }}" alt="BTC QR Code" width="180" class="rounded shadow-sm">
            @endif
        @endif
    @endforeach

@elseif($data == 'Usdt')
    @foreach($wallets as $wallet)
        @if(strtolower($wallet->method) == 'usdt')
            <label class="fw-bold">USDT Wallet Address</label>
            <div class="input-group mb-3">
                <input type="text" id="usdtAddress" class="form-control text-dark" value="{{ $wallet->address }}" readonly>
                <button class="btn btn-outline-primary" type="button" onclick="copyToClipboard('usdtAddress')">Copy</button>
            </div>
            @if(!empty($wallet->qr_code))
                <img src="{{ asset('storage/' . $wallet->qr_code) }}" alt="USDT QR Code" width="180" class="rounded shadow-sm">
            @endif
        @endif
    @endforeach

@elseif($data == 'Ethereum')
    @foreach($wallets as $wallet)
        @if(strtolower($wallet->method) == 'eth')
            <label class="fw-bold">Ethereum Wallet Address</label>
            <div class="input-group mb-3">
                <input type="text" id="ethAddress" class="form-control text-dark" value="{{ $wallet->address }}" readonly>
                <button class="btn btn-outline-primary" type="button" onclick="copyToClipboard('ethAddress')">Copy</button>
            </div>
            @if(!empty($wallet->qr_code))
                <img src="{{ asset('storage/' . $wallet->qr_code) }}" alt="ETH QR Code" width="180" class="rounded shadow-sm">
            @endif
        @endif
    @endforeach
@endif
        </div>
      
        
        

       
        <div class="timer" id="timer">60:00</div>
        <p>Awaiting Payment</p>
        <div class="d-flex justify-content-around mt-4">
            <button class="btn btn-primary" onclick="uploadProof()">Upload Payment Proof</button>
           <a href="{{url('accounthistory')}}"><button class="btn btn-success" >Wait for Confirmation</button></a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function copyAddress() {
            const address = document.getElementById('btcAddress');
            address.select();
            document.execCommand('copy');
            address.setSelectionRange(0, 0); // Deselect the text
            showTooltip('Address copied to clipboard');
        }

        function showTooltip(message) {
            const tooltip = document.createElement('div');
            tooltip.className = 'alert alert-success';
            tooltip.textContent = message;
            document.body.appendChild(tooltip);
            setTimeout(() => {
                tooltip.remove();
            }, 2000);
        }

        function startTimer(duration, display) {
            let timer = duration, minutes, seconds;
            const interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    display.textContent = "00:00";
                    alert("Time is up! Please initiate the payment again.");
                }
            }, 1000);
        }

        window.onload = function () {
            const sixtyMinutes = 60 * 60;
            const display = document.getElementById('timer');
            startTimer(sixtyMinutes, display);
        };

        function uploadProof() {
            alert("Functionality to upload proof goes here.");
        }

        function waitConfirmation() {
            alert("Functionality to wait for confirmation goes here.");
        }
    </script>

<script>
    function copyAddress(index) {
        var copyText = document.getElementById('address' + index);
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand("copy");
        alert("Copied the address: " + copyText.value);
    }
    </script>
</body>
</html>
