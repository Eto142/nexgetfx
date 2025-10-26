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





<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
               <b class="text-xs mb-0">  <h4 class="page-title">Account</h4> </b>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Content -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-xxl-4 col-md-6 mb-3">
            <!-- Profile Picture, Name, Email -->
            <div class="text-center mb-3">
                <img src="camera.png" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 150px;">
                <b class="text-xs mb-0"> <h3 class="card-title">{{ Auth::user()->name }} {{ Auth::user()->lname }}</h3></b>
                <b class="text-xs mb-0"> <p class="card-text">{{ Auth::user()->email }}</p></b>
            </div>
            <!-- Referral Box -->
            <a href="{{url('referral')}}" class="card text-decoration-none mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="referral.png" alt="Referral Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Referral</h5>
                </div>
            </a>
            <!-- Watchlist Box -->
            <a href="{{url('watchlist')}}" class="card text-decoration-none mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="watchlist.png" alt="Watchlist Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Watchlist</h5>
                </div>
            </a>
            <!-- Withdrawals Box -->
            <a href="{{url('withdrawallist')}}" class="card text-decoration-none">
                <div class="card-body d-flex align-items-center">
                    <img src="wallet.png" alt="Withdrawals Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Withdrawals</h5>
                </div>
            </a>
        </div>

        <!-- Right Column -->
        <div class="col-xxl-4 col-md-6 mb-3">
            <!-- Logout Box -->
            <a href="{{ route('logout.perform') }}" class="card text-decoration-none mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="logout.png" alt="Logout Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Logout</h5>
                </div>
            </a>
            <!-- Update Email Box -->
            <a href="{{ url('update-email') }}" class="card text-decoration-none mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="email.png" alt="Update Email Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Update Email</h5>
                </div>
            </a>
            <!-- Update Photo Box -->
            <a href="{{url('update-photo')}}" class="card text-decoration-none mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="profile.png" alt="Update Photo Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Update Photo</h5>
                </div>
            </a>
            <!-- Update Password Box -->
            <a href="{{url('update-password')}}" class="card text-decoration-none mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="lock.png" alt="Update Password Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Update Password</h5>
                </div>
            </a>
            <!-- Account Settings Box -->
            <a href="{{url('setting')}}" class="card text-decoration-none">
                <div class="card-body d-flex align-items-center">
                    <img src="settings.png" alt="Account Settings Icon" style="width: 40px; margin-right: 10px;">
                    <h5 class="mb-0">Account Settings</h5>
                </div>
            </a>
        </div>
    </div>
</div>
















{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-header {
            text-align: center;
            margin: 20px 0;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: inline-block;
            background-size: cover;
            background-position: center;
        }
        .profile-name {
            margin-top: 10px;
            font-size: 24px;
            font-weight: bold;
        }
        .profile-options .option-box {
            border-radius: 20px;
            background-color: white;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }
        .profile-options .option-box:hover {
            background-color: #f8f9fa;
        }
        .profile-options .option-box i {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .profile-options .option-box span {
            display: block;
            font-size: 16px;
        }
        @media (min-width: 768px) {
            .profile-options {
                display: flex;
                flex-wrap: wrap;
            }
            .profile-options .left-side, .profile-options .right-side {
                flex: 1;
            }
            .profile-options .left-side {
                max-width: 33%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .profile-options .right-side {
                max-width: 67%;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <div class="profile-picture" style="background-image: url('path/to/your/profile.jpg');"></div>
            <div class="profile-name">{{Auth::user()->name}</div>
        </div>
        <div class="row profile-options">
            <div class="col-12 col-md-4 left-side">
                <div class="option-box">
                    <i class="fas fa-user-friends"></i>
                    <span>Referral</span>
                </div>
                <div class="option-box">
                    <i class="fas fa-eye"></i>
                    <span>Watchlist</span>
                </div>
                <div class="option-box">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Withdrawals</span>
                </div>
            </div>
            <div class="col-12 col-md-8 right-side">
                <div class="col-6 mb-3">
                    <div class="option-box">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="option-box">
                        <i class="fas fa-envelope"></i>
                        <span>Update Email</span>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="option-box">
                        <i class="fas fa-camera"></i>
                        <span>Update Photo</span>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="option-box">
                        <i class="fas fa-key"></i>
                        <span>Update Password</span>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="option-box">
                        <i class="fas fa-cogs"></i>
                        <span>Account Settings</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
 --}}

 @include('dashboard.navbar')

@include('dashboard.footer')