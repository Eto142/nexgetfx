@include('manager.header')
@include('manager.navbar')
<!-- Sidebar wrapper end -->

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

	<!-- Main header starts -->
	<div class="main-header d-flex align-items-center justify-content-between position-relative">
		<div class="d-flex align-items-center justify-content-center">
			<div class="page-icon">
				<i class="bi bi-window-split"></i>
			</div>
			<div class="page-title d-none d-md-block">
				<h5>Data Tables</h5>
			</div>
		</div>
		<!-- Live updates start -->
		<ul class="updates d-flex align-items-end flex-column overflow-hidden" id="updates">
			<li>
				<a href="javascript:void(0)">
					<i class="bi bi-envelope-paper text-red font-1x me-2"></i>
					<span>12 emails from David Michaiah.</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
					<i class="bi bi-bar-chart text-blue font-1x me-2"></i>
					<span>15 new features updated successfully.</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
					<i class="bi bi-folder-check text-yellow font-1x me-2"></i>
					<span>The media folder is created successfully.</span>
				</a>
			</li>
		</ul>
		<!-- Live updates end -->
	</div>
	<!-- Main header ends -->

	<!-- Content wrapper start -->
	<div class="content-wrapper">

		<!-- Row start -->
		<div class="row gx-3">
			<div class="col-sm-12 col-12">
				<!-- Card start -->
				<div class="card">
					<div class="card-header">
						<div class="card-title">Transaction History</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="highlightRowColumn" class="table custom-table">
								<thead>
									<tr>
										<th>Transaction ID</th>
										<th>Transaction Type</th>
										<th>Description</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Date</th>

									</tr>
								</thead>
								<tbody>

									@foreach($user_transactions as $transaction)
									<tr>

										<td>{{$transaction->transaction_ref}}</td>
										<td>{{$transaction->transaction_type}}</td>
										<td>{{$transaction->transaction_description}}</td>
										<td>{{number_format($transaction->transaction_amount, 2, '.', ',')}}</td>
										<td>
											@if ($transaction->transaction_status == '1')
											<span class="badge shade-light-green">Completed</span>
											@elseif($transaction->transaction_status == '0')
											<span class="badge shade-light-red">Pending</span>
											@endif
										</td>
										<td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('D, M j, Y g:i
											A') }}</td>

									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Card end -->




				<!-- Card end -->

				<!-- Card end -->
			</div>
		</div>

	</div>
	<!-- Content wrapper scroll end -->



	@include('manager.footer')