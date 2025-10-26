<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-box {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            background: #305C89;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
<div class="form-box">
    <h2>Forgot Password</h2>

    @if(session('message'))
        <p style="color:green">{{ session('message') }}</p>
    @endif

    <form method="POST" action="{{ route('forgot.password.submit') }}">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Reset Link</button>
    </form>

    <a href="{{ route('login') }}">Back to login</a>
</div>
</body>
</html>
