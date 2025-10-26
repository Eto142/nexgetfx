@include('dashboard.header')

       <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><span>Account Setting</span></div>
                                    <h2 class="nk-block-title fw-normal">My Profile</h2>
                                    <div class="nk-block-des">
                                        <p>You have full control to manage your own account setting. <span class="text-primary"><em class="icon ni ni-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right"></em></span></p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <ul class="nk-nav nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('profile')}}">Personal</a>
                                </li>
                            <li class="nav-item">
                                   <a class="nav-link" href="{{url('photo')}}">Profile Picture</a>
                            </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{url('verify-account')}}">KYC Verification</a>
                                </li>
                                <!--<li class="nav-item">
                                    <a class="nav-link" href="crypto/profile-connected.php">Connect Social</a>
                                </li> -->
                            </ul><!-- .nk-menu -->
                            <!-- NK-Block @s -->
                            <div class="nk-block">

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
                                    <center>
                                        <div class="nk-kycfm-upload">
                                            <h6 class="title nk-kycfm-upload-title">Upload your profile picture</h6><br>
                                            <div class="row align-items-center">
                                                <div class="col-sm-8">
                                                    <div class="nk-kycfm-upload-box">
                                                        <input name="image" type="file" required> <br><br>
                                                        <button style="margin-top: 10%;" name="upload" class="btn btn-primary">UPLOAD</button>
                                                    </div>
                                                </div>
                                              </form>
                                            </div>
                                    <!-- NK-Block @e -->
                                    <!-- //  Content End -->
                                    </div>
                                </center>
                           
                        </div>
                </div>
                <!-- content @e -->
                
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    
    <div class="modal fade" tabindex="-1" role="dialog" id="pass">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <a href="#" class="close" data-bs-dismiss="modal"
            ><em class="icon ni ni-cross-sm"></em
          ></a>
          <div class="modal-body modal-body-lg text-center">
            <div class="nk-modal">
                  <h4 class="nk-modal-title">Please to confirm this is you kindly enter your password</h4>
                  <div class="nk-modal-text">
                    <input type="password" name="conpass" id="conpass" class="form-control form-control-lg form-control-number" placeholder="******">
                    <input type="hidden" id="check" value="25d55ad283aa400af464c76d713c07ad" class="form-control form-control-lg form-control-number" placeholder="******">
                  </div>
                  <div class="nk-modal-action-lg">
                    <ul class="btn-group gx-4">
                      <li>
                        <button class="btn btn-lg btn-mw btn-primary"
                        onclick="modal()">
                        Confirm</button
                        >
                      </li>
                    </ul>
                  </div>
            </div>
          </div>
          <!-- .modal-body -->
        </div>
        <!-- .modal-content -->
      </div>
      <!-- .modla-dialog -->
    </div>
    
    <!-- @@ Profile Edit Modal @e -->
    
    <!-- JavaScript -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          });
        }
    </script>
    <script>
        function modal() {
            let e = md5(document.getElementById('conpass').value);
            var a = document.getElementById('check').value;
            if (e == a) {
                window.location.replace('./crypto/mail/change_pass.php');
                // alert("sss");
            } else {
                alert("Invalid Password");
                
            }
        }
    </script>
    <script src="./assets/js/bundle.js?ver=3.0.0"></script>
    <script src="./assets/js/scripts.js?ver=3.0.0"></script>
    <script src="./assets/js/charts/chart-crypto.js?ver=3.0.0"></script>
</body>
    @include('dashboard.footer')