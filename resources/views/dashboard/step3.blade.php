<!DOCTYPE html>
<html>

<!-- Mirrored from  by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 09:08:22 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | Opts</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="icon" href="img/favicon.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition register-page" style="background-image: url('{{asset('images/bg2.jpg')}}');">


 <div class="nk-ovm mask-a shape-a"></div>
<!-- Particle Background -->
<div id="particles-bg" class="particles-container particles-bg"></div>

<div style="max-width: 500px; margin: 50px auto; padding: 30px; box-shadow: 0 0 25px rgba(0,0,0,0.08); border-radius: 12px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #fff;">

  <!-- Logo -->
  <div style="text-align: center; margin-bottom: 25px;">
    <a href="/">
      <img src="{{ asset('io.png') }}" alt="Logo" style="max-width: 140px;">
    </a>
  </div>

  <!-- Header Text -->
  <div style="text-align: center; margin-bottom: 20px;">
    <h2 style="font-weight: 600; color: #333;">Welcome, {{ Auth::user()->name ?? 'User' }}!</h2>
    <p style="color: #666;">Your unique authorization code is shown below. Please copy and enter your PIN to continue.</p>
  </div>

  <!-- Token Display -->
  <div style="text-align: center; margin-bottom: 20px;">
    <div id="authCode" style="display: inline-block; background: #f4f4f4; padding: 12px 18px; font-size: 18px; font-weight: bold; letter-spacing: 1px; border-radius: 6px; border: 1px solid #ccc;">
      {{ Auth::user()->token }}
    </div>
    <br>
    <button onclick="copyToken()" class="btn btn-sm btn-primary mt-2" style="margin-top: 10px;">Copy Code</button>
  </div>

  <!-- Alerts -->
  @if (session('error'))
    <div class="alert alert-danger text-center" style="margin-bottom: 20px;">
      {{ session('error') }}
    </div>
  @endif

  @if ($message = Session::get('success'))
    <div class="alert alert-success text-center" style="margin-bottom: 20px;">
      {{ $message }}
    </div>
  @endif

  <!-- PIN Form -->
  <form method="POST" action="{{ route('code') }}" style="margin-bottom: 15px;">
    @csrf
    <div class="form-group">
      <label for="digit" style="font-weight: 500;">Enter Your PIN</label>
      <input type="number" name="digit" class="form-control" placeholder="••••" required style="height: 48px; font-size: 16px;">
    </div>

    <button type="submit" class="btn btn-lg btn-success btn-block" style="margin-top: 15px;">Verify & Continue</button>
  </form>

  <!-- Logout Button -->
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-outline-secondary btn-block">Logout</button>
  </form>
</div>

<!-- Copy to Clipboard Script -->
<script>
  function copyToken() {
    const codeText = document.getElementById("authCode").innerText;
    navigator.clipboard.writeText(codeText).then(function() {
      alert("Authorization code copied!");
    }).catch(function(err) {
      alert("Failed to copy code.");
    });
  }
</script>

  <!-- jQuery 3 -->
  <script src="dist/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="dist/js/bootstrap.min.js"></script>

</body>

<!-- Mirrored from Cityfxmarkets.cc/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 09:08:23 GMT -->

</html>