@include('dashboard.header')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><span>Account Setting</span></div>
                    <h2 class="nk-block-title fw-normal">My Profile</h2>
                    <div class="nk-block-des">
                        <p>You have full control to manage your own account setting. <span class="text-primary"><em
                                    class="icon ni ni-info" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Tooltip on right"></em></span></p>
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

                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="kyc-app wide-sm m-auto">
                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                    <div class="nk-block-head-content text-center">
                                        <h2 class="nk-block-title fw-normal">KYC Verification</h2>
                                        <div class="nk-block-des">
                                            <p>To comply with regulation each participant will have to go through
                                                indentity verification (KYC/AML) to prevent fraud causes. </p>
                                        </div>
                                    </div>
                                </div><!-- nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner card-inner-lg">
                                            <div class="nk-kyc-app p-sm-2 text-center">
                                                <div class="nk-kyc-app-icon">
                                                    <em class="icon ni ni-files"></em>
                                                </div>
                                                <div class="nk-kyc-app-text mx-auto">
                                                    <p class="lead">Valid identity card. (e.g. Drivers license,
                                                        international passport or any government approved document), If
                                                        you have submitted your necessary documents to verify your
                                                        identity.Please contact the admin if account is not verified .
                                                    </p>
                                                </div>

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

                                                <form action="{{ url('/upload-kyc')}}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="nk-kycfm-upload">
                                                        <h6 class="title nk-kycfm-upload-title">Select Front</h6>
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-8">
                                                                <div class="nk-kycfm-upload-box">
                                                                    <div class="upload-zone1">
                                                                        <div class="dz-message" data-dz-message>
                                                                            <!--<span class="dz-message-text">Drag and drop file</span>-->
                                                                            <!--<span class="dz-message-or">or</span>-->
                                                                            <!--<button class="btn btn-primary">SELECT</button>-->
                                                                            <input name="card"
                                                                                accept=".jpg,.png,.jpeg"
                                                                                class="dz-message-text" type="file"
                                                                                required id="customFile">
                                                                            <label for="customFile">Upload Image</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="nk-kycfm-upload">
                                                                <h6 class="title nk-kycfm-upload-title">Select Back</h6>
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-8">
                                                                        <div class="nk-kycfm-upload-box">
                                                                            <div class="upload-zone1">
                                                                                <div class="dz-message" data-dz-message>
                                                                                    <!--<span class="dz-message-text">Drag and drop file</span>-->
                                                                                    <!--<span class="dz-message-or">or</span>-->
                                                                                    <!--<button class="btn btn-primary">SELECT</button>-->
                                                                                    <input name="pass"
                                                                                        accept=".jpg,.png,.jpeg"
                                                                                        class="dz-message-text"
                                                                                        type="file" required
                                                                                        id="customFile">
                                                                                    <label for="customFile">Upload
                                                                                        Image</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="nk-kyc-app-action">
                                                                        <button style="margin-top: 10%;" name=""
                                                                            class="btn btn-primary">Click Here To Upload
                                                                            KYC</button>
                                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center pt-4">

                                    </div>
                                </div><!-- nk-block -->
                            </div><!-- kyc-app -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- NK-Block @e -->
            <!-- //  Content End -->
        </div>
    </div>
</div>
@include('dashboard.footer')