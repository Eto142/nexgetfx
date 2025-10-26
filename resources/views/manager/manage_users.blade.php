@include('admin.header')
<div class="main-panel">
			<div class="content bg-dark">
				<div class="page-inner">
				@if(session('message'))
<div class="alert alert-success mb-2">{{session('message')}}</div>
@endif
					<div class="mt-2 mb-4">
						<h1 class="title1 text-light">Fundformeprogram users lists</h1>
					</div>
					
					<div>
    </div>                    <div>
    </div>					<div class="row">
						<div class="col-12">
							<!--<a href="#" data-toggle="modal" data-target="#sendmailModal" class="btn btn-primary btn-lg" style="margin:10px;">Message all</a>-->
														{{-- <a href="{{route('manage.kyc')}}" class="btn btn-warning btn-lg">KYC</a> --}}
							 
							<!--<a href="#" data-toggle="modal" data-target="#adduser" class="float-right btn btn-primary"> <i class='fas fa-plus-circle'></i> Add User</a>-->
							<!-- Modal -->
							<div class="modal fade" id="adduser" tabindex="-1" aria-h6ledby="exampleModalh6" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-dark">
											<!--<h3 class="mb-2 d-inline text-light">Manually Add Users</h3>-->
											<button type="button" class="close text-light" data-dismiss="modal" aria-h6="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body bg-dark">
											<div>
											<form role="form" method="post" action="{{ route('add.user') }}">
                                         {{ csrf_field()}}	
																						<div class="form-row">
														<div class="form-group col-md-12">
															<h6 class="text-light">Username</h6>
															<input type="text" id="input1" class="form-control bg-dark text-light" name="username" required>
														</div>
														<div class="form-group col-md-12">
															<h6 class="text-light">Fullname</h6>
															<input type="text" class="form-control bg-dark text-light" name="name" required>
														</div>
														<div class="form-group col-md-12">
															<h6 class="text-light">Email</h6>
															<input type="email" class="form-control bg-dark text-light" name="email" required>
														</div>
														<div class="form-group col-md-12">
															<h6 class="text-light">Password</h6>
															<input type="password" class="form-control bg-dark text-light" name="password" required>
														</div>
														<div class="form-group col-md-12">
															<h6 class="text-light">Confirm Password</h6>
															<input type="password" class="form-control bg-dark text-light" name="password_confirmation" required>
														</div>
													</div>
													<button type="submit" class="px-4 btn btn-primary">Add User</button>
												</form>  
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mb-5 row">
						
						<div class="col-md-12 shadow card p-4 bg-dark">
							<div class="row">
								<div class="col-12">
									<form class=" form-inline">
										<div class="">
											<select class="form-control bg-dark text-light" id="numofrecord">
												<option>10</option>
												<option>20</option>
												<option>30</option>
												<option>40</option>
												<option>50</option>
												<option>100</option>
												<option>200</option>
												<option>300</option>
												<option>400</option>
												<option>500</option>
												<option>600</option>
												<option>700</option>
												<option>800</option>
												<option>900</option>
												<option>1000</option>
											</select>
										</div>
										<div class="">
											<select class="form-control bg-dark text-light" id="order">
												<option value="desc">Descending</option>
												<option value="asc">Ascending</option>
											</select>
										</div>
										<div>
										<input type="text" id="searchitem" placeholder="Search by name or email" class="float-right mb-2 mr-sm-2 form-control bg-dark text-light">

										</div>
										
									</form>
								</div>
							</div>
							<div class="table-responsive" data-example-id="hoverable-table"> 
								<table class="table table-hover text-light"> 
									<thead> 
										<tr> 
											<th>Client Name</th>
									
											<th>Email</th> 
											<th>Status</th>
											<th>Date registered</th> 
											<th>Action</th> 
										</tr> 
									</thead> 
								<tbody id="userslisttbl">
								@foreach($user as $users)
            <tr> 
                <td>
				{{$users->name}}
				</td>
                <td>{{$users->email}}</td> 
                @if($users->user_status=='1')
                <td><span class="badge badge-success">active</span></td> 
				@elseif($users->user_status=='0')
				<td><span class="badge badge-danger">inactive</span></td> 
				@endif
            	<td>{{ \Carbon\Carbon::parse($users->created_at)->format('D, M j, Y g:i A') }}</td> 
									
                <td>
                    <a class="btn btn-secondary btn-sm" href="{{url('profile/'.$users->id)}}" id="153"  role="button">
                        Manage
                    </a>
                </td> 
            </tr> 
            
           @endforeach
            
            </tbody> 
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				$('#input1').on('keypress', function(e) {
					return e.which !== 32;
				});
			</script>

	<!-- send all users email -->
	<div id="sendmailModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header bg-dark">
			  <h4 class="modal-title text-light">This message will be sent to all your users.</h4>
			  <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body bg-dark">
				  <form method="post" action="https://altruisticmarkets.com/account/admin/dashboard/sendmailtoall">
					<input type="hidden" name="_token" value="EqGt2txdTJHMwXVRjoCB9yNMVUEKJvIhyXqL7wBp">					
					<div class=" form-group">
						<input type="text" name="subject" class="form-control bg-dark text-light" placeholder="Subject" required>
					</div>
					<div class=" form-group">
						<textarea placeholder="Type your message here" class="form-control bg-dark text-light" name="message" row="8" placeholder="Type your message here" required></textarea>
					</div>
					<div class=" form-group">
						<input type="submit" class="btn btn-light" value="Send">
					</div>
				 </form>
			</div>
		  </div>
		</div>
	  </div>
	  
	  
	  
	  
	  <script>
    // Function to filter table rows based on search input
    function filterTable() {
        var searchText = document.getElementById('searchitem').value.toLowerCase();
        var rows = document.getElementById('userslisttbl').getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var name = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
            var email = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();

            if (name.includes(searchText) || email.includes(searchText)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    // Event listener for search input
    document.getElementById('searchitem').addEventListener('keyup', filterTable);
</script>


<script>
    // Function to sort and paginate the table
    function sortAndPaginate() {
        var numPerPage = parseInt(document.getElementById('numofrecord').value);
        var order = document.getElementById('order').value;
        var table = document.getElementById('userslisttbl');
        var rows = Array.from(table.getElementsByTagName('tr')).slice(1); // Exclude header row
        var pageCount = Math.ceil(rows.length / numPerPage);
        
        // Sort the rows based on the selected order
        rows.sort(function(a, b) {
            var aValue = a.getElementsByTagName('td')[0].textContent.toLowerCase();
            var bValue = b.getElementsByTagName('td')[0].textContent.toLowerCase();
            return (order === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue));
        });

        // Display the sorted and paginated rows
        var startIndex = 0;
        for (var i = 0; i < pageCount; i++) {
            var pageRows = rows.slice(startIndex, startIndex + numPerPage);
            pageRows.forEach(row => row.style.display = '');
            startIndex += numPerPage;
        }

        // Hide rows that are not in the current page
        rows.slice(startIndex).forEach(row => row.style.display = 'none');
    }

    // Event listeners for sorting and pagination
    document.getElementById('numofrecord').addEventListener('change', sortAndPaginate);
    document.getElementById('order').addEventListener('change', sortAndPaginate);

    // Initial sort and pagination on page load
    window.onload = function() {
        sortAndPaginate();
    };
</script>


	  <!-- /send all users email Modal -->
			
@include('admin.footer')
				