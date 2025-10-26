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



  <!-- Content -->
  <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-11 col-md-12 mb-4">

<div class="text-center mb-3">
    <img src="camera.png" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 150px;">
    <h3 class="card-title">{{ Auth::user()->name }} {{ Auth::user()->lname }}</h3>
   Verifications
</div>

  
             <a href="{{url('profiledetail')}}" class="card text-decoration-none mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="email.png" alt="Referral Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Email Verification  (completed)</h5>
                </div>
            </a>


         
            <!-- Watchlist Box -->
            <a href="{{url('identityverify')}}" class="card text-decoration-none mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="profile.png" alt="Watchlist Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Identity Verification</h5>
                </div>
            </a>
            <!-- Withdrawals Box -->
            <a href="#" class="card text-decoration-none">
                <div class="card-body d-flex align-items-center">
                    <img src="address.png" alt="Withdrawals Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Address Verifications(pending)</h5>
                </div>
            </a>
        </div>

        </div>
    </div>
</div>

















 @include('dashboard.navbar')

@include('dashboard.footer')