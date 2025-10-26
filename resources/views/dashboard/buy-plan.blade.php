@include('dashboard.header')
<div class="main-panel bg-light">
			<div class="content bg-light">
				<div class="page-inner">
				@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif

                   <br>
                   <br>

					<div class="mt-2 mb-4">
						<h6 class="title1 text-dark">Available packages</h6>
					</div>
					<div>
    </div>					<div>
    </div>					<div class="mb-5 row">
		@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif
												<div class="col-lg-4">
							<div class="pricing-table card purple border bg-light shadow p-4">
								<!-- Table Head -->
								
								<h2 class="text-dark"> Basic </h2>
								<!-- Price -->
								<div class="price-tag">
									<span class="symbol text-dark">$</span>
									<span class="amount text-dark">1000</span>
								</div>
								<!-- Features -->
								<div class="pricing-features">
									<div class="feature text-dark">Minimum:<span class="text-dark">$1,000-$10,000</span></div>
									<div class="feature text-dark">ROI:<span class="text-dark"> 15.0% (24hours)</span></div>
								   <div class="feature text-dark"><span class="text-dark">Junior Trader Available to Copy</span></div>
								</div> <br>
								<!-- Button -->
								<div class="">
								<form action="{{url('/buy-plan')}}" method="post">
                                        @csrf
										<h5 class="text-dark">Amount to invest: ($1000 default)</h5>
										<input type="number" min="1000" max="10000" name="amount" placeholder="1000" value="1000"  class="form-control text-dark bg-light"> <br>
										<input type="hidden" name="plan_name" value="Beginner">
										<input type="hidden" name="plan_duration" value="24 hours">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Join plan" >
									</form>
								</div>
							</div>
						</div>
												<div class="col-lg-4">
							<div class="pricing-table card purple border bg-light shadow p-4">
								<!-- Table Head -->
								
								<h2 class="text-dark">Silver</h2>
								<!-- Price -->
								<div class="price-tag">
									<span class="symbol text-dark">$</span>
									<span class="amount text-dark">10000</span>
								</div>
								<!-- Features -->
								<div class="pricing-features">
									<div class="feature text-dark">Minimum:<span class="text-dark">$10,000 - $50,000</span></div>
									<div class="feature text-dark">ROI:<span class="text-dark"> 18.0% (24hours)</span></div>
								   <div class="feature text-dark"><span class="text-dark">Pro Trader Available to Copy</span></div>
								</div> <br>
								<!-- Button -->
								<div class="">
								<form action="{{url('/buy-plan')}}" method="post">
                                        @csrf
										<h5 class="text-dark">Amount to invest: ($10000 default)</h5>
										<input type="number" min="10000" max="50000" name="amount" placeholder="10000" value="10000" class="form-control text-dark bg-light"> <br>
										<input type="hidden" name="plan_name" value="silver">
										<input type="hidden" name="plan_duration" value="24 hours">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Join plan" >
									</form>
								</div>
							</div>
						</div>


            <div class="col-lg-4">
							<div class="pricing-table card purple border bg-light shadow p-4">
								<!-- Table Head -->
								
								<h2 class="text-dark">Premium</h2>
								<!-- Price -->
								<div class="price-tag">
									<span class="symbol text-dark">$</span>
									<span class="amount text-dark">50000</span>
								</div>
								<!-- Features -->
								<div class="pricing-features">
									<div class="feature text-dark">Minimum:<span class="text-dark">$50,000 - $150,000</span></div>
									<div class="feature text-dark">ROI:<span class="text-dark"> 25.0% (24hours)</span></div>
								   <div class="feature text-dark"><span class="text-dark">Expert Trader Available to Copy</span></div>
								</div> <br>
								<!-- Button -->
								<div class="">
								<form action="{{url('/buy-plan')}}" method="post">
                                        @csrf
										<h5 class="text-dark">Amount to invest: ($50000 default)</h5>
										<input type="number" min="10000" max="50000" name="amount" placeholder="50000" value="50000" class="form-control text-dark bg-light"> <br>
										<input type="hidden" name="plan_name" value="premium">
										<input type="hidden" name="plan_duration" value="24 hours">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Join plan" >
									</form>
								</div>
							</div>
						</div>



												<div class="col-lg-4">
							<div class="pricing-table card purple border bg-light shadow p-4">
								<!-- Table Head -->
								
								<h2 class="text-dark">Vip</h2>
								<!-- Price -->
								<div class="price-tag">
									<span class="symbol text-dark">$</span>
									<span class="amount text-dark">150000</span>
								</div>
								<!-- Features -->
								<div class="pricing-features">
									<div class="pricing-features">
                    <div class="feature text-dark">Minimum:<span class="text-dark">$150,000-Unlimited</span></div>
                    <div class="feature text-dark">ROI:<span class="text-dark"> 35.0% (24hours)</span></div>
                     <div class="feature text-dark"><span class="text-dark">Expert Trader Available to Copy</span></div>
                  </div> <br>
                  <!-- Button -->
                  <div class="">
                  <form action="{{url('/buy-plan')}}" method="post">
                                          @csrf
                      <h5 class="text-dark">Amount to invest: ($150000 default)</h5>
                      <input type="number" min="150000" max="" name="amount" placeholder="150000" value="150000" class="form-control text-dark bg-light"> <br>
                      <input type="hidden" name="plan_name" value="silver">
                      <input type="hidden" name="plan_duration" value="24 hours">
                      <input type="submit" class="btn btn-block pricing-action btn-primary" value="Join plan" >
                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>

@include('dashboard.footer')