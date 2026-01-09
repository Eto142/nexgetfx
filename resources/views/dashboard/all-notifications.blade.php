@include('dashboard.header')

<main>
    <div class="container py-5">

        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-wrap animate__animated animate__fadeInDown">
                    <h4 class="mb-2 mb-sm-0">🔔 Notifications Center</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Smart Notifications</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Alerts -->
        @if (session('status') || Session::get('success'))
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-success animate__animated animate__bounceIn" role="alert">
                        <i class="mdi mdi-check-circle-outline me-2"></i>
                        {{ session('status') ?? Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Notifications Card -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">

                    <!-- Card Header -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="mdi mdi-bell-ring-outline me-2"></i>Recent Notifications</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="mdi mdi-filter me-1"></i> Filter
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="filterNotifications('all')">All Notifications</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterNotifications('unread')">Unread Only</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterNotifications('today')">Today</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterNotifications('important')">Important</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-outline-secondary btn-sm" onclick="refreshNotifications()">
                                <i class="mdi mdi-refresh me-1"></i> Refresh
                            </button>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-3">
                        @if($notifications->count() > 0)
                            <div class="list-group">
                                @foreach($notifications as $note)
                                    <div class="list-group-item list-group-item-action d-flex align-items-start gap-3 flex-column flex-sm-row py-3 my-2 rounded shadow-sm"
                                         style="background:#f9f9f9; border-left:4px solid {{ $note->priority == 'high' ? '#dc3545' : '#0d6efd' }};">
                                        
                                        <!-- Icon -->
                                        <div class="notification-icon fs-3 text-center flex-shrink-0">
                                            @if($note->type == 'trade')
                                                <i class="mdi mdi-chart-line text-success"></i>
                                            @elseif($note->type == 'deposit')
                                                <i class="mdi mdi-arrow-down-circle text-primary"></i>
                                            @elseif($note->type == 'withdrawal')
                                                <i class="mdi mdi-arrow-up-circle text-warning"></i>
                                            @elseif(isset($note->priority) && $note->priority == 'high')
                                                <i class="mdi mdi-alert-circle text-danger"></i>
                                            @else
                                                <i class="mdi mdi-bell-outline text-info"></i>
                                            @endif
                                        </div>

                                        <!-- Content -->
                                        <div class="notification-content flex-grow-1">
                                            <div class="fw-semibold">{{ $note->message }}</div>
                                            <small class="text-muted d-block mt-1">
                                                <i class="mdi mdi-clock-outline me-1"></i>
                                                {{ $note->created_at->diffForHumans() }} • {{ $note->created_at->format('M j, Y • h:i A') }}
                                            </small>
                                        </div>

                                        <!-- Actions (optional) -->
                                        <div class="notification-actions mt-2 mt-sm-0 flex-shrink-0">
                                            @if(!$note->read)
                                                <span class="badge bg-primary">Unread</span>
                                            @else
                                                <span class="badge bg-success">Read</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="mdi mdi-bell-off-outline display-1 text-muted mb-3"></i>
                                <h5 class="text-muted">No Notifications Yet</h5>
                                <p class="text-muted">You're all caught up! New notifications will appear here.</p>
                                <button class="btn btn-primary" onclick="refreshNotifications()">
                                    <i class="mdi mdi-refresh me-2"></i> Check for Updates
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Footer -->
                    @if($notifications->count() > 0)
                        <div class="card-footer text-center text-muted">
                            Showing all {{ $notifications->count() }} notifications
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

@include('dashboard.navbar')
@include('dashboard.footer')
