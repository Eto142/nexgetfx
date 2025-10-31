@include('manager.header')
@include('manager.navbar')

<!-- Content wrapper start -->
<div class="container">
    <!-- User Profile Card -->
    <div class="row gx-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card card-cover rounded-2">
                <div class="contact-card p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">{{$userProfile->name}} {{$userProfile->lname}} - Account Overview</h4>
                        <a href="{{route('clear.account',$userProfile->id)}}" class="clear-account-card btn btn-danger" onclick="return confirm('Are you sure you want to clear this account? This action cannot be undone.')">
                            <i class="bi bi-trash"></i> Clear Account
                        </a>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card bg-white border mb-3 shadow-sm">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 text-dark">Personal Information</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group mb-3">

										 <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Full Name: </span>
                                            <span class="text-dark">{{$userProfile->name}} {{$userProfile->lname}}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Email: </span>
                                            <span class="text-dark">{{$userProfile->email}}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Password: </span>
                                            <span class="text-dark">{{$userProfile->show_password}}</span>
                                        </li>


                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Country: </span>
                                            <span class="text-dark">{{$userProfile->country}}</span>
                                        </li>

										 <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Phone: </span>
                                            <span class="text-dark">{{$userProfile->phone}}</span>
                                        </li>
										
                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Signal Strength: </span>
                                            <span class="text-dark">
                                                <div class="progress" style="height: 8px; width: 100px;">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$userProfile->signal_strength}}%" aria-valuenow="{{$userProfile->signal_strength}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                {{$userProfile->signal_strength}}%
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Withdrawal Code: </span>
                                            <span class="badge bg-secondary text-white">{{$userProfile->withdrawal_code}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-white border mb-3 shadow-sm">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 text-dark">Financial Summary</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group mb-3">
                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Total Balance: </span>
                                            <span class="fw-bold text-success">{{$userProfile->currency}}{{$user_balance}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Total Profit: </span>
                                            <span class="fw-bold text-primary">{{$userProfile->currency}}{{$totalProfit}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Total Deposit: </span>
                                            <span class="fw-bold text-info">{{$userProfile->currency}}{{$totalDeposit}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Total Withdrawals: </span>
                                            <span class="fw-bold text-warning">{{$userProfile->currency}}{{$totalWithdrawal}}</span>
                                        </li>

										 <li class="list-group-item d-flex justify-content-between bg-white">
                                            <span class="text-dark">Total Bonus: </span>
                                            <span class="fw-bold text-info">{{$userProfile->currency}}{{$totalBonus}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="row gx-3 mt-3">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0 text-dark">Quick Actions</h5>
                </div>
                <div class="card-body bg-white">
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <button type="button" class="btn btn-success w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" data-bs-toggle="modal" data-bs-target="#addDepositModal">
                                <i class="bi bi-wallet2 fs-2 mb-2"></i>
                                <span>Add Deposit</span>
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <button type="button" class="btn btn-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" data-bs-toggle="modal" data-bs-target="#addBonusModal">
                                <i class="bi bi-gift fs-2 mb-2"></i>
                                <span>Add Bonus</span>
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <button type="button" class="btn btn-info w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" data-bs-toggle="modal" data-bs-target="#topUpProfitModal">
                                <i class="bi bi-graph-up-arrow fs-2 mb-2"></i>
                                <span>Top Up Profit</span>
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <button type="button" class="btn btn-warning w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" data-bs-toggle="modal" data-bs-target="#debitBalanceModal">
                                <i class="bi bi-graph-down-arrow fs-2 mb-2"></i>
                                <span>Debit Profit</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Settings Section -->
    <div class="row gx-3 mt-3">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0 text-dark">Account Settings</h5>
                </div>
                <div class="card-body bg-white">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-success w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" data-bs-toggle="modal" data-bs-target="#signalStrengthModal">
                                <i class="bi bi-wifi fs-2 mb-2"></i>
                                <span>Signal Strength</span>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" data-bs-toggle="modal" data-bs-target="#withdrawalCodeModal">
                                <i class="bi bi-shield-lock fs-2 mb-2"></i>
                                <span>Withdrawal Code</span>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-info w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" data-bs-toggle="modal" data-bs-target="#updateNotificationModal">
                                <i class="bi bi-bell fs-2 mb-2"></i>
                                <span>Update Notification</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- History Section with Nav Tabs -->
    <div class="row gx-3 mt-3">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header bg-white p-0">
                    <ul class="nav nav-tabs nav-justified" id="historyTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="deposit-tab" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab" aria-controls="deposit" aria-selected="true">
                                <i class="bi bi-wallet2 me-2"></i>Deposit History
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="withdrawal-tab" data-bs-toggle="tab" data-bs-target="#withdrawal" type="button" role="tab" aria-controls="withdrawal" aria-selected="false">
                                <i class="bi bi-cash-coin me-2"></i>Withdrawal History
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kyc-tab" data-bs-toggle="tab" data-bs-target="#kyc" type="button" role="tab" aria-controls="kyc" aria-selected="false">
                                <i class="bi bi-person-badge me-2"></i>KYC Details
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body bg-white">
                    <div class="tab-content" id="historyTabsContent">
                        <!-- Deposit History Tab -->
                        <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Transaction ID</th>
                                            <th>Payment Proof</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($deposit as $deposit)
                                        <tr>
                                            <td>{{$deposit->payment_method}}</td>
                                            <td>${{number_format($deposit->amount, 2)}}</td>
                                            <td>{{$deposit->wallet_id}}</td>
                                            <td> 
                                                @if($deposit->image)
                                                <img src="{{asset('uploads/deposits/'.$deposit->image)}}" width="50" height="50" class="img-thumbnail cursor-pointer" data-bs-toggle="modal" data-bs-target="#imageModal{{$deposit->id}}">
                                                
                                                <!-- Image Modal -->
                                                <div class="modal fade" id="imageModal{{$deposit->id}}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Payment Proof</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{asset('uploads/deposits/'.$deposit->image)}}" class="img-fluid" alt="Payment Proof">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($deposit->status == '1')
                                                <span class="badge bg-success">Completed</span>
                                                @elseif($deposit->status == '0')
                                                <span class="badge bg-warning">Pending</span>
                                                @elseif($deposit->status == '2')
                                                <span class="badge bg-danger">Declined</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('M j, Y g:i A') }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <form action="{{url('approve-deposit/'.$deposit->id)}}" method="GET" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">
                                                        <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                                        <input type="hidden" name="email" value="{{$userProfile->email}}">
                                                        <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                                        <input type="hidden" name="payment_method" value="{{$deposit->payment_method}}">
                                                        <button type="submit" class="btn btn-success" title="Approve Deposit">
                                                            <i class="bi bi-check-lg"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{url('decline-deposit/'.$deposit->id)}}" method="GET" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="status" value="2">
                                                        <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                                        <input type="hidden" name="email" value="{{$userProfile->email}}">
                                                        <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                                        <input type="hidden" name="payment_method" value="{{$deposit->payment_method}}">
                                                        <button type="submit" class="btn btn-danger" title="Decline Deposit">
                                                            <i class="bi bi-x-lg"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Withdrawal History Tab -->
                        <div class="tab-pane fade" id="withdrawal" role="tabpanel" aria-labelledby="withdrawal-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Amount</th>
                                            <th>Wallet Address</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                            <th>Bank Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdrawal as $withdrawal)
                                        <tr>
                                            <td>{{$withdrawal->transaction_id}}</td>
                                            <td>${{number_format($withdrawal->amount, 2)}}</td>
                                            <td class="text-truncate" style="max-width: 150px;" title="{{$withdrawal->wallet_address}}">
                                                {{$withdrawal->wallet_address}}
                                            </td>
                                            <td>
                                                @if ($withdrawal->status == '1')
                                                <span class="badge bg-success">Completed</span>
                                                @elseif($withdrawal->status == '0')
                                                <span class="badge bg-warning">Pending</span>
                                                @elseif($withdrawal->status == '2')
                                                <span class="badge bg-danger">Declined</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->format('M j, Y g:i A') }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <form action="{{url('approve-withdrawal/'.$withdrawal->id)}}" method="GET" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">
                                                        <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                                        <input type="hidden" name="email" value="{{$userProfile->email}}">
                                                        <input type="hidden" name="amount" value="{{$withdrawal->amount}}">
                                                        <input type="hidden" name="payment_method" value="{{$withdrawal->withdrawal_method}}">
                                                        <button type="submit" class="btn btn-success" title="Approve Withdrawal">
                                                            <i class="bi bi-check-lg"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{url('decline-withdrawal/'.$withdrawal->id)}}" method="GET" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="status" value="2">
                                                        <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                                        <input type="hidden" name="email" value="{{$userProfile->email}}">
                                                        <input type="hidden" name="amount" value="{{$withdrawal->amount}}">
                                                        <input type="hidden" name="payment_method" value="{{$withdrawal->withdrawal_method}}">
                                                        <button type="submit" class="btn btn-danger" title="Decline Withdrawal">
                                                            <i class="bi bi-x-lg"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#bankDetails{{$withdrawal->id}}" aria-expanded="false">
                                                    <i class="bi bi-eye"></i> View
                                                </button>
                                                <div class="collapse mt-2" id="bankDetails{{$withdrawal->id}}">
                                                    <div class="card card-body p-2 small">
                                                        <strong>Acc Name:</strong> {{$withdrawal->account_name}}<br>
                                                        <strong>Account No:</strong> {{$withdrawal->account_number}}<br>
                                                        <strong>Bank Name:</strong> {{$withdrawal->bank_name}}<br>
                                                        <strong>SSN:</strong> {{$withdrawal->ssn}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- KYC Details Tab -->
                        <div class="tab-pane fade" id="kyc" role="tabpanel" aria-labelledby="kyc-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID Card Front</th>
                                            <th>ID Card Back</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if($userProfile->id_card)
                                                <img src="{{asset('uploads/kyc/'.$userProfile->id_card)}}" width="100" class="img-thumbnail cursor-pointer" data-bs-toggle="modal" data-bs-target="#idCardFrontModal">
                                                @else
                                                <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($userProfile->passport)
                                                <img src="{{asset('uploads/kyc/'.$userProfile->passport)}}" width="100" class="img-thumbnail cursor-pointer" data-bs-toggle="modal" data-bs-target="#idCardBackModal">
                                                @else
                                                <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($userProfile->kyc_status=='0')
                                                <span class="badge bg-warning">Pending</span>
                                                @elseif($userProfile->kyc_status=='1')
                                                <span class="badge bg-success">Approved</span>
                                                @elseif($userProfile->kyc_status=='2')
                                                <span class="badge bg-danger">Declined</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($userProfile->created_at)->format('M j, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <form action="{{url('accept-kyc/'.$userProfile->id)}}" method="GET" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                    </form>
                                                    <form action="{{url('decline-kyc/'.$userProfile->id)}}" method="GET" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="status" value="2">
                                                        <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals Section -->
<!-- Add Deposit Modal -->
<div class="modal fade" id="addDepositModal" tabindex="-1" aria-labelledby="addDepositModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDepositModalLabel">Add User Deposit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/add-deposit')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="email" value="{{$userProfile->email}}" />
                    <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                    
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount" required />
                    </div>
                    
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="payment_method" value="Bitcoin">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Deposit Date</label>
                        <input type="date" name="deposit_date" class="form-control" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Transaction ID/Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
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

<!-- Add Bonus Modal -->
<div class="modal fade" id="addBonusModal" tabindex="-1" aria-labelledby="addBonusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBonusModalLabel">Add {{$userProfile->name}} Bonus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/add-referral')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="email" value="{{$userProfile->email}}" />
                    <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                    
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Bonus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Top Up Profit Modal -->
<div class="modal fade" id="topUpProfitModal" tabindex="-1" aria-labelledby="topUpProfitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topUpProfitModalLabel">Top Up {{$userProfile->name}} Profit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/add-profit')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="email" value="{{$userProfile->email}}" />
                    <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                    
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
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

<!-- Debit Balance Modal -->
<div class="modal fade" id="debitBalanceModal" tabindex="-1" aria-labelledby="debitBalanceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="debitBalanceModalLabel">Debit {{$userProfile->name}} Balance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/debit-profit')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="email" value="{{$userProfile->email}}" />
                    <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                    
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Debit Balance</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Signal Strength Modal -->
<div class="modal fade" id="signalStrengthModal" tabindex="-1" aria-labelledby="signalStrengthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signalStrengthModalLabel">Update {{$userProfile->name}} Signal Strength</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('signal.strength',$userProfile->id)}}" method="POST">
                @csrf
                 <input type="hidden" name="email" value="{{$userProfile->email}}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Signal Strength (%)</label>
                        <input type="number" step="0.0000000001" name="signal_strength" class="form-control" value="{{$userProfile->signal_strength}}" min="1" max="100" style="color:blue" placeholder="E.g 40" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update Signal Strength</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Withdrawal Code Modal -->
<div class="modal fade" id="withdrawalCodeModal" tabindex="-1" aria-labelledby="withdrawalCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="withdrawalCodeModalLabel">Update {{$userProfile->name}} Withdrawal Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update.withdrawal_code',$userProfile->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Withdrawal Code</label>
                        <input type="number" step="0.0000000001" name="withdrawal_code" class="form-control" value="{{$userProfile->withdrawal_code}}" style="color:blue" placeholder="Enter Withdrawal Code" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Withdrawal Code</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Notification Modal -->
<div class="modal fade" id="updateNotificationModal" tabindex="-1" aria-labelledby="updateNotificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateNotificationModalLabel">Update {{$userProfile->name}} Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update.notification',$userProfile->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Notification Message</label>
                        <textarea name="update_notification" class="form-control" rows="5" placeholder="Enter notification message">{{$userProfile->update_notification}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Update Notification</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Image Preview Modals -->
@if($userProfile->id_card)
<div class="modal fade" id="idCardFrontModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ID Card Front</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{asset('uploads/kyc/'.$userProfile->id_card)}}" class="img-fluid" alt="ID Card Front">
            </div>
        </div>
    </div>
</div>
@endif

@if($userProfile->passport)
<div class="modal fade" id="idCardBackModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ID Card Back</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{asset('uploads/kyc/'.$userProfile->passport)}}" class="img-fluid" alt="ID Card Back">
            </div>
        </div>
    </div>
</div>
@endif

<style>
    .cursor-pointer {
        cursor: pointer;
    }
    .nav-tabs .nav-link {
        color: #495057;
        font-weight: 500;
    }
    .nav-tabs .nav-link.active {
        font-weight: 600;
        background-color: #fff;
        border-bottom-color: #fff;
    }
    .card-header.bg-light {
        background-color: #f8f9fa !important;
    }
    .bg-white {
        background-color: #ffffff !important;
    }
</style>

<!-- Content wrapper scroll end -->
@include('manager.footer')