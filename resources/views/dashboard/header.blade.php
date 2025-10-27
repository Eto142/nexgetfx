<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="light" data-menu-color="light" data-sidenav-user="true">


<!-- Mirrored from coderthemes.com/hyper_2/modern/{{url('home')}} by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 09:34:18 GMT -->
<head>
    <meta charset="utf-8" />
    <title> User Dashboard | NexgetCpt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="logo.png">

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

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'a27ac63c98e35faaa3ab6d95c8f7b1b13954d887';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>



<link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
alpha/css/bootstrap.css')}}" rel="stylesheet">

<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>

<link rel="stylesheet" type="text/css" 
href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css')}}">

<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js')}}"></script>



<style>
    /* Custom Toastr Styles */
    .toast-success {
        background-color: #51A351 !important; /* Custom success color */
    }
    .toast-warning {
        background-color: #F89406 !important; /* Custom warning color */
    }
</style>


<style>
.accordion {
 background-color: transparent;
 color: #444;
 cursor: pointer;
 padding: 18px;
 width: 100%;
 text-align: left;
 border: none;
 outline: none;
 transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active,
.accordion:hover {}

/* Style the accordion panel. Note: hidden by default */
.panel2 {
 padding: 0 18px;
 background-color: white;
 max-height: 0;
 overflow: hidden;
 transition: max-height 0.2s ease-out;
}
</style>



    <style>
        .grid-container h6 {
            font-size: 12px;
            font-weight: bold;
        }

        .withdraw-icon {
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bolder;
            max-width: 50px;
            margin: auto;
        }

        .grid-container-two .d-block span {
            font-weight: bold;
            font-size: 12px;
        }

        a {
            color: unset;
        }
    </style>

<body style="color:black">
    
    <script>
        @if(Auth::user()->kyc_status=='1')
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.success("Kyc status verified");
       
         @else
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
         toastr.warning("kyc not verified, please verify your kyc document");
         @endif
       </script>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-lg-2 gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{url('home')}}" class="logo-light">
                            <span class="logo-lg">
                                <img src="logo.png" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="logo.png" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="{{url('home')}}" class="logo-dark">
                            <span class="logo-lg">
                                <img src="logo.png" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="logo.png" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->
                    <div class="app-search dropdown d-none d-lg-block">
                        

                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-notes font-16 me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-life-ring font-16 me-1"></i>
                                <span>How can I help you?</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-cog font-16 me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="uassets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="uassets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                       
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            {{-- <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            </form> --}}
                        </div>
                    </li>

                    {{-- <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="uassets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
                            <span class="align-middle d-none d-lg-inline-block">English</span> <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="uassets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="uassets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="uassets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="uassets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                            </a>

                        </div>
                    </li> --}}

                    <li class="dropdown notification-list">
                       
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                            <small>Clear All</small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="px-2" style="max-height: 300px;" data-simplebar>

                                <h5 class="text-muted font-13 fw-normal mt-2">Today</h5>
                                <!-- item-->

                                <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-primary">
                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Datacorp <small class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-info">
                                                    <i class="mdi mdi-account-plus"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Admin <small class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">New user registered</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="{{asset('user/uploads/id/'.Auth::user()->photo)}}" class="img-fluid rounded-circle" alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-primary">
                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="{{asset('user/uploads/id/'.Auth::user()->photo)}}" class="img-fluid rounded-circle" alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                                <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome design</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="text-center">
                                    <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                </div>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                View All
                            </a>

                        </div>
                    </li>

                    
                    <li class="">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                            <i class="ri-settings-3-line font-22"></i>
                        </a>
                    </li>

                    <li class="">
                        <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                            <i class="ri-moon-line font-22"></i>
                        </div>
                    </li>


                    <li class="d-none d-md-inline-block">
                        <a class="nav-link" href="#" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line font-22"></i>
                        </a>
                    </li>

                    <!--<li class="dropdown">-->
                    <!--    <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">-->
                    <!--        <span class="account-user-avatar">-->
                    <!--            <img src="{{asset('user/uploads/id/'.Auth::user()->photo)}}" alt="user-image" width="32" class="rounded-circle">-->
                    <!--        </span>-->
                    <!--        <span class="d-lg-flex flex-column gap-1 d-none">-->
                    <!--            <h5 class="my-0">{{Auth::user()->name}}</h5>-->
                    <!--            <h6 class="my-0 fw-normal">{{Auth::user()->email}}</h6>-->
                    <!--        </span>-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">-->
                            <!-- item-->
                          

                            <!-- item-->
                    <!--        <a href="javascript:void(0);" class="dropdown-item">-->
                    <!--            <i class="ri-user-2-fill"></i>-->
                    <!--            <span>My Account</span>-->
                    <!--        </a>-->

                            <!-- item-->
                        

                            <!-- item-->
                    <!--        <a href="javascript:void(0);" class="dropdown-item">-->
                    <!--            <i class="mdi mdi-logout me-1"></i>-->
                    <!--            <span>Logout</span>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="{{url('home')}}" class="logo logo-light">
                <span class="logo-lg">
                    <img src="logo.png" alt="logo">
                </span>
                <span class="logo-sm">
                    <img src="logo.png" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="{{url('home')}}" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="logo.png" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="logo.png" alt="small logo">
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                <i class="ri-checkbox-blank-circle-line align-middle"></i>
            </div>

            <!-- Full Sidebar Menu Close Button -->
            <div class="button-close-fullsidebar">
                <i class="ri-close-fill align-middle"></i>
            </div>

            <!-- Sidebar -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!-- Leftbar User -->
                <div class="leftbar-user">
                    <a href="{{url('dashboard')}}">
                        <img src="{{asset('user/uploads/id/'.Auth::user()->photo)}}" alt="user-image" height="42" class="rounded-circle shadow-sm">
                        <span class="leftbar-user-name mt-2" style="color:black">{{Auth::user()->lname}} &nbsp;{{Auth::user()->name}}</span>
                    </a>
                </div>

                <!--- Sidemenu -->
                <ul class="side-nav" >

                    <li class="side-nav-title" style="color:black">Dashboard</li>
                  
                       
                          
                                <li class="side-nav-item">
                        <a href="{{url('home')}}" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Home </span>
                        </a>
                    </li>
                                

                    <li class="side-nav-item">
                        <a href="{{url('pricing')}}" class="side-nav-link">
                            <i class="uil-calender"></i>
                            <span> plans </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{url('market')}}" class="side-nav-link">
                            <i class="uil-money-stack"></i>
                            <span> Markets </span>
                        </a>
                    </li>

                    
                    <li class="side-nav-item">
                        <a href="{{url('accounthistory')}}" class="side-nav-link">
                            <i class="uil-comments-alt"></i>
                            <span>Deposits </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{url('profile')}}" class="side-nav-link">
                            <i class="ri-user-2-fill"></i>
                            <span>My Account </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{url('traders')}}" class="side-nav-link">
                            <i class="ri-team-fill"></i>
                            <span>My Traders </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{url('withdrawallist')}}" class="side-nav-link">
                            <i class="ri-wallet-2-fill"></i>
                            <span>Withdrawals</span>
                        </a>
                    </li>


                    <li class="side-nav-item">
                        <a href="{{url('crypto_buy')}}" class="side-nav-link">
                            <i class="ri-store-3-fill"></i>
                            <span>Buy Crypto </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('logout')}}" class="side-nav-link">
                            <i class=" ri-logout-circle-r-line"></i>
                            <span>Sign Out </span>
                        </a>
                    </li>
                
                   

                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->