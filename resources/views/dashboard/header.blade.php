<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="light" data-menu-color="light" data-sidenav-user="true">


<!-- Mirrored from coderthemes.com/hyper_2/modern/{{url('home')}} by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 09:34:18 GMT -->
<head>
    <meta charset="utf-8" />
    <title> User Dashboard | Nexglobmarket</title>
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
_smartsupp.key = 'a98c137f3b62e868be7986e2c1a66dfa6fc4449d';
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






                    @php 
$userNotifications = \App\Models\Notification::where('user_id', auth()->id())
    ->latest()
    ->take(10)
    ->get(); 
$unreadCount = $userNotifications->where('is_read', 0)->count();
@endphp 











 <li class="dropdown notification-list">
<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item noti-icon position-relative ai-notification-btn" 
            id="page-header-notifications-dropdown"
            data-bs-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="false">
        <div class="ai-bell-container">
            <i class="ri-notification-3-line font-22"   class="icon-lg ai-bell-icon"></i>

            @if($unreadCount > 0)
            <span class="badge bg-danger rounded-pill ai-notification-badge animate__animated animate__bounceIn">
                {{ $unreadCount }}
            </span>
            @endif
            <div class="ai-bell-ring"></div>
        </div>
    </button>
    
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 ai-notification-dropdown" 
         aria-labelledby="page-header-notifications-dropdown">
        
        <!-- Header -->
        <div class="p-3 ai-notification-header">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 text-dark fw-bold">
                        <i class="mdi mdi-bell-ring-outline me-2 text-primary"></i>
                        Notifications
                    </h6>
                </div>
                <div class="col-auto">
                    <span class="badge bg-primary ai-pulse-badge">
                        Unread ({{ $unreadCount }})
                    </span>
                </div>
            </div>
        </div>

        <!-- Notification List -->
        <div data-simplebar style="max-height: 280px;" class="ai-notification-list">
            @forelse($userNotifications as $note)
            <div class="ai-notification-item animate__animated animate__fadeInRight" 
                 data-notification-id="{{ $note->id }}"
                 data-read="{{ $note->is_read ? 'true' : 'false' }}"
                 style="animation-delay: {{ $loop->index * 0.05 }}s">
                <div class="d-flex align-items-start p-3">
                    <!-- Notification Icon -->
                    <div class="flex-shrink-0 me-3">
                        <div class="ai-notification-icon bg-{{ $note->is_read ? 'secondary' : 'primary' }}-subtle">
                            <i class="bx bx-{{ $note->is_read ? 'bell' : 'bell-ring' }} text-{{ $note->is_read ? 'secondary' : 'primary' }} fs-5"></i>
                            @if(!$note->is_read)
                            <div class="ai-pulse-dot"></div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Notification Content -->
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="mb-0 text-dark fw-semibold {{ $note->is_read ? '' : 'unread-text' }}">
                                {{ $note->message }}
                            </h6>
                            <div class="ai-notification-actions">
                               
                            </div>
                        </div>
                        <div class="font-size-13 text-muted">
                            <p class="mb-0">
                                <i class="mdi mdi-clock-outline me-1"></i>
                                <span class="ai-time-ago">{{ $note->created_at->diffForHumans() }}</span>
                                <small class="ms-2 text-muted">{{ $note->created_at->format('h:i A') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Progress bar for new notifications -->
                @if(!$note->is_read)
                <div class="ai-notification-progress">
                    <div class="ai-progress-bar"></div>
                </div>
                @endif
            </div>
            @empty
            <div class="text-center py-5 ai-empty-state">
                <div class="ai-empty-icon mb-3">
                    <i class="mdi mdi-bell-off-outline display-4 text-muted"></i>
                </div>
                <h6 class="text-muted mb-2">No notifications yet</h6>
                <p class="text-muted small">We'll notify you when something arrives</p>
            </div>
            @endforelse
        </div>

        <!-- Footer -->
        <div class="p-3 border-top bg-light-subtle ai-notification-footer">
            <div class="d-grid">
                <a class="btn btn-primary btn-sm ai-view-all-btn" href="{{ route('user.notifications') }}">
                    <i class="mdi mdi-arrow-right-circle me-2"></i>
                    <span>View All Notifications</span>
                    <i class="mdi mdi-chevron-right ms-1"></i>
                </a>
            </div>
            @if($unreadCount > 0)
            <div class="text-center mt-2">

            </div>
            @endif
        </div>
    </div>
</div>
</li>

<style>
    /* Enhanced Notification Styles */
    .ai-notification-btn {
        position: relative;
        border: none;
        background: transparent;
        transition: all 0.3s ease;
        padding: 8px 12px;
    }

    .ai-notification-btn:hover {
        transform: translateY(-1px);
        background: rgba(255, 255, 255, 0.1);
    }

    .ai-bell-container {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ai-bell-icon {
        transition: all 0.3s ease;
        color: #060101ff;
    }

    .ai-notification-btn:hover .ai-bell-icon {
        color: #4361ee;
        transform: scale(1.1);
    }

    .ai-notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 4px 6px;
        min-width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: badgePulse 2s infinite;
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.4);
    }

    @keyframes badgePulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .ai-bell-ring {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 40px;
        height: 40px;
        border: 2px solid transparent;
        border-radius: 50%;
        transform: translate(-50%, -50%);
        animation: bellRing 3s infinite;
        opacity: 0;
    }

    @keyframes bellRing {
        0% {
            border-color: rgba(67, 97, 238, 0.3);
            width: 40px;
            height: 40px;
            opacity: 1;
        }
        100% {
            border-color: rgba(67, 97, 238, 0);
            width: 60px;
            height: 60px;
            opacity: 0;
        }
    }

    /* Dropdown Styles */
    .ai-notification-dropdown {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        background: white;
        min-width: 380px;
        overflow: hidden;
    }

    .ai-notification-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 1px solid #e9ecef;
    }

    .ai-pulse-badge {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    /* Notification Items */
    .ai-notification-list {
        background: white;
    }

    .ai-notification-item {
        border-bottom: 1px solid #f8f9fa;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .ai-notification-item:hover {
        background: rgba(67, 97, 238, 0.03);
        transform: translateX(5px);
    }

    .ai-notification-item[data-read="false"] {
        background: rgba(67, 97, 238, 0.05);
        border-left: 3px solid #4361ee;
    }

    .ai-notification-item[data-read="false"]:hover {
        background: rgba(67, 97, 238, 0.08);
    }

    .ai-notification-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        transition: all 0.3s ease;
    }

    .ai-notification-item:hover .ai-notification-icon {
        transform: scale(1.1);
    }

    .ai-pulse-dot {
        position: absolute;
        top: -2px;
        right: -2px;
        width: 8px;
        height: 8px;
        background: #4361ee;
        border-radius: 50%;
        animation: dotPulse 1.5s infinite;
    }

    @keyframes dotPulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.5); opacity: 0.7; }
    }

    .unread-text {
        color: #2c3e50;
        font-weight: 700 !important;
    }

    .ai-notification-actions {
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        gap: 4px;
    }

    .ai-notification-item:hover .ai-notification-actions {
        opacity: 1;
    }

    .ai-mark-read-btn, .ai-delete-btn {
        width: 24px;
        height: 24px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }

    .ai-mark-read-btn:hover {
        background: #28a745 !important;
        color: white;
        transform: scale(1.1);
    }

    .ai-delete-btn:hover {
        background: #dc3545 !important;
        color: white;
        transform: scale(1.1);
    }

    /* Progress Bar */
    .ai-notification-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: rgba(67, 97, 238, 0.1);
    }

    .ai-progress-bar {
        height: 100%;
        background: linear-gradient(90deg, #4361ee, #3a0ca3);
        width: 0%;
        animation: progressFill 3s ease-in-out infinite;
    }

    @keyframes progressFill {
        0% { width: 0%; }
        50% { width: 100%; }
        100% { width: 0%; }
    }

    /* Empty State */
    .ai-empty-state {
        padding: 40px 20px;
    }

    .ai-empty-icon {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-5px); }
    }

    /* Footer */
    .ai-notification-footer {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .ai-view-all-btn {
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .ai-view-all-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    .ai-view-all-btn:hover::before {
        left: 100%;
    }

    .ai-view-all-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .ai-mark-all-btn {
        border-radius: 6px;
        padding: 4px 12px;
        font-size: 0.75rem;
        transition: all 0.3s ease;
    }

    .ai-mark-all-btn:hover {
        background: #28a745;
        color: white;
        transform: translateY(-1px);
    }

    /* Time ago styling */
    .ai-time-ago {
        font-weight: 500;
        color: #6c757d;
    }

    /* Simplebar customization */
    .simplebar-scrollbar::before {
        background: rgba(67, 97, 238, 0.6) !important;
    }

    .simplebar-track.simplebar-vertical {
        width: 6px;
    }
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize notification animations
    const notificationBtn = document.querySelector('.ai-notification-btn');
    const notificationDropdown = document.querySelector('.ai-notification-dropdown');
    
    // Add click animation to bell icon
    notificationBtn.addEventListener('click', function() {
        const bellIcon = this.querySelector('.ai-bell-icon');
        bellIcon.style.transform = 'scale(1.2)';
        setTimeout(() => {
            bellIcon.style.transform = 'scale(1)';
        }, 300);
    });

    // Show/hide bell ring animation based on unread count
    const unreadCount = {{ $unreadCount }};
    const bellRing = document.querySelector('.ai-bell-ring');
    
    if (unreadCount > 0) {
        bellRing.style.display = 'block';
    } else {
        bellRing.style.display = 'none';
    }

    // Add hover effects to notification items
    const notificationItems = document.querySelectorAll('.ai-notification-item');
    notificationItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });

    // Clear unread count and mark all notifications read on dropdown open
    const dropdownEl = document.getElementById('page-header-notifications-dropdown');
    const badge = document.querySelector('.ai-notification-badge');
    const unreadSpan = document.querySelector('.ai-pulse-badge');

    dropdownEl.addEventListener('show.bs.dropdown', function () {
        // Clear badge UI
        if (badge) badge.textContent = '';
        if (unreadSpan) unreadSpan.textContent = 'Unread (0)';

        // Update notification items visually
        const unreadItems = document.querySelectorAll('.ai-notification-item[data-read="false"]');
        unreadItems.forEach(item => {
            item.setAttribute('data-read', 'true');
            item.querySelector('.ai-notification-icon').classList.remove('bg-primary-subtle');
            item.querySelector('.ai-notification-icon').classList.add('bg-secondary-subtle');
            const icon = item.querySelector('.ai-notification-icon i');
            if (icon) {
                icon.classList.remove('bx-bell-ring', 'text-primary');
                icon.classList.add('bx-bell', 'text-secondary');
            }
            item.querySelector('.ai-pulse-dot')?.remove();
            item.querySelector('.ai-notification-progress')?.remove();
            item.querySelector('.unread-text')?.classList.remove('unread-text');
            item.style.borderLeft = 'none';
            item.style.background = 'white';
        });

        // Mark all notifications as read in backend
        fetch('{{ route("user.notifications.markAllRead") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        }).then(res => res.json())
          .then(data => {
              if(data.success) console.log('All notifications marked as read.');
          });
    });
});

// Notification actions
function markNotificationAsRead(notificationId) {
    const item = document.querySelector(`[data-notification-id="${notificationId}"]`);
    
    item.style.animation = 'fadeOutLeft 0.5s ease';
    
    setTimeout(() => {
        item.setAttribute('data-read', 'true');
        item.querySelector('.ai-notification-icon').classList.remove('bg-primary-subtle');
        item.querySelector('.ai-notification-icon').classList.add('bg-secondary-subtle');
        item.querySelector('.ai-notification-icon i').classList.remove('bx-bell-ring', 'text-primary');
        item.querySelector('.ai-notification-icon i').classList.add('bx-bell', 'text-secondary');
        item.querySelector('.ai-pulse-dot')?.remove();
        item.querySelector('.ai-notification-progress')?.remove();
        item.querySelector('.unread-text')?.classList.remove('unread-text');
        item.querySelector('.ai-mark-read-btn')?.remove();
        item.style.borderLeft = 'none';
        item.style.background = 'white';
        item.style.animation = 'fadeInRight 0.5s ease';
        updateNotificationBadge();
    }, 500);
}

function markAllNotificationsAsRead() {
    const unreadItems = document.querySelectorAll('.ai-notification-item[data-read="false"]');
    unreadItems.forEach((item, index) => {
        setTimeout(() => {
            markNotificationAsRead(item.getAttribute('data-notification-id'));
        }, index * 100);
    });
}

function deleteNotification(notificationId) {
    const item = document.querySelector(`[data-notification-id="${notificationId}"]`);
    
    item.style.animation = 'fadeOutRight 0.5s ease';
    
    setTimeout(() => {
        item.remove();
        updateNotificationBadge();
        const remainingItems = document.querySelectorAll('.ai-notification-item').length;
        if (remainingItems === 0) {
            const list = document.querySelector('.ai-notification-list');
            list.innerHTML = `
                <div class="text-center py-5 ai-empty-state">
                    <div class="ai-empty-icon mb-3">
                        <i class="mdi mdi-bell-off-outline display-4 text-muted"></i>
                    </div>
                    <h6 class="text-muted mb-2">No notifications yet</h6>
                    <p class="text-muted small">We'll notify you when something arrives</p>
                </div>
            `;
        }
    }, 500);
}

function updateNotificationBadge() {
    const unreadItems = document.querySelectorAll('.ai-notification-item[data-read="false"]').length;
    const badge = document.querySelector('.ai-notification-badge');
    const unreadSpan = document.querySelector('.ai-pulse-badge');
    
    if (unreadItems > 0) {
        badge.textContent = unreadItems;
        unreadSpan.textContent = `Unread (${unreadItems})`;
    } else {
        badge?.remove();
        unreadSpan.textContent = 'Unread (0)';
        document.querySelector('.ai-bell-ring').style.display = 'none';
    }
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeOutLeft {
        from { opacity: 1; transform: translateX(0); }
        to { opacity: 0; transform: translateX(-50px); }
    }
    
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes fadeOutRight {
        from { opacity: 1; transform: translateX(0); }
        to { opacity: 0; transform: translateX(50px); }
    }
`;
document.head.appendChild(style);
</script>


                    
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
    <a href="{{ route('user.notifications') }}" class="side-nav-link">
        <i class="uil-bell"></i> <!-- Bell icon for notifications -->
        <span>Notifications</span>
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