<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | Nexglobmarket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicon -->
  <link rel="icon" href="img/favicon.png">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f8fafc url('images/bg2.jpg') no-repeat center center/cover;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #333;
    }

    .register-container {
      background: #fff;
      border-radius: 15px;
      padding: 40px 30px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    .register-logo img {
      width: 140px;
      margin-bottom: 10px;
    }

    .register-container h3 {
      font-weight: 700;
      color: #222;
      margin-bottom: 10px;
    }

    .register-container p {
      color: #666;
      font-size: 0.95rem;
      margin-bottom: 25px;
    }

    .form-control {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 10px 12px;
      font-size: 0.95rem;
      color: #333;
      background-color: #fff;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #084dc3;
    }

    .form-check-label {
      font-size: 0.9rem;
      color: #555;
    }

    .register-links {
      margin-top: 20px;
    }

    .register-links a {
      color: #0d6efd;
      text-decoration: none;
      transition: 0.3s;
    }

    .register-links a:hover {
      text-decoration: underline;
    }

    .password-rules {
      color: #c0392b;
      text-align: left;
      font-size: 0.85rem;
      margin-top: 6px;
    }

    ul.password-list {
      margin-top: 5px;
      margin-left: 20px;
      font-size: 0.85rem;
      color: #555;
    }

    .invalid-feedback {
      color: #d9534f;
      font-size: 0.85rem;
      text-align: left;
      margin-top: 5px;
    }
  </style>
</head>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'a98c137f3b62e868be7986e2c1a66dfa6fc4449d';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>



<body>
  <div class="register-container">
    <div class="register-logo">
      <a href="/"><img src="logo.png" alt="Nexglobmarket Logo"></a>
    </div>
    <h3>Create an Account</h3>
    <p>Join <strong>Nexglobmarket</strong> and unlock your path to smart trading and global investing.</p>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-3 text-start">
        <label for="name" class="form-label fw-semibold">First Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter first name" required>
      </div>

      <div class="mb-3 text-start">
        <label for="lname" class="form-label fw-semibold">Last Name</label>
        <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter last name" required>
      </div>

      <div class="mb-3 text-start">
        <label for="email" class="form-label fw-semibold">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
      </div>


            <div class="mb-3 text-start">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Create password"
          required >
        <div class="form-check mt-2">
          <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
          <label class="form-check-label" for="showPassword">Show Password</label>
        </div>
        
      </div>


      {{-- <div class="mb-3 text-start">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Create password"
          required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}">
        <div class="form-check mt-2">
          <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
          <label class="form-check-label" for="showPassword">Show Password</label>
        </div>
        <div class="password-rules">
          Password must include:
          <ul class="password-list">
            <li>At least 8 characters long</li>
            <li>One uppercase letter (A–Z)</li>
            <li>One lowercase letter (a–z)</li>
            <li>One number (0–9)</li>
            <li>One special character (@, $, !, %, *, ?, &)</li>
          </ul>
        </div>
      </div> --}}

      <div class="mb-3 text-start">
        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
        <input type="password" name="password_confirmation" id="confirmPassword" class="form-control"
          placeholder="Re-enter password" required>
        <div class="form-check mt-2">
          <input type="checkbox" class="form-check-input" id="showConfirmPassword" onclick="toggleConfirmPassword()">
          <label class="form-check-label" for="showConfirmPassword">Show Password</label>
        </div>
      </div>

      <div class="mb-3 text-start">
        <label for="currency" class="form-label fw-semibold">Preferred Currency</label>
        <select class="form-control" name="currency" required>
          <option value="$">USD ($)</option>
          <option value="£">GBP (£)</option>
          <option value="€">EUR (€)</option>
          <option value="$">AUD ($)</option>
        </select>
      </div>

      <div class="mb-3 text-start">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="terms" required>
          <label class="form-check-label" for="terms">
            I am 18 years or older and accept the
            <a href="{{ url('terms') }}">Terms & Conditions</a> and
            <a href="{{ url('privacy') }}">Privacy Policy</a>.
          </label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2">Create My Account</button>
    </form>

    <div class="register-links">
      <p class="mt-3 mb-1">Already have an account? <a href="{{ route('login') }}"><strong>Login</strong></a></p>
      <a href="{{ route('password.request') }}"><strong>Forgot Password?</strong></a>
    </div>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById("passwordInput");
      input.type = input.type === "password" ? "text" : "password";
    }

    function toggleConfirmPassword() {
      const input = document.getElementById("confirmPassword");
      input.type = input.type === "password" ? "text" : "password";
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
