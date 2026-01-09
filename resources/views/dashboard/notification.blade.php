@include('dashboard.header')

<main>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-8 col-xl-6">

                <div class="card border rounded-3 animate__animated animate__fadeInUp">
                    <div class="card-header">
                        <h5 class="card-title mb-0">🔔 Notifications Center</h5>
                    </div>

                    <div class="card-body">
                        <!-- Alert Section -->
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

                        <!-- Notifications List -->
                        @if($notifications->count() > 0)
                            <div class="ai-notifications-list">
                                @foreach($notifications as $note)
                                    <div class="ai-notification-item animate__animated animate__fadeIn mb-2" 
                                         data-priority="{{ $note->priority ?? 'normal' }}" 
                                         data-read="{{ $note->read ? 'true' : 'false' }}" 
                                         style="animation-delay: {{ $loop->index * 0.1 }}s">
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
                                            <div class="notification-message">{{ $note->message }}</div>
                                            <div class="notification-time">
                                                <i class="mdi mdi-clock-outline me-1"></i>
                                                {{ $note->created_at->diffForHumans() }} • {{ $note->created_at->format('M j, Y • h:i A') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
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
