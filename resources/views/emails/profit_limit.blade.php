<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Account Profit Threshold Reached</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#f4f6f8; padding:20px;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0" style="background:#ffffff; border-radius:6px;">

                    <tr>
                        <td align="center" style="border-bottom:1px solid #eaeaea;">
                            <h2 style="color:#0d6efd; margin:0;">
                                Profit Threshold Alert
                            </h2>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Hello <strong>{{ $user->name }}</strong>,</p>

                            <p>
                                We are pleased to inform you that your trading activity has
                                exceeded the allowable profit threshold for your current account tier.
                            </p>

                            <p style="background:#f8f9fa; padding:15px; border-left:4px solid #0d6efd;">
                                <strong>Status:</strong> Threshold Reached
                            </p>

                            <p>
                                This level of performance indicates advanced trading activity and,
                                in line with our risk management and compliance policies,
                                your account now requires an <strong>upgrade</strong>.
                            </p>

                            <p>
                                To continue trading without restrictions and unlock higher limits,
                                please contact our support team to review your account and complete
                                the upgrade process.
                            </p>

                            <p style="text-align:center; margin:30px 0;">
                                <a href="mailto:support@nexglobmarket.com"
                                   style="background:#0d6efd; color:#ffffff; padding:12px 25px;
                                          text-decoration:none; border-radius:4px;">
                                    Contact Support
                                </a>
                            </p>

                            <p>
                                Our team will guide you through the next steps and ensure
                                uninterrupted trading access.
                            </p>

                            <p>
                                Best regards,<br>
                                <strong>The Trading & Risk Management Team</strong>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="border-top:1px solid #eaeaea; font-size:12px; color:#6c757d;">
                            This notification was generated automatically based on your account activity.
                            Please do not reply directly to this email.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
