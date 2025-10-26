@include('dashboard.header')
<div class="content">
	<div class="container">
		<div class="page-title">
			<h3>My Investments Earnings</h3>
		</div>
		<div class="row">
		  <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="olive fas fa-money-bill-alt"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail">
									<p class="detail-subtitle">Total Earnings</p>
									<span class="number">$ USD</span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							<div class="stats">
								
							</div>

						</div>
					</div>
				</div>
			</div>
		<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="olive fas fa-money-bill-alt"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail">
									<p class="detail-subtitle">Refferal Bonus</p>
									<span class="number">$ USD</span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							<div class="stats">
								
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-12">
				<div class="card">
				   <a href="{{('deposit')}}"><button type="button" class="btn btn-icon icon-left btn-info mb-2"><i class="fas fa-info-circle"></i>Start a new Investment plan</button></a>
					<div class="card-body">
					<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Earnings</th>
									</tr>
								</thead>
								<tbody>

	
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