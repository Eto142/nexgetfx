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

<div class="col-md-6 grid-margin stretch-card">
		  <div class="card">
			<div class="card-body">
			  <p class="card-description">
			  Update Bank/Wallet Details
			  </p>
			  <form action ="{{ url('/choose-wallet')}}" method ="POST" enctype="multipart/form-data">
						 @csrf
						 <div class="form-group">
			<label class="btn btn-primary"> SELECT WALLET </label>
			<select class="form-control form-control-lg" name="method" id="exampleFormControlSelect1">          
					   

							<option value="usdt">USDT</option>
							<option value="btc">BITCOIN</option>
							<option value="eth">ETHEREUM</option>
							                           
						  </select>
				</div>
				<button type="submit" class="btn btn-primary me-2">Update</button>
			  </form>
			</div>
		  </div>
		</div>       

</div>
</div>
</div>
<!-- Content wrapper end -->

</div>
<!-- Content wrapper scroll end -->

@include('manager.footer')