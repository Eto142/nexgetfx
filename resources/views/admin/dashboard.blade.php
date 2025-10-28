@include('admin.header')
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Admin Dashboard</h1>
            <div class="text-muted small">Last updated: {{ now()->format('M j, Y g:i A') }}</div>
        </div>

        @if(session('status') || session('message'))
        <div class="alert-container">
            <div class="alert alert-{{ session('status') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                <div class="alert-content">
                    <div class="alert-icon">
                        @if(session('status'))
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        @endif
                    </div>
                    <div class="alert-text">
                        {{ session('status') ?? session('message') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="alert-progress"></div>
            </div>
        </div>
        @endif

        <!-- Dashboard Sections -->
        <div class="dashboard-container">
            <!-- Stats Section -->
            <div class="card mb-4">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0">Platform Statistics</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <!-- User Stats -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="card stat-card bg-primary bg-opacity-10 border-primary h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="value fs-3 fw-bold">{{ number_format($totalUsersCount) }}</div>
                                            <div class="label text-muted">Total Users</div>
                                        </div>
                                        <div class="bg-primary bg-opacity-25 p-3 rounded">
                                            <i class="fas fa-users text-primary fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-success fw-semibold">
                                            <i class="fas fa-arrow-up"></i> 
                                            {{ number_format($newUsersCount) }} new
                                        </span>
                                        <span class="text-muted">this week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Financial Stats -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="card stat-card bg-success bg-opacity-10 border-success h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="value fs-3 fw-bold"> {{ number_format($totalDepositCount) }}</div>
                                            <div class="label text-muted">Total Deposits</div>
                                        </div>
                                        <div class="bg-success bg-opacity-25 p-3 rounded">
                                            <i class="fas fa-money-bill-wave text-success fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-muted">All time transactions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Transaction Stats -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="card stat-card bg-info bg-opacity-10 border-info h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="value fs-3 fw-bold">{{ $totalWithdrawalCount }}</div>
                                            <div class="label text-muted">Total Withdrawals</div>
                                        </div>
                                        <div class="bg-info bg-opacity-25 p-3 rounded">
                                            <i class="fas fa-exchange-alt text-info fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-muted"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Escrow Stats -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="card stat-card bg-danger bg-opacity-10 border-danger h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="value fs-3 fw-bold">{{ number_format($totalPlanCount) }}</div>
                                            <div class="label text-muted">Total Plan </div>
                                        </div>
                                        <div class="bg-danger bg-opacity-25 p-3 rounded">
                                            <i class="fas fa-hand-holding-usd text-danger fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-muted">Currently active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Secondary Stats Row -->
                    <div class="row mt-3">
                        <div class="col-md-4 col-lg-3 mb-3">
                            <div class="card stat-card bg-secondary bg-opacity-10 border-secondary h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="value fs-3 fw-bold">{{ $totalTransactionCount }}</div>
                                            <div class="label text-muted">Total Transactions</div>
                                        </div>
                                        <div class="bg-secondary bg-opacity-25 p-3 rounded">
                                            <i class="fas fa-university text-secondary fs-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            <!-- Recent Users Section -->
            <div class="card mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Users</h5>
                    <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Joined</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentUsers as $user)
                                <tr>
                                    <td>#{{ $user->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-placeholder bg-primary text-white rounded-circle me-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="fw-semibold">{{ $user->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('M j, Y') }}</td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.profile', $user->id) }}" class="btn btn-outline-primary" title="View" data-bs-toggle="tooltip">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="mailto:{{ $user->email }}" class="btn btn-outline-success" title="Send Email" data-bs-toggle="tooltip">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                            <form action="{{route('admin.delete', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger" title="Delete" data-bs-toggle="tooltip">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No users registered yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Initialize tooltips -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        })
    </script>

    <style>
        /* Dashboard Container */
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        /* Stat Cards */
        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 10px;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card .value {
            color: var(--bs-dark);
        }
        
        .stat-card .label {
            font-size: 0.85rem;
        }
        
        /* Custom Colors */
        .bg-purple {
            background-color: #6f42c1;
        }
        
        .border-purple {
            border-color: #6f42c1 !important;
        }
        
        .text-purple {
            color: #6f42c1 !important;
        }
        
        .bg-teal {
            background-color: #20c997;
        }
        
        .border-teal {
            border-color: #20c997 !important;
        }
        
        .text-teal {
            color: #20c997 !important;
        }
        
        /* Table Improvements */
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table thead th {
            border-bottom-width: 1px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            color: #6c757d;
        }
        
        .table tbody tr {
            transition: background-color 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }
        
        /* Avatar Placeholder */
        .avatar-placeholder {
            font-weight: 600;
            font-size: 0.875rem;
        }
        
        /* Alert System */
        .alert-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 100%;
            max-width: 400px;
            padding: 0 15px;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 1rem;
        }
        
        .alert-content {
            display: flex;
            align-items: center;
            padding: 15px;
            position: relative;
        }
        
        .alert-icon {
            margin-right: 12px;
            display: flex;
            align-items: center;
        }
        
        .alert-icon svg {
            width: 20px;
            height: 20px;
        }
        
        .alert-text {
            flex: 1;
            font-size: 14px;
            line-height: 1.4;
        }
        
        .btn-close {
            background: none;
            border: none;
            padding: 0;
            margin-left: 12px;
            opacity: 0.7;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        
        .btn-close:hover {
            opacity: 1;
        }
        
        .btn-close svg {
            width: 16px;
            height: 16px;
        }
        
        .alert-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.3);
            animation: progressBar 5s linear forwards;
        }
        
        @keyframes progressBar {
            0% { width: 100%; }
            100% { width: 0%; }
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .stat-card {
                margin-bottom: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .alert-container {
                top: 10px;
                right: 10px;
                left: 10px;
                max-width: none;
            }
            
            .alert-content {
                padding: 12px;
            }
            
            .alert-text {
                font-size: 13px;
            }
            
            .card-header h5 {
                font-size: 1.1rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-dismiss alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
                    alert.style.transform = 'translateX(100%)';
                    alert.style.opacity = '0';
                    
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 5000);
                
                // Pause animation on hover
                alert.addEventListener('mouseenter', () => {
                    alert.querySelector('.alert-progress').style.animationPlayState = 'paused';
                });
                
                alert.addEventListener('mouseleave', () => {
                    alert.querySelector('.alert-progress').style.animationPlayState = 'running';
                });
            });
        });
    </script>

@include('admin.footer')