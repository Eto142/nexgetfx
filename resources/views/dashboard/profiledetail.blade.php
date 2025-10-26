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





<style>
    body {
        background-color: #f4f4f4;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        overflow: auto;
    }

    .card {
        width: 90%;
        max-width: 450px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
        background-color: #fff;
        text-align: left;
    }

    .card-img-top {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        margin: 0 auto 30px;
        display: block;
    }

    .card-body {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 15px 20px;
    }

    .card-body p {
        margin: 0;
        padding: 10px 0;
    }

    .card-body p:nth-child(even) {
        background-color: #f9f9f9;
    }

    .card-body p:nth-child(odd) {
        background-color: #ffffff;
    }

    .card-body p strong {
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="card">
    <img src="camera.png" class="card-img-top" alt="Camera">
    <div class="card-body">
        <p><strong>EMAIL:</strong></p>
        <p>{{Auth::user()->email}</p>
        <p><strong>MOBILE NUMBER:</strong></p>
        <p>{{Auth::user()->phone}</p>
        <p><strong>FIRST NAME:</strong></p>
        <p>{{Auth::user()->name}}</p>
        <p><strong>LAST NAME:</strong></p>
        <p>{{Auth::user()->lname}}</p>
        <p><strong>STREET ADDRESS:</strong></p>
        <p>{{Auth::user()->address}}</p>
        <p><strong>POST CODE:</strong></p>
        <p>{{Auth::user()->	pcode}}</p>
        <p><strong>CITY:</strong></p>
        <p>{{Auth::user()->country}}</p>
        <p><strong>STATE:</strong></p>
        <p>{{Auth::user()->state}}</p>
        <p><strong>COUNTRY:</strong></p>
        <p>{{Auth::user()->country}}</p>
    </div>
</div>
 @include('dashboard.navbar')

@include('dashboard.footer')