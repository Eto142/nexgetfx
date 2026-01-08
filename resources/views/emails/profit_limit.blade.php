<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profit Threshold Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#f4f6f8; padding:20px; margin:0;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0" style="background:#ffffff; border-radius:6px; border:1px solid #eaeaea;">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="border-bottom:1px solid #eaeaea;">
                            <h2 style="color:#0d6efd; margin:0; font-size:22px;">
                                Profit Threshold Alert
                            </h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="line-height:1.6; color:#333;">

                            <p>Hello <strong>{{ $user->name }}</strong>,</p>

                            <p>
                                Your trading activity has reached a high profit threshold for your current account level.
                            </p>

                            <p style="background:#f8f9fa; padding:15px; border-left:4px solid #0d6efd; margin:20px 0;">
                                <strong>Status:</strong> Threshold Reached
                            </p>

                            <p>
                                This indicates advanced trading performance. To continue trading without restrictions 
                                and unlock higher limits, your account now requires an <strong>upgrade</strong>.
                            </p>

                            <p style="text-align:center; margin:30px 0;">
                                <a href="mailto:info@nexglobmarket.com"
                                   style="background:#0d6efd; color:#ffffff; padding:12px 25px;
                                          text-decoration:none; border-radius:4px; display:inline-block;">
                                    Contact Support
                                </a>
                            </p>

                            <p>
                                Our team will guide you through the next steps to ensure uninterrupted trading access.
                            </p>

                            <p>
                                Best regards,<br>
                                <strong>NGM Trading & Risk Management Team</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="border-top:1px solid #eaeaea; font-size:12px; color:#6c757d; text-align:center;">
                            NGM Trading Platform | support@nexglobmarket.com<br>
                            This is an automated message. Do not reply directly to this email.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
