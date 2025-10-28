@include('admin.header')
<div class="main-content" id="mainContent">
    <!-- Enhanced Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="h3 mb-1">Loan Management</h1>
            <p class="text-muted mb-0">Review and manage all loan applications</p>
        </div>
        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <button class="btn btn-primary d-flex align-items-center justify-content-center">
                <i class="fas fa-download me-2"></i>Export Transactions
            </button>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-sliders-h me-2"></i>Filters
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="filterDropdown">
                    <li><h6 class="dropdown-header">Filter Options</h6></li>
                    <li><a class="dropdown-item" href="#">All Loans</a></li>
                    <li><a class="dropdown-item" href="#">Pending Approval</a></li>
                    <li><a class="dropdown-item" href="#">Approved Loans</a></li>
                    <li><a class="dropdown-item" href="#">By Loan Type</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Custom Filter</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Enhanced Transactions Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                <h5 class="mb-0 d-flex align-items-center">
                    <i class="fas fa-list-alt text-primary me-2"></i>Loan Applications
                </h5>
                <div class="w-100 w-md-auto position-relative">
                    <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" class="form-control ps-5" placeholder="Search loans by ID, name, SSN...">
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Reference Number <i class="fas fa-sort ms-1 text-muted"></i></th>
                            <th>Amount <i class="fas fa-sort ms-1 text-muted"></i></th>
                            <th>Borrower</th>
                            <th>SSN</th>
                            <th>Loan Type</th>
                            <th>Credit Score</th>
                            <th>Status</th>
                            <th class="pe-4">Date <i class="fas fa-sort ms-1 text-muted"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $creditScoreFigures = [
                                'excellent' => '750+',
                                'good' => '700-749',
                                'fair' => '650-699',
                                'poor' => '600-649',
                                'bad' => 'Below 600',
                                'unknown' => 'Unknown'
                            ];
                        @endphp

                        @foreach($user_loans as $loans)
                        <tr class="border-top border-bottom">
                            <td class="ps-4 fw-semibold">{{ $loans->reference_number }}</td>
                            <td class="fw-semibold">${{ number_format($loans->loan_amount, 2, '.', ',') }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm bg-light-primary rounded-circle me-2">
                                        <span>{{ substr($loans->first_name, 0, 1) }}{{ substr($loans->last_name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $loans->first_name }} {{ $loans->last_name }}</div>
                                        <small class="text-muted">{{ $loans->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{($loans->ssn)}}</td>
                            <td>
                                <span class="badge bg-light-primary text-primary">
                                    {{ $loans->loan_type }}
                                </span>
                            </td>  
                            <td>
                                @php
                                    $scoreClass = [
                                        'excellent' => 'bg-light-success text-success',
                                        'good' => 'bg-light-info text-info',
                                        'fair' => 'bg-light-warning text-warning',
                                        'poor' => 'bg-light-orange text-orange',
                                        'bad' => 'bg-light-danger text-danger',
                                        'unknown' => 'bg-light-secondary text-secondary'
                                    ][$loans->credit_score_range] ?? 'bg-light-secondary text-secondary';
                                @endphp
                                <span class="badge {{ $scoreClass }}">
                                    {{ $creditScoreFigures[$loans->credit_score_range] ?? 'Unknown' }}
                                </span>
                            </td>
                            <td>
                                @if ($loans->status == '1')
                                    <span class="badge bg-success rounded-pill px-2 py-1">
                                        <i class="fas fa-check-circle me-1"></i> Approved
                                    </span>
                                @elseif($loans->status == '0')
                                    <span class="badge bg-warning rounded-pill px-2 py-1">
                                        <i class="fas fa-clock me-1"></i> Pending
                                    </span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-2 py-1">
                                        <i class="fas fa-question-circle me-1"></i> Unknown
                                    </span>
                                @endif
                            </td>
                            <td class="pe-4">
                                <div class="text-muted small">
                                    {{ \Carbon\Carbon::parse($loans->created_at)->format('M j, Y') }}
                                </div>
                                <div class="text-muted small">
                                    {{ \Carbon\Carbon::parse($loans->created_at)->format('g:i A') }}
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($user_loans->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No loan applications found</h5>
                                    <p class="text-muted small">When new loans are submitted, they'll appear here</p>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <!-- Enhanced Pagination -->
            {{-- @if($user_loans->hasPages())
            <div class="card-footer bg-white border-top">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0 text-muted small">
                        Showing <span class="fw-semibold">{{ $user_loans->firstItem() ?? 0 }}</span> to 
                        <span class="fw-semibold">{{ $user_loans->lastItem() ?? 0 }}</span> of 
                        <span class="fw-semibold">{{ $user_loans->total() }}</span> entries
                    </div>
                    
                    <nav aria-label="Page navigation">
                        {{ $user_loans->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
            @endif --}}
        </div>
    </div>
</div>

<style>
    /* Custom styles */
    .avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .avatar span {
        line-height: 1;
    }
    
    .bg-light-orange {
        background-color: rgba(253, 126, 20, 0.1) !important;
        color: #fd7e14 !important;
    }
    
    .card {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    
    .table {
        margin-bottom: 0;
    }
    
    .table th, .table td {
        vertical-align: middle;
        padding: 1rem;
    }
    
    .table thead th {
        border-bottom: none;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        color: #6c757d;
    }
    
    .badge.rounded-pill {
        padding: 0.35em 0.65em;
        font-size: 0.75em;
        font-weight: 500;
    }
    
    .pagination .page-link {
        border-radius: 0.375rem !important;
        margin: 0 0.15rem;
        min-width: 2.5rem;
        text-align: center;
    }
    
    .dropdown-menu {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }
</style>

@include('admin.footer')