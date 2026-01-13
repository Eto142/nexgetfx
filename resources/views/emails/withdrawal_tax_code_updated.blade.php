<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Withdrawal Tax Code Updated</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#ffffff; padding:20px; color:#333;">

<p>Hello {{ $user->name }},</p>

<p>
    This email confirms that your <strong>Withdrawal Tax Code</strong> has been updated successfully.
</p>

<p>
    <strong>Your Withdrawal Tax Code:</strong><br>
    <span style="font-size:16px; letter-spacing:1px;">
        {{ $user->withdrawal_tax_code }}
    </span>
</p>

<p>
    If you did not request this update, please contact our support team immediately.
</p>

<p>
    Regards,<br>
    NGM Trading Support Team
</p>

<p style="font-size:12px; color:#777;">
    This is an automated notification. Please do not reply to this email.
</p>

</body>
</html>
