@include('dashboard.header')
<div class="content">
	<div class="container">
		<div class="page-title">
			<h3>Deposit History</h3>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="card">
				   <a href="{{url('deposit')}}"><button type="button" class="btn btn-icon icon-left btn-info mb-2"><i class="fas fa-info-circle"></i>Start a new Investment plan</button></a>
					<div class="card-body">
					<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Investment Amount</th>
										<th>Transaction ID</th>
										<th>Comment</th>
										<th>Method</th>
										<th>Status</th>
										<th>Date</th>

									</tr>
								</thead>
								<tbody>
						 
									<tr>
										
										<td style="color: red"></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>

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

@include('dashboard.footer')