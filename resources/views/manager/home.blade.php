@include('manager.header')
@include('manager.navbar')
<!-- Sidebar wrapper end -->

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

	<!-- Main header starts -->
	<div class="main-header d-flex align-items-center justify-content-between position-relative">
		<div class="d-flex align-items-center justify-content-center">
		
		
		</div>
		<!-- Live updates start -->
		<ul class="updates d-flex align-items-end flex-column overflow-hidden" id="updates">
			<!--<li>-->
			<!--	<a href="javascript:void(0)">-->
			<!--		<i class="bi bi-envelope-paper text-red font-1x me-2"></i>-->
			<!--		<span>12 emails from David Michaiah.</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="javascript:void(0)">-->
			<!--		<i class="bi bi-bar-chart text-blue font-1x me-2"></i>-->
			<!--		<span>15 new features updated successfully.</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="javascript:void(0)">-->
			<!--		<i class="bi bi-folder-check text-yellow font-1x me-2"></i>-->
			<!--		<span>The media folder is created successfully.</span>-->
			<!--	</a>-->
			<!--</li>-->
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
						<div class="card-title">All Users</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="highlightRowColumn" class="table custom-table">
								<thead>
									<tr>
										<th>Full Name</th>

										<th>Registered Date</th>
										<th>View User</th>
										<th>Send Mail</th>
										<th>Delete User</th>


									</tr>
								</thead>
								<tbody>

									@foreach($result as $transaction)
									<tr>

										<td>{{$transaction->name}}</td>


										<td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('D, M j, Y g:i
											A') }}</td>

										<td><a href="{{url('profile/'.$transaction->id)}}"><span
													class="badge shade-blue">View User</span></a></td>
										<td><a href="{{url('send-user-mail/'.$transaction->id)}}"><span
													class="badge shade-green">Send Mail</span></a></td>
										<td><a href="{{url('delete/'.$transaction->id)}}"
												onclick="confirm('Are you sure you want to delete this user?')"><span
													class="badge shade-red">Delete User</span></a></td>

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