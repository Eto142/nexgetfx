@include('manager.header')
@include('manager.navbar')

<!-- Content wrapper scroll start -->
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Ethereum Wallet address</h4>

                  <form method="post" action="{{route('update-eth')}}" enctype="multipart/form-data">
                                     @csrf
                    <div class="form-group">
                      <input type="text" name="eth_address" class="form-control form-control-user" value="{{Auth::user()->eth_address}}">
                    </div>
					<input type="file" name = "image"  class="form-control">
					<img src="{{asset('manager/uploads/manager/'.Auth::user()->ethImage)}}" width="60px" height="60px"/>
					@error('image')<small class="text-danger">{{$message}}</small> @enderror
					</div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                  </form>
                </div>
              </div>
            </div>       

</div>
</div>
</div>
<!-- Content wrapper scroll end -->

@include('manager.footer')