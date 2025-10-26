@include('dashboard.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Withdrawal Method</title>
    <link rel="stylesheet" href="path/to/your/css/file.css"> <!-- Ensure you have linked to your CSS file if it is separate -->
    <style>
        .card-hover:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card {
            height: 100px; /* Adjust the height as needed */
        }
        .card-body {
            padding: 20px;
        }
        @media (min-width: 992px) {
            .col-xl-9, .col-lg-11 {
                max-width: 50%; /* Adjust the width for larger screens */
            }
        }
    </style>
</head>
<body>
    <hr>
    <center>
        <div class="content-page">   
            <div class="content">
                <div class="container py-5">
                    <h4>Select Withdrawal Method</h4>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10 mb-4">
                            <a href="{{ url('bank') }}" class="text-decoration-none">
                                <div class="card h-100 card-hover">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <h6 class="text-success text-center font-weight-bold">Bank</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10 mb-4">
                            <a href="{{ url('crypto') }}" class="text-decoration-none">
                                <div class="card h-100 card-hover">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <h6 class="text-success text-center font-weight-bold">Crypto</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10 mb-4">
                            <a href="{{ url('paypal') }}" class="text-decoration-none">
                                <div class="card h-100 card-hover">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <h6 class="text-primary text-center font-weight-bold">Paypal</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10 mb-4">
                            <a href="{{ url('cashapp') }}" class="text-decoration-none">
                                <div class="card h-100 card-hover">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <h6 class="text-primary text-center font-weight-bold">Cashapp</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>
</html>

@include('dashboard.footer')
