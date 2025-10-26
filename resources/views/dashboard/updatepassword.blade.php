@include('dashboard.header')



<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6 col-lg-5">
      <div class="card" style="border-radius: 20px;">
        <div class="card-header pb-0 p-3">
          <p class="text-center"><a href="" style="color: lightskyblue;"><b>Password Update</b></a></p>
        </div>
        <div class="card-body">
          @if (session('error'))
            <div class="alert box-bdr-red alert-dismissible fade show text-red" role="alert">
              <b>Error!</b> {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @elseif (session('status'))
            <div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
              <b>Success!</b> {{ session('status') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form action="{{ route('update.password') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="old_password">Old Password</label>
              <input type="password" class="form-control" id="old_password" placeholder="Enter Current Password" name="old_password" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <br>
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input type="password" class="form-control" id="new_password" placeholder="Enter New Password" name="new_password" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <br>
            <div class="form-group">
              <label for="new_password_confirmation">Confirm New Password</label>
              <input type="password" class="form-control" id="new_password_confirmation" placeholder="Confirm New Password" name="new_password_confirmation" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <br>
            <div class="text-center">
              <input type="submit" name="d" class="btn btn-primary" value="Submit" style="background-color: deepskyblue;">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

  </main>








@include('dashboard.footer')