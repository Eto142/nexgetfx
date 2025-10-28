@include('admin.header')
<div class="main-content" id="mainContent">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Deposit History</h1>
        <div>
            <button class="btn btn-primary">
                <i class="fas fa-download me-2"></i>Export Deposit History
            </button>
        </div>
    </div>

    <!-- Transactions Table Card -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Recent Deposits</h5>
            <div class="d-flex">
                <input type="text" class="form-control form-control-sm me-2" placeholder="Search deposits...">
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table table-hover mb-0" id="highlightRowColumn">
                    <thead class="table-light">
                        <tr>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Crypto Type</th>
                            <th>Proof</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach($user_deposits as $deposit)
    <tr>
        <td>{{ $deposit->id }}</td>
        <td>${{ number_format($deposit->amount, 2) }}</td>
        <td>{{ ucfirst($deposit->payment_method) }}</td>
        <td>
            @if($deposit->image)
                <a href="{{ asset($deposit->image) }}" target="_blank">
                    <img src="{{ asset($deposit->image) }}" alt="Proof" width="50" height="50" class="rounded shadow-sm">
                </a>
            @else
                <span class="text-muted">No proof</span>
            @endif
        </td>
        <td>
            @if($deposit->status == 'approved' || $deposit->status == 1)
                <span class="badge bg-success">Approved</span>
            @elseif($deposit->status == 'rejected' || $deposit->status == 2)
                <span class="badge bg-danger">Rejected</span>
            @else
                <span class="badge bg-warning">Pending</span>
            @endif
        </td>
        <td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('D, M j, Y g:i A') }}</td>
    </tr>
    @endforeach

    @if($user_deposits->isEmpty())
    <tr>
        <td colspan="6" class="text-center py-4">No deposits found</td>
    </tr>
    @endif
</tbody>

                </table>
            </div>
            
            <!-- Unified Pagination -->
            @if($user_deposits->hasPages())
            <div class="card-footer">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0 text-muted small">
                        Showing 
                        <span class="fw-semibold">{{ $user_deposits->firstItem() ?? 0 }}</span> 
                        to 
                        <span class="fw-semibold">{{ $user_deposits->lastItem() ?? 0 }}</span> 
                        of 
                        <span class="fw-semibold">{{ $user_deposits->total() }}</span> 
                        entries
                    </div>
                    
                    <div class="pagination-container">
                        {{ $user_deposits->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Custom pagination styles to match your design */
    .pagination-container .pagination {
        margin-bottom: 0;
    }
    
    .pagination-container .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    
    .pagination-container .page-link {
        color: #0d6efd;
        padding: 0.375rem 0.75rem;
    }
    
    .pagination-container .page-item:first-child .page-link,
    .pagination-container .page-item:last-child .page-link {
        border-radius: 0.25rem;
    }
</style>
@include('admin.footer')