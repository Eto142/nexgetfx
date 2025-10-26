@include('dashboard.header')


<main>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6">
          <div class="card border rounded-3">
            <div class="card-header">
              <h5 class="card-title mb-0">Notification Permission (Browse)</h5>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label for="permissionSelect" class="form-label">Permission Status</label>
                  <select class="form-select" id="permissionSelect" aria-label="Permission Status">
                    <option selected>Denied</option>
                    <option>Granted</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: skyblue">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
 @include('dashboard.navbar')

@include('dashboard.footer')