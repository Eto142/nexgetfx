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
				<form method="post" action="{{route('update-trc')}}" enctype="multipart/form-data">
					@csrf

   <div class="form-group">
   <input type="text" name="usdt_address" class="form-control form-control-user" placeholder="New wallet address" value="{{Auth::user()->usdt_address}}">
   </div>
   <div class="form-group">
   <input type="file" name = "image"  class="form-control">
	   <img src="{{asset('manager/uploads/manager/'.Auth::user()->usdtImage)}}" width="60px" height="60px"/>
	   @error('image')<small class="text-danger">{{$message}}</small> @enderror
	   </div>
  <button type="submit" name="usdt" class="btn btn-primary btn-user btn-block"> update </button>
   <hr>
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