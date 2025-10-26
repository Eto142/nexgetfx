<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>BoldPay - Automatic Cryptocurrency Payment</title>
	<link rel="SHORTCUT ICON" href="https://cdn4.iconfinder.com/data/icons/bitcoin-16/1024/bitcoin_wallet-512.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://pay.onepayasia.com/crypto/css/bootstrap.css" rel="stylesheet">
    <link href="https://pay.onepayasia.com//crypto/css/crypto.css?2" rel="stylesheet" type="text/css">


</head>    <style>         body {             background-image: none !important;             font-size: 14px;         }          .tdCopy:hover {             cursor: pointer;         } 		    #address {         width: 50%;         padding: 10px;         font-size: 16px;         border-radius: 5px;         border: 1px solid #f7a82d;         background-color: rgba(255, 255, 255, 0.1);         color: white;         outline: none;         transition: all 0.3s ease-in-out;         text-align: center;     }      #address:hover, #address:focus {         border-color: #ffcc80;         background-color: rgba(255, 255, 255, 0.2);     } #network {     width: 50%;     padding: 10px;     font-size: 16px;     border-radius: 5px;     border: 1px solid #f7a82d;     background-color: rgba(255, 255, 255, 0.1);     color: white;     outline: none;     transition: all 0.3s ease-in-out; }  #network:hover, #network:focus {     border-color: #ffcc80;     background-color: rgba(255, 255, 255, 0.2); }  #network option {     background-color: #333;     color: white;     font-size: 16px; }  #gateway {     width: 50%;     padding: 10px;     font-size: 16px;     border-radius: 5px;     border: 1px solid #f7a82d;     background-color: rgba(255, 255, 255, 0.1);     color: white;     outline: none;     transition: all 0.3s ease-in-out; }  #gateway:hover, #gateway:focus {     border-color: #ffcc80;     background-color: rgba(255, 255, 255, 0.2); }  #gateway option {     background-color: #333;     color: white;     font-size: 16px; }  /* Styling for the amount input */ #amount {     width: 50%;     padding: 10px;     font-size: 16px;     border-radius: 5px;     border: 1px solid #f7a82d;     background-color: rgba(255, 255, 255, 0.1);     color: white;     outline: none;     transition: all 0.3s ease-in-out;     text-align: center; }  #amount:hover, #amount:focus {     border-color: #ffcc80;     background-color: rgba(255, 255, 255, 0.2); }  @media (max-width: 768px) {     #gateway, #amount {         font-size: 14px;         padding: 8px;     } }          .tdCopy {             margin-left: 5px;             padding: 2px;         }          .displayText {             color: white;             overflow-wrap: break-word;         }          .btnSubmit {             border-radius: 5px;             border-image: none !important;             border: 1px solid !important;             padding: 2px 10px;         }          .btnSubmit:hover {             cursor: pointer;             border: none !important;             color: bisque;             background-color: #7a7a7a73;         }          .noticeContentWarning{             font-weight: 700;             color: red;         }          .noticeHeader{             font-style: italic;             font-weight: bold;             font-size: 15px;         }          .noticeContent{             margin-top: 5px;             font-size: 14px;             display: flex;             flex-direction: column;         }          .grid {             display: flex;             flex-wrap: wrap;             margin-right: -.5rem;             margin-left: -.5rem;             margin-top: -.5rem;         }          .col-12 {             padding: .5em !important;         }          .span-text-warning{              color: red;             font-weight: 700;         }          .title{             font-size: 2.5em;             font-weight: 600;         }          .displayText{             font-size: 1.5em;             font-weight: 600;         }          hr {             border-top: 1px solid rgb(247 168 45 / 50%) !important;         }     </style> 
<body id="particles-js">
    <div class="payment_wrapper payment-container">
        <div class="payment_container">
            <div class="container">
                <div>
                    <div class="grid">
                        <div class="col-12 text-center">

                            <span class="title">
							<img width="300" height="150" src="https://macrokiosk.com/assets/img/og-img/og-image-payment-boldpay-payment-gateway.png">
							<br>Cryptocurrency Automatic Gateway</span>
                        </div>
                    </div>
					<br>
					<br>
                    <div class="grid">
                        <div class="col-12">
                            <div class="noticeHeader">
                                * PAYMENT GUIDE *
                            </div>
                            <div class="noticeContent">
                                <span>
                                    1. Select your cryptocurrency gateway below.
                                </span>
                                <span>
                                    2. Minimum amount <font color="red">$50</font>.
                                </span>
                                <span>
                                    3. Click on the "Get Payment Address" button to receive the payment wallet address.
                                </span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="grid">
                        <div class="col-12 text-center">
                            <label for="gateway">Select Payment Gateway:</label><br>
                            <select id="gateway">
                                <option value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="USDT">Tether (USDT)</option>
                                <option value="USDC">USDC (USD Coin)</option>
                                <option value="SOL">Solana (SOL)</option>
                                <option value="BNB">Binance Coin (BNB)</option>
                                <option value="DOGE">Dogecoin (DOGE)</option>
                                <option value="LTC">Litecoin (LTC)</option>
                                <option value="TON">TON (The Open Network)</option>
                                <option value="POLYGON">Polygon (MATIC)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid" id="networkWrapper" style="display: none;">
                        <div class="col-12 text-center">
                            <label for="network">Select USDT Network:</label><br>
                            <select id="network">
                                <option value="ERC20">ERC20 (Ethereum)</option>
                                <option value="TRC20">TRC20 (Tron)</option>
                                <option value="BEP20">BEP20 (Binance Smart Chain)</option>
                                <option value="POLYGON">Polygon</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="col-12 text-center">
                            <br> <label for="amount">Amount ($):</label><br>
                            <input type="number" id="amount" min="1" required>
                            <br><br>
                            <div class="grid">
                                <div class="col-12 text-center">
                                    <button class="copy-xx" style="color: #dc3545 !important;" onclick="showPayment()">
                                        <span class="p-button-label">Get Payment Address</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="payment_wrapper payment-container" id="paymentView" style="display: none;">
        <div class="payment_container">
            <div class="container">
                <div id="divPaymentView">
                                        <div class="grid">
                        <div class="col-12 text-center">

                            <span class="title">
							<img width="300" height="150" src="https://macrokiosk.com/assets/img/og-img/og-image-payment-boldpay-payment-gateway.png">
							<br>Cryptocurrency Automatic Gateway</span>
                        </div>
                    </div>
					<br>
					<br>
                        <div class="col-12 text-center">
                            <span>
                                Remaining time : <span id="countDown" class="span-text-warning"></span>
                            </span>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="col-12">
                            <div class="noticeHeader">
                                * PAYMENT GUIDE *
                            </div>
                            <div class="noticeContent">
                                <span>
                                    1. Copy or scan wallet address to make the payment.
                                </span>
                                <span>
                                    2. Your payment will be complete automatically after 2-3 blockchain confirmations.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="hr-with-text">
                        Payment Details
                    </div>
                    <div class="grid">
                        <div class="col-12 text-center">
                            <span>Gateway: <span id="selectedGateway"></span></span>
                            <br>
                            <span>Amount: $<span id="selectedAmount"></span></span>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="col-12 text-center">
                            <div class="d-flex justify-content-center">
                                <div class="qrcode_wrapper">
                                    <img id="qrCode" src="" class="qrcode" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="col-12 text-center">
                            <label for="address">Wallet Address:</label><br>
                            <input type="text" id="address" readonly />
                        </div>
                    </div>

                    <div class="grid">
                        <div class="col-12 text-center">
                            <button class="copy-xx" onclick="copyAddress()">
                                <span class="p-button-label">Copy address</span> <i class="fa fa-files-o tdCopy"></i>
                            </button>
                        </div>
                    </div>

                    <hr />
                    <div class="grid">
                        <div class="col-12">
                            <div class="noticeHeader">
                                * IMPORTANT NOTICE *
                            </div>
                            <div class="noticeContent">
                                <span>
                                    1. Please do not transfer any non- <b>Selected gateway</b>, otherwise the payment will fail.
                                </span>
                                <span>
                                    2. Please wait patiently while we are confirming with the blockchain after payment is done.
                                </span>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="grid">
                        <div class="col-12 text-center">
                            <button class="copy-xx" style="color: #dc3545 !important;" onclick="goBack()">
                                <span class="p-button-label">Change Gateway</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://pay.onepayasia.com/crypto/js/customize.js?2"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var gatewaySelect = document.getElementById("gateway");
            var networkWrapper = document.getElementById("networkWrapper");

            function toggleNetworkVisibility() {
                if (gatewaySelect.value === "USDT") {
                    networkWrapper.style.display = "block";
                } else {
                    networkWrapper.style.display = "none";
                }
            }

            gatewaySelect.addEventListener("change", toggleNetworkVisibility);
            toggleNetworkVisibility(); 
        });

        function showPayment() {
            var gateway = document.getElementById("gateway").value;
            var amount = document.getElementById("amount").value;
			var network = document.getElementById('network') ? document.getElementById('network').value : '';

            var payload = {
                currency: gateway,
                amount: amount,
                merchant: 'S3RX7P-MGRR8Y-0EE5CE-KURS5W',
                orderId: 'ORD-' + Date.now(),
                callbackUrl: 'https://example.com/callback',
                email: 'customer@example.com'
            };
            if (gateway === 'USDT' && network) {
                payload.network = network;
            }

            fetch('https://api.oxapay.com/merchants/request/staticaddress', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(payload)
            })
            .then(response => response.json())
            .then(data => {
                if (data.result === 100) {
                    var address = data.address;
                    var qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" + encodeURIComponent(address) + "&size=300x300";
                    
                    document.getElementById("selectedGateway").textContent = gateway;
                    document.getElementById("selectedAmount").textContent = amount;
                    document.getElementById("address").value = address; 
                    document.getElementById("qrCode").src = qrCodeUrl;
                    document.getElementById("paymentView").style.display = "block";
                    document.querySelector(".payment_wrapper:first-of-type").style.display = "none";
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while generating the address.');
            });
        }

        function copyAddress() {
            var addressInput = document.getElementById("address");
            addressInput.select();
            addressInput.setSelectionRange(0, 99999); 
            document.execCommand("copy");
            alert("Address copied: " + addressInput.value);
        }

        function goBack() {
            document.querySelector(".payment_wrapper:first-of-type").style.display = "block";
            document.getElementById("paymentView").style.display = "none";
        }
    </script>
</body>
</html>