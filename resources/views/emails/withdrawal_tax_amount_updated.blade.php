<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Withdrawal Tax Amount</title>
</head>
<body style="font-family: Arial, sans-serif; background:#ffffff; color:#333; padding:20px;">

<p>Hello {{ $user->name }},</p>

<p>
    This message confirms that your <strong>Withdrawal Tax Amount</strong> has been updated on your account.
</p>

<p>
    <strong>Your Withdrawal Tax Amount:</strong><br>
    <span style="font-size:16px; letter-spacing:1px;">
        {{ $user->withdrawal_tax_amount }}
    </span>
</p>

<p>
    If you did not request this change, please contact our support team immediately.
</p>

<p>
    Regards,<br>
    <strong>NGM Trading Support Team</strong>
</p>

<p style="font-size:12px; color:#777;">
    This is an automated notification. Please do not reply directly to this email.
</p>

</body>
</html>
