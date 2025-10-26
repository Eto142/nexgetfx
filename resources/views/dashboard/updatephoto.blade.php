@include('dashboard.header')







<br>
    <br>
    <div class="content-page">
      <div class="content">
<div class="container">
  <div class="card" style="border-radius: 20px;">
    <div class="card-header pb-0 p-3 text-center">
      {{-- <img src="camera.png" alt="Camera" style="width: 100px; height: 100px;"> --}}
      <img src="{{asset('user/uploads/id/'.Auth::user()->photo)}}" alt="Current Photo" style="width: 50%; border-radius: 10px;>
    </div>
    <div class="card-body">
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
      <form action="{{route('upload_picture')}}" method ="POST" enctype="multipart/form-data">
        {{ csrf_field()}}
        <div class="form-group">
          <label for="current-photo">Current Photo</label>
          <!-- Current Photo display -->
        </div>
        <br>
        <div class="form-group">
          <label for="new-photo">New Photo</label>
          <input type="file" class="form-control" id="new-photo" name="image" accept="image/*" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please select a file.</div>
        </div>
        <br>
        <div class="text-center">
          <input type="submit" name="submit" class="btn btn-primary" value="Submit" style="background-color: deepskyblue;">
        </div>
      </form>
    </div>
  </div>
</div>

    </center>
    <br>
    <br>
    <br>
    <br>

    </div>
  </main>








@include('dashboard.footer')