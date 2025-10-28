@include('admin.navbar')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Enhanced Page Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <div class="mb-3 mb-md-0">
                <h1 class="h3 mb-1">User Profile Management</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $userProfile->name }} {{ $userProfile->lname }}</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.clear.account', $userProfile->id) }}" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i>Clear Account
                </a>
                <button class="btn btn-secondary" onclick="window.history.back()">
                    <i class="bi bi-arrow-left me-1"></i>Back
                </button>
            </div>
        </div>

        <!-- Alert Container -->
        <div class="alert-container mb-4">
            @if(session('success') || session('error'))
                <div class="alert alert-dismissible fade show custom-alert 
                    {{ session('success') ? 'alert-success' : 'alert-danger' }}" 
                    role="alert" id="flashAlert">
                    @if(session('success'))
                        <strong>✅ Success!</strong> {{ session('success') }}
                    @else
                        <strong>❌ Error!</strong> {{ session('error') }}
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="row">
            <!-- Left Column - Enhanced Profile Card -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <!-- Profile Photo -->
                        <div class="position-relative mb-3 mx-auto" style="width: 150px; height: 150px;">
                            <div class="rounded-circle shadow w-100 h-100 d-flex align-items-center justify-content-center bg-primary text-white fw-bold fs-4">
                                {{ strtoupper(substr($userProfile->name, 0, 1) . substr($userProfile->lname, 0, 1)) }}
                            </div>
                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-3 border-white">
                                <i class="fas fa-check text-white"></i>
                            </span>
                        </div>
                        <h3 class="mb-1">{{ $userProfile->name }} {{ $userProfile->lname }}</h3>
                        <p class="text-muted mb-3">{{ $userProfile->email }}</p>
                        <p class="text-muted mb-3"> Signal Strength:{{ $userProfile->signal_strength }}</p>
                        
                        <!-- Contact Buttons -->
                        <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                            <a href="mailto:{{ $userProfile->email }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-envelope me-1"></i> Email
                            </a>

                            
                            {{-- <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#updateTaxCodeModal">
                                <i class="bi bi-receipt me-1"></i> Tax Code
                            </button> --}}
                        </div>
                        
                        <hr>
                        
                        <!-- Verification Status Cards -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="card bg-success bg-opacity-10 border-success h-100">
                                    <div class="card-body p-2 text-center">
                                        <h6 class="card-title text-success mb-1">Status</h6>
                                        <p class="card-text fw-bold fs-5 mb-0">
                                            <i class="bi bi-check-circle"></i> Active
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-info bg-opacity-10 border-info h-100">
                                    <div class="card-body p-2 text-center">
                                        <h6 class="card-title text-info mb-1">KYC</h6>
                                        <p class="card-text fw-bold fs-5 mb-0">
                                            <i class="bi bi-shield-check"></i> Verified
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Summary Card -->
                        <div class="card shadow-sm border-0 mt-3">
                            <div class="card-header bg-primary text-white py-2">
                                <h6 class="mb-0"><i class="bi bi-graph-up me-2"></i>Financial Summary</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="financial-list">
                                    <div class="financial-item d-flex justify-content-between align-items-center py-2 border-bottom">
                                        <span class="fw-medium">Total Balance:</span>
                                        <span class="text-success fw-bold">${{ number_format($user_balance, 2) }}</span>
                                    </div>
                                    <div class="financial-item d-flex justify-content-between align-items-center py-2 border-bottom">
                                        <span class="fw-medium">Total Profit:</span>
                                        <span class="text-primary fw-bold">${{ number_format($totalProfit, 2) }}</span>
                                    </div>
                                    <div class="financial-item d-flex justify-content-between align-items-center py-2 border-bottom">
                                        <span class="fw-medium">Total Deposit:</span>
                                        <span class="text-info fw-bold">${{ number_format($totalDeposit, 2) }}</span>
                                    </div>
                                    <div class="financial-item d-flex justify-content-between align-items-center py-2 border-bottom">
                                        <span class="fw-medium">Total Withdrawals:</span>
                                        <span class="text-warning fw-bold">${{ number_format($totalWithdrawal, 2) }}</span>
                                    </div>
                                    <div class="financial-item d-flex justify-content-between align-items-center py-2 border-bottom">
                                        <span class="fw-medium">Total Bonus:</span>
                                        <span class="text-purple fw-bold">${{ number_format($totalBonus, 2) }}</span>
                                    </div>


                                    <div class="financial-item d-flex justify-content-between align-items-center py-2 border-bottom">
                                        <span class="fw-medium">Escrow Amount:</span>
                                        <span class="text-purple fw-bold">{{ $userProfile->update_escrow }}</span>
                                    </div>

                                     <div class="financial-item d-flex justify-content-between align-items-center py-2 border-bottom">
                                        <span class="fw-medium">Trade Fee:</span>
                                        <span class="text-purple fw-bold">{{ $userProfile->update_trade_fee }}</span>
                                    </div>

                                    

                                    {{-- <div class="financial-item d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-medium">Total Earnings:</span>
                                        <span class="text-success fw-bold">${{ number_format($totalEarning, 2) }}</span>
                                    </div> --}}

                                     {{-- <div class="financial-item d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-medium">Signal Strength:</span>
                                        <span class="text-success fw-bold">{{ $userProfile->signal_strength }}</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Enhanced User Details -->
            <div class="col-lg-8">
                <!-- Personal Information Card -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0"><i class="bi bi-person me-2"></i>Personal Information</h5>
                        <span class="badge bg-success">Verified</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">First Name</label>
                                <div class="fw-semibold">{{ $userProfile->name }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Last Name</label>
                                <div class="fw-semibold">{{ $userProfile->lname }}</div>
                            </div>

                             <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Country</label>
                                <div class="fw-semibold">{{ $userProfile->country }}</div>
                            </div>

                             <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Phone</label>
                                <div class="fw-semibold">{{ $userProfile->phone }}</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Email Address</label>
                                <div class="fw-semibold d-flex align-items-center">
                                    {{ $userProfile->email }}
                                    <span class="badge bg-success ms-2">Verified</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Trade Fee</label>
                                <div class="fw-semibold">${{ number_format($userProfile->update_trade_fee ?? 0, 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-lightning-charge me-2"></i>Quick Actions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Financial Actions -->
                            <div class="col-md-6">
                                <h6 class="section-title text-muted mb-3">Financial Operations</h6>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-success text-start" data-bs-toggle="modal" data-bs-target="#addDepositModal">
                                        <i class="bi bi-plus-circle me-2"></i>Add Deposit
                                    </button>
                                    <button type="button" class="btn btn-danger text-start" data-bs-toggle="modal" data-bs-target="#addReferralBonusModal">
                                        <i class="bi bi-gift me-2"></i>Add Referral Bonus
                                    </button>
                                    <button type="button" class="btn btn-info text-start" data-bs-toggle="modal" data-bs-target="#topUpProfitModal">
                                        <i class="bi bi-arrow-up-circle me-2"></i>Top Up Profit
                                    </button>
                                    <button type="button" class="btn btn-warning text-start" data-bs-toggle="modal" data-bs-target="#debitProfitModal">
                                        <i class="bi bi-arrow-down-circle me-2"></i>Debit Profit
                                    </button>
                                </div>
                            </div>

                            <!-- User Settings -->
                            <div class="col-md-6">
                                <h6 class="section-title text-muted mb-3">User Settings</h6>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-primary text-start" data-bs-toggle="modal" data-bs-target="#updateSignalStrengthModal">
                                        <i class="bi bi-broadcast me-2"></i>Update Signal Strength
                                    </button>
                                    <button type="button" class="btn btn-secondary text-start" data-bs-toggle="modal" data-bs-target="#updateNotificationModal">
                                        <i class="bi bi-bell me-2"></i>Update Notification
                                    </button>
                                    <button type="button" class="btn btn-dark text-start" data-bs-toggle="modal" data-bs-target="#updateEscrowAmountModal">
                                        <i class="bi bi-shield-lock me-2"></i>Update Escrow Amount
                                    </button>
                                    <button type="button" class="btn btn-light text-start border" data-bs-toggle="modal" data-bs-target="#updateTradeFeeModal">
                                        <i class="bi bi-currency-dollar me-2"></i>Update Trade Fee
                                    </button>
                                    {{-- <button type="button" class="btn btn-outline-primary text-start" data-bs-toggle="modal" data-bs-target="#updateWithdrawalChargeModal">
                                        <i class="bi bi-credit-card me-2"></i>Update Withdrawal Charge
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Account Activity Section -->
                <div class="card">
                    <div class="card-header bg-white p-0">
                        <ul class="nav nav-tabs card-header-tabs flex-nowrap overflow-auto" id="activityTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active px-4 py-3 fw-bold" id="deposit-tab" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab">
                                    <i class="bi bi-arrow-down-circle me-2"></i> Deposits
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-3 fw-bold" id="withdrawal-tab" data-bs-toggle="tab" data-bs-target="#withdrawal" type="button" role="tab">
                                    <i class="bi bi-arrow-up-circle me-2"></i> Withdrawals
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-3 fw-bold" id="investment-tab" data-bs-toggle="tab" data-bs-target="#investment" type="button" role="tab">
                                    <i class="bi bi-graph-up me-2"></i> Investments
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-3 fw-bold" id="earning-tab" data-bs-toggle="tab" data-bs-target="#earning" type="button" role="tab">
                                    <i class="bi bi-currency-dollar me-2"></i> Earnings
                                </button>
                            </li>
                            @if(isset($kyc) && $kyc->count() > 0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-3 fw-bold" id="kyc-tab" data-bs-toggle="tab" data-bs-target="#kyc" type="button" role="tab">
                                    <i class="bi bi-shield-check me-2"></i> KYC
                                </button>
                            </li>
                            @endif
                            @if(isset($user_payment_proof) && $user_payment_proof->count() > 0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-3 fw-bold" id="proofs-tab" data-bs-toggle="tab" data-bs-target="#proofs" type="button" role="tab">
                                    <i class="bi bi-receipt me-2"></i> Payment Proofs
                                </button>
                            </li>
                            @endif
                        </ul>
                    </div>

                    <div class="card-body p-0">
                        <div class="tab-content p-3" id="activityTabsContent">
                            <!-- Deposit Tab -->
                            <div class="tab-pane fade show active" id="deposit" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Method</th>
                                                <th>Amount</th>
                                                <th>Transaction ID</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($deposit as $depositItem)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($depositItem->created_at)->format('M j, Y') }}</td>
                                                <td>{{ $depositItem->payment_method }}</td>
                                                <td class="fw-bold">${{ number_format($depositItem->amount, 2) }}</td>
                                                <td><code>{{ $depositItem->transaction_id ?? 'N/A' }}</code></td>
                                                <td>
                                                    @if ($depositItem->status == '1')
                                                    <span class="badge bg-success">Completed</span>
                                                    @elseif($depositItem->status == '0')
                                                    <span class="badge bg-warning">Pending</span>
                                                    @else
                                                    <span class="badge bg-danger">Declined</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <form action="{{ route('admin.approve.deposit', $depositItem->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                        </form>
                                                        <form action="{{ route('admin.decline.deposit', $depositItem->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Withdrawal Tab -->
                            <div class="tab-pane fade" id="withdrawal" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Wallet Address</th>
                                                <th>Transaction ID</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($withdrawal as $withdrawalItem)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($withdrawalItem->created_at)->format('M j, Y') }}</td>
                                                <td class="fw-bold">${{ number_format($withdrawalItem->amount, 2) }}</td>
                                                <td><small>{{ $withdrawalItem->wallet_address }}</small></td>
                                                <td><code>{{ $withdrawalItem->transaction_id }}</code></td>
                                                <td>
                                                    @if ($withdrawalItem->status == '1')
                                                    <span class="badge bg-success">Completed</span>
                                                    @elseif($withdrawalItem->status == '0')
                                                    <span class="badge bg-warning">Pending</span>
                                                    @else
                                                    <span class="badge bg-danger">Declined</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <form action="{{ route('admin.approve.withdrawal', $withdrawalItem->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                        </form>
                                                        <form action="{{ route('admin.decline.withdrawal', $withdrawalItem->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Investment Tab -->
                            <div class="tab-pane fade" id="investment" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Package</th>
                                                <th>Amount</th>
                                                <th>Duration</th>
                                                <th>Status</th>
                                                <th>Start Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($plan as $planItem)
                                            <tr>
                                                <td class="fw-medium">{{ $planItem->plan_name }}</td>
                                                <td class="fw-bold">${{ number_format($planItem->amount, 2) }}</td>
                                                <td>{{ $planItem->plan_duration }}</td>
                                                <td>
                                                    @if($planItem->status == '0')
                                                    <span class="badge bg-danger">Inactive</span>
                                                    @else
                                                    <span class="badge bg-success">Active</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($planItem->created_at)->format('M j, Y') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Earning Tab -->
                            <div class="tab-pane fade" id="earning" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Transaction ID</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($earning as $earningItem)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($earningItem->created_at)->format('M j, Y') }}</td>
                                                <td><code>{{ $earningItem->transaction_id }}</code></td>
                                                <td class="fw-bold text-success">${{ number_format($earningItem->amount, 2) }}</td>
                                                <td>{{ $earningItem->description }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- KYC Tab -->
                            @if(isset($kyc) && $kyc->count() > 0)
                            <div class="tab-pane fade" id="kyc" role="tabpanel">
                                <div class="row g-3">
                                    @foreach($kyc as $kycItem)
                                    <div class="col-md-6">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <div class="document-item text-center">
                                                            <p class="small fw-bold mb-2">ID Card Front</p>
                                                            @if($kycItem->id_card)
                                                                <img src="{{ asset('uploads/kyc/' . $kycItem->id_card) }}" class="img-thumbnail w-100" style="max-height: 200px; object-fit: contain;">
                                                            @else
                                                                <div class="text-muted">No Image</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="document-item text-center">
                                                            <p class="small fw-bold mb-2">ID Card Back</p>
                                                            @if($kycItem->passport)
                                                                <img src="{{ asset('uploads/kyc/' . $kycItem->passport) }}" class="img-thumbnail w-100" style="max-height: 200px; object-fit: contain;">
                                                            @else
                                                                <div class="text-muted">No Image</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-center">
                                                    <span class="badge 
                                                        @if($kycItem->kyc_status == '1') bg-success
                                                        @elseif($kycItem->kyc_status == '2') bg-danger
                                                        @else bg-warning @endif">
                                                        @if($kycItem->kyc_status == '1') Approved
                                                        @elseif($kycItem->kyc_status == '2') Declined
                                                        @else Pending @endif
                                                    </span>
                                                </div>
                                                <div class="mt-3 text-center">
                                                    <form action="{{ route('admin.accept.kyc', $kycItem->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                    </form>
                                                    <form action="{{ route('admin.decline.kyc', $kycItem->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Payment Proofs Tab -->
                            @if(isset($user_payment_proof) && $user_payment_proof->count() > 0)
                            <div class="tab-pane fade" id="proofs" role="tabpanel">
                                <div class="row g-3">
                                    @foreach ($user_payment_proof as $proof)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <small class="text-muted d-block mb-2">{{ \Carbon\Carbon::parse($proof->created_at)->format('M j, Y H:i') }}</small>
                                                    @php
                                                        $extension = strtolower(pathinfo($proof->file_path, PATHINFO_EXTENSION));
                                                    @endphp
                                                    @if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
                                                        <img src="{{ asset($proof->file_path) }}" class="img-fluid rounded border" alt="Payment Proof" style="max-height: 200px;">
                                                    @elseif($extension === 'pdf')
                                                        <div class="text-center">
                                                            <i class="bi bi-file-earmark-pdf display-4 text-danger"></i>
                                                            <p class="mt-2">PDF Document</p>
                                                            <a href="{{ asset($proof->file_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">View PDF</a>
                                                        </div>
                                                    @else
                                                        <div class="text-center">
                                                            <i class="bi bi-file-earmark display-4 text-secondary"></i>
                                                            <p class="mt-2">{{ basename($proof->file_path) }}</p>
                                                            <a href="{{ asset($proof->file_path) }}" target="_blank" class="btn btn-outline-secondary btn-sm">Download</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- All Modals -->
    <!-- Add Deposit Modal -->
    <div class="modal fade" id="addDepositModal" tabindex="-1" aria-labelledby="addDepositModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="addDepositModalTitle">Add User Deposit</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.add.deposit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Amount</label>
                            <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Payment Method</label>
                            <input type="text" class="form-control" name="payment_method" value="Bitcoin">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deposit Date</label>
                            <input type="date" name="deposit_date" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Transaction ID / Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter transaction details..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Deposit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Referral Bonus Modal -->
    <div class="modal fade" id="addReferralBonusModal" tabindex="-1" aria-labelledby="addReferralBonusModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="addReferralBonusModalTitle">Add {{$userProfile->name}} Bonus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.add.referral')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Bonus Amount</label>
                            <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter bonus amount" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter bonus description..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Add Bonus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Top Up Profit Modal -->
    <div class="modal fade" id="topUpProfitModal" tabindex="-1" aria-labelledby="topUpProfitModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="topUpProfitModalTitle">Top Up {{$userProfile->name}} Profit</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.add.profit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Profit Amount</label>
                            <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter profit amount" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter profit description..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Top Up Profit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Debit Profit Modal -->
    <div class="modal fade" id="debitProfitModal" tabindex="-1" aria-labelledby="debitProfitModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="debitProfitModalTitle">Debit {{$userProfile->name}} Total Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.debit.profit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Debit Amount</label>
                            <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter debit amount" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter debit reason..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Debit Profit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Signal Strength Modal -->
    <div class="modal fade" id="updateSignalStrengthModal" tabindex="-1" aria-labelledby="updateSignalStrengthModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="updateSignalStrengthModalTitle">Update {{$userProfile->name}} Signal Strength</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.signal.strength',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Signal Strength</label>
                            <input type="number" step="0.0000000001" name="signal_strength" class="form-control" value="{{$userProfile->signal_strength}}" min="1" max="100" style="color:blue" placeholder="E.g 40" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Signal Strength</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <!-- Update Withdrawal Charge Modal -->
    <div class="modal fade" id="updateWithdrawalChargeModal" tabindex="-1" aria-labelledby="updateWithdrawalChargeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="updateWithdrawalChargeModalTitle">Update {{$userProfile->name}} Withdrawal Charge</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('withdrawal.charge',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Withdrawal Charge</label>
                            <input type="text" name="withdrawal_charge" class="form-control" value="{{$userProfile->withdrawal_charge}}" style="color:blue" placeholder="E.g 100" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Withdrawal Charge</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Update Notification Modal -->
    <div class="modal fade" id="updateNotificationModal" tabindex="-1" aria-labelledby="updateNotificationModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="updateNotificationModalTitle">Update {{$userProfile->name}} Notification</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.update.notification',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Current Notification</label>
                            <p class="text-muted">{{$userProfile->update_notification ?? 'No notification set'}}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">New Notification Message</label>
                            <textarea name="update_notification" class="form-control" rows="3" placeholder="Enter new notification message...">{{$userProfile->update_notification}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Notification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Escrow Amount Modal -->
    <div class="modal fade" id="updateEscrowAmountModal" tabindex="-1" aria-labelledby="updateEscrowAmountModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="updateEscrowAmountModalTitle">Update {{$userProfile->name}} Escrow Amount</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.update.escrow',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Escrow Amount</label>
                            <input type="number" step="0.0000000001" name="update_escrow" class="form-control" value="{{$userProfile->update_escrow}}" style="color:blue" placeholder="E.g 40" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-dark">Update Escrow Balance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Trade Fee Modal -->
    <div class="modal fade" id="updateTradeFeeModal" tabindex="-1" aria-labelledby="updateTradeFeeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light text-dark">
                    <h5 class="modal-title" id="updateTradeFeeModalTitle">Update {{$userProfile->name}} Trade Fee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.update.tradefee',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Trade Fee</label>
                            <input type="number" step="0.0000000001" name="update_trade_fee" class="form-control" value="{{$userProfile->update_trade_fee}}" style="color:blue" placeholder="E.g 40" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Trade Fee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            // Toggle sidebar
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            });
            
            // Close sidebar when overlay is clicked
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                const alert = document.getElementById('flashAlert');
                if (alert) {
                    alert.classList.remove('show');
                    setTimeout(() => alert.remove(), 150);
                }
            }, 5000);
            
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
</body>
</html>