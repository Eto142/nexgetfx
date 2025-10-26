<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>User Dashboard | UpwardtradeOption</title>
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

<body>
    <div class="container mt-3">
         <b class="text-xs mb-0" style="color:black;"> <h4 class="page-title text-left">Deposits</h4></b>
        <div class="row justify-content-center mt-4">
            <div class="text-center mt-3">
                <a href="{{url('deposit')}}"><button class="custom-button" >New Deposit</button></a>
              </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div id="deposit-message" class="message-box" style='color:black'>
            Deposits will be pending until there are sufficient confirmations on the blockchain.
            <span id="close-button">&times;</span>
        </div>
        <div class="row">
            @foreach($deposit as $deposithistory)
           <div class="col-12 mb-2"> <!-- Reduced mb-2 instead of mb-4 -->
    <div class="card" style="border-radius: 20px; background-color: white; border: 1px solid #ddd; padding: 10px; color:black"> <!-- Reduced padding to 10px -->
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Left side with date, amount, payment method, and status -->
                <div class="d-flex align-items-center">
                    <span style="font-size: 24px; margin-right: 20px;"><b>{{ \Carbon\Carbon::parse($deposithistory->created_at)->format('M d') }}</b></span>
                    <div>
                        <span><b>${{$deposithistory->amount}}</b></span><br>
                        <span><b>{{$deposithistory->payment_method}}</b></span><br>
                        Pending
                        @if($deposithistory->status == '0')
                        <span class="badge badge-warning mt-1">Pending</span>
                        @else
                        <span class="badge badge-success mt-1">Approved</span>
                        @endif
                    </div>
                </div>
                <!-- Right side with "Pay" button -->
                <a href="{{url('deposit')}}" class="">Pay</a>
            </div>
        </div>
    </div>
    @endforeach
</div>


    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
        }

        .message-box {
            border: 1px solid #ccc;
            padding: 10px 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            position: relative;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 5px;
        }

        #close-button {
            color: #aaa;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        #close-button:hover {
            color: #000;
        }

        .page-title {
            margin-bottom: 20px;
        }

        .text-left {
            text-align: left;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
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

    <script>
        document.getElementById('close-button').addEventListener('click', function () {
            var messageBox = document.getElementById('deposit-message');
            messageBox.style.display = 'none';
        });
    </script>

    @include('dashboard.navbar')
    {{-- @include('dashboard.footer') --}}
</body>

</html>
