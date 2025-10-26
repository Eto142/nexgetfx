<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f7f9fc; padding: 30px;">
    <div style="background: #fff; padding: 25px; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0 3px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #305C89;">Reset Your Password</h2>
        <p>{{ $body }}</p>
        <a href="{{ $action_link }}" style="background: #305C89; color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none;">Reset Password</a>
        <p style="margin-top: 20px;">If you did not request a password reset, please ignore this email.</p>
    </div>
</body>
</html>
