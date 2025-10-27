<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | NexgetCpt</title>
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

    .login-container {
      background: #fff;
      border-radius: 15px;
      padding: 40px 30px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 420px;
      text-align: center;
    }

    .login-logo img {
      width: 140px;
      margin-bottom: 10px;
    }

    .login-container h3 {
      font-weight: 700;
      color: #222;
      margin-bottom: 10px;
    }

    .login-container p {
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

    .login-links {
      margin-top: 20px;
    }

    .login-links a {
      color: #0d6efd;
      text-decoration: none;
      transition: 0.3s;
    }

    .login-links a:hover {
      text-decoration: underline;
    }

    .invalid-feedback {
      color: #d9534f;
      font-size: 0.85rem;
      text-align: left;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-logo">
      <a href="/"><img src="logo.png" alt="NexgetCpt Logo"></a>
    </div>
    <h3>Welcome Back</h3>
    <p>Login to your <strong>NexgetCpt</strong> account and continue growing your investments.</p>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3 text-start">
        <label for="email" class="form-label fw-semibold">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Enter your password" required>
        <div class="form-check mt-2">
          <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
          <label class="form-check-label" for="showPassword">Show Password</label>
        </div>
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
    </form>

    <div class="login-links">
      <p class="mt-3 mb-1">Don't have an account? <a href="{{ route('register') }}"><strong>Register Now</strong></a></p>
      @if (Route::has('password.request'))
        <a href="{{ route('forgot.password.form') }}">Forgot your password?</a>
      @endif
    </div>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById("passwordInput");
      input.type = input.type === "password" ? "text" : "password";
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
