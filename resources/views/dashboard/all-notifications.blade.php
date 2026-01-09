@include('dashboard.header')


<main>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6">









          
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 animate__animated animate__fadeInDown animate__faster">🔔 Notifications Center</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Smart Notifications</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Alert Section -->
            <div class="row">
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success animate__animated animate__bounceIn" role="alert">
                            <i class="mdi mdi-check-circle-outline me-2"></i> {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                        <div class="alert alert-success animate__animated animate__bounceIn">
                            <i class="mdi mdi-check-circle-outline me-2"></i> {{ $message }}
                        </div>
                    @endif
                </div>
            </div>

         
           

            <!-- Notifications List -->
            <div class="row">
                <div class="col-12">
                    <div class="card animate__animated animate__fadeInUp">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">
                                    <i class="mdi mdi-bell-ring-outline me-2"></i>Recent Notifications
                                </h4>
                                <div class="d-flex gap-2">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary btn-sm dropdown-toggle ai-filter-btn" type="button" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-filter me-1"></i> Filter
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" onclick="filterNotifications('all')">All Notifications</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="filterNotifications('unread')">Unread Only</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="filterNotifications('today')">Today</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="filterNotifications('important')">Important</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-outline-secondary btn-sm ai-refresh-btn" onclick="refreshNotifications()">
                                        <i class="mdi mdi-refresh me-1"></i> Refresh
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if($notifications->count() > 0)
                                <div class="ai-notifications-list">
                                    @foreach($notifications as $note)
                                    <div class="ai-notification-item animate__animated animate__fadeIn" data-priority="{{ $note->priority ?? 'normal' }}" data-read="{{ $note->read ? 'true' : 'false' }}" style="animation-delay: {{ $loop->index * 0.1 }}s">
                                        <div class="notification-icon">
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
                                        <div class="notification-content">
                                            <div class="notification-message">
                                                {{ $note->message }}
                                            </div>
                                            <div class="notification-time">
                                                <i class="mdi mdi-clock-outline me-1"></i>
                                                {{ $note->created_at->diffForHumans() }}
                                                • {{ $note->created_at->format('M j, Y • h:i A') }}
                                            </div>
                                        </div>
                                        <div class="notification-actions">
                                            {{-- @if(!$note->read)
                                                <button class="btn btn-sm btn-outline-primary ai-mark-read-btn" onclick="markAsRead('{{ $note->id }}')" title="Mark as read">
                                                    <i class="mdi mdi-check"></i>
                                                </button>
                                            @else
                                                <span class="badge bg-success ai-badge">Read</span>
                                            @endif --}}
                                            {{-- <button class="btn btn-sm btn-outline-danger ai-delete-btn" onclick="deleteNotification('{{ $note->id }}')" title="Delete">
                                                <i class="mdi mdi-delete"></i>
                                            </button> --}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-5 animate__animated animate__fadeIn">
                                    <div class="ai-empty-state">
                                        <i class="mdi mdi-bell-off-outline display-1 text-muted ai-float"></i>
                                        <h5 class="text-muted mt-3">No Notifications Yet</h5>
                                        <p class="text-muted mb-4">You're all caught up! New notifications will appear here.</p>
                                        <button class="btn btn-primary ai-action-btn" onclick="refreshNotifications()">
                                            <i class="mdi mdi-refresh me-2"></i> Check for Updates
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Show total count instead of pagination -->
                        @if($notifications->count() > 0)
                        <div class="card-footer">
                            <div class="text-center text-muted">
                                Showing all {{ $notifications->count() }} notifications
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

          
        </div>
      </div>
    </div>
  </main>
 @include('dashboard.navbar')

@include('dashboard.footer')