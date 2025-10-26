@include('manager.header')
@include('manager.navbar')

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">
	@if (session('error'))
	<div class="alert box-bdr-red alert-dismissible fade show text-red" role="alert">
		<b>Error!</b>{{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@elseif (session('status'))
	<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
		<b>Success!</b> {{ session('status') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<!-- Main header starts -->

</div>
<!-- Row end -->

<!-- Row start -->
<div class="main-panel">
	<div class="content-wrapper">

		<!-- Enhanced Container with White Background -->
		<div class="container-fluid">
			<div class="row">
				<!-- Create Trader Section -->
				<div class="col-lg-4 col-md-12 mb-4">
					<div class="card bg-white border-0 shadow-sm h-100">
						<div class="card-header bg-white border-bottom">
							<h5 class="card-title mb-0 text-dark">
								<i class="bi bi-person-plus me-2"></i>Create New Trader
							</h5>
						</div>
						<div class="card-body">
							@if(session('message'))
							<div class="alert alert-success alert-dismissible fade show">
								<i class="bi bi-check-circle me-2"></i>{{ session('message') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							@endif

							<form action="{{ route('save.trader') }}" method="post" enctype="multipart/form-data">
								@csrf

								<div class="mb-3">
									<label for="name" class="form-label text-dark">Name:</label>
									<div class="input-group">
										<span class="input-group-text bg-light">
											<i class="bi bi-person text-dark"></i>
										</span>
										<input type="text" name="name" class="form-control" placeholder="Enter trader name" required>
									</div>
								</div>

								<div class="mb-3">
									<label for="win_rate" class="form-label text-dark">Win Rate:</label>
									<div class="input-group">
										<span class="input-group-text bg-light">
											<i class="bi bi-graph-up text-dark"></i>
										</span>
										<input type="text" name="win_rate" class="form-control" placeholder="Enter win rate" required>
									</div>
								</div>

								<div class="mb-3">
									<label for="gains" class="form-label text-dark">Profit Share:</label>
									<div class="input-group">
										<span class="input-group-text bg-light">
											<i class="bi bi-percent text-dark"></i>
										</span>
										<input type="text" name="profit_share" class="form-control" placeholder="Enter profit share" required>
									</div>
								</div>

								<div class="mb-3">
									<label for="image" class="form-label text-dark">Image:</label>
									<div class="input-group">
										<span class="input-group-text bg-light">
											<i class="bi bi-image text-dark"></i>
										</span>
										<input type="file" name="image" class="form-control">
									</div>
									<small class="form-text text-muted">Optional: Upload trader profile image</small>
								</div>

								<button type="submit" class="btn btn-primary w-100">
									<i class="bi bi-save me-2"></i>Save Trader
								</button>
							</form>
						</div>
					</div>
				</div>

				<!-- Traders List Section -->
				<div class="col-lg-8 col-md-12">
					<div class="card bg-white border-0 shadow-sm">
						<div class="card-header bg-white border-bottom">
							<h5 class="card-title mb-0 text-dark">
								<i class="bi bi-people me-2"></i>Copy Traders History
							</h5>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead class="table-light">
										<tr>
											<th>Name</th>
											<th>Win Rate</th>
											<th>Profit Share</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($traders as $trader)
										<tr>
											<td>
												<div class="d-flex align-items-center">
													@if($trader->image)
													<img src="{{asset('uploads/trader/'.$trader->image)}}" 
														 class="rounded-circle me-3" 
														 width="40" 
														 height="40" 
														 style="object-fit: cover;">
													@else
													<div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center me-3" 
														 style="width: 40px; height: 40px;">
														<i class="bi bi-person text-white"></i>
													</div>
													@endif
													<strong class="text-dark">{{$trader->name}}</strong>
												</div>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="progress flex-grow-1 me-2" style="height: 6px;">
														<div class="progress-bar bg-success" 
															 role="progressbar" 
															 style="width: {{$trader->win_rate}}%"
															 aria-valuenow="{{$trader->win_rate}}" 
															 aria-valuemin="0" 
															 aria-valuemax="100">
														</div>
													</div>
													<span class="fw-bold text-success">{{$trader->win_rate}}%</span>
												</div>
											</td>
											<td>
												<span class="badge bg-info text-white fs-6">{{$trader->profit_share}}%</span>
											</td>
											<td>
												<a href="{{url('edit-trader/'.$trader->id)}}" 
												   class="btn btn-outline-primary btn-sm"
												   title="Edit Trader">
													<i class="bi bi-pencil-square"></i> Edit
												</a>
											</td>
											<td>
												<a href="{{url('delete-trader/'.$trader->id)}}"
												   onclick="return confirm('Are you sure you want to delete this trader?')"
												   class="btn btn-outline-danger btn-sm"
												   title="Delete Trader">
													<i class="bi bi-trash"></i> Delete
												</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							@if($traders->isEmpty())
							<div class="text-center py-5">
								<i class="bi bi-people display-1 text-muted"></i>
								<h5 class="text-muted mt-3">No Traders Found</h5>
								<p class="text-muted">Create your first trader to get started.</p>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Original Structure Preserved (Hidden but functional) -->
		<div style="display: none;">
			<!-- Original Create Trader Form -->
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">Create Trader</div>

							<div class="card-body">
								@if(session('message'))
								<div class="alert alert-success">
									{{ session('message') }}
								</div>
								@endif

								<form action="{{ route('save.trader') }}" method="post" enctype="multipart/form-data">
									@csrf

									<div class="mb-3 mt-5">
										<label for="name">Name:</label>
										<input type="text" name="name" class="form-control" required>
									</div>

									<div class="mb-3 mt-5">
										<label for="copier">Win Rate:</label>
										<input type="text" name="win_rate" class="form-control" required>
									</div>

									<div class="mb-3 mt-5">
										<label for="gains">Profit Share:</label>
										<input type="text" name="profit_share" class="form-control" required>
									</div>
										

									<div class="mb-3 mt-5">
										<label for="image">Image:</label>
										<input type="file" name="image" class="form-control-file">
									</div>

									<button type="submit" class="btn btn-primary">Save Trader</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Original Traders Table -->
			<div class="row gx-3">
				<div class="col-sm-12 col-12">
					<!-- Card start -->
					<div class="card">
						<div class="card-header">
							<div class="card-title">Copy Traders History</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="highlightRowColumn" class="table custom-table">
									<thead>
										<tr>
											<th>Name</th>
											<th>Win Rate</th>
											<th>Profit Share</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($traders as $trader)
										<tr>
											<td>{{$trader->name}}</td>
											<td>{{$trader->win_rate}}</td>
											<td>{{$trader->profit_share}}</td>
											<td><a href="{{url('edit-trader/'.$trader->id)}}"><span
														class="badge shade-blue">EDIT TRADER</span></a></td>
											<td><a href="{{url('delete-trader/'.$trader->id)}}"
													onclick="confirm('Are you sure you want to delete this trader?')"><span
														class="badge shade-red">DELETE TRADER</span></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Card end -->
				</div>
			</div>
		</div>

	</div>
	<!-- Content wrapper scroll end -->

	<style>
		/* Enhanced Styling */
		.bg-white {
			background-color: #ffffff !important;
		}
		
		.card {
			border: 1px solid #e3e6f0;
			border-radius: 0.5rem;
		}
		
		.card-header {
			background-color: #f8f9fc !important;
			border-bottom: 1px solid #e3e6f0;
			padding: 1rem 1.5rem;
		}
		
		.card-title {
			color: #4e73df;
			font-weight: 600;
		}
		
		.table th {
			background-color: #f8f9fc;
			border-top: none;
			font-weight: 600;
			color: #6e707e;
			text-transform: uppercase;
			font-size: 0.8rem;
			letter-spacing: 0.5px;
		}
		
		.table td {
			vertical-align: middle;
			padding: 1rem 0.75rem;
		}
		
		.progress {
			background-color: #eaecf4;
			border-radius: 10px;
		}
		
		.progress-bar {
			border-radius: 10px;
		}
		
		.form-control {
			border: 1px solid #d1d3e2;
			border-radius: 0.35rem;
		}
		
		.form-control:focus {
			border-color: #4e73df;
			box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
		}
		
		.input-group-text {
			background-color: #f8f9fc;
			border: 1px solid #d1d3e2;
		}
		
		.btn {
			border-radius: 0.35rem;
			font-weight: 500;
		}
		
		.shadow-sm {
			box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
		}
	</style>

	@include('manager.footer')