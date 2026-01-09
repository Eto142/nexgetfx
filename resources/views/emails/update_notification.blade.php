<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="x-apple-disable-message-reformatting">
    <title>Swiftmetatrd Notification</title>
</head>

<body style="margin:0; padding:0; background:#eef1f7; font-family:Arial, sans-serif;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#eef1f7; padding:40px 0;">
        <tr>
            <td align="center">

                <!-- Main Email Card -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                       style="max-width:600px; background:#ffffff; border-radius:10px; border:1px solid #e0e4ec; box-shadow:0 4px 10px rgba(0,0,0,0.04);">

                    <!-- Sweet, Luxury-Style Text Logo -->
                    <tr>
                        <td align="center" style="padding:35px 10px 28px; border-bottom:1px solid #ececec;">
                            <div style="
                                font-size:32px;
                                font-weight:800;
                                letter-spacing:1.5px;
                                font-family: 'Trebuchet MS', Arial, sans-serif;
                                color:#0b1c36;
                                text-transform:uppercase;
                                background: linear-gradient(90deg, #0b1c36, #3a74ff);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                            ">
                                Swift<span style="font-weight:300;">Meta</span><span style="font-weight:800;">Trd</span>
                            </div>

                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding:35px 28px; color:#333; font-size:15px; line-height:1.7;">

                            <p style="margin:0 0 18px; font-size:16px;">Hello,</p>

                            <p style="margin:0 0 22px; color:#4a5568;">
                                {!! nl2br(e($messageText)) !!}
                            </p>

                            <p style="margin:30px 0 0; color:#2d3a4b;">
                                Warm regards,<br>
                                <strong>Swiftmetatrd Support Team</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center"
                            style="background:#f8f9fc; padding:18px 15px; border-top:1px solid #e3e6ef; font-size:12px; color:#7c869b; line-height:1.5;">

                            You are receiving this email as a verified user of Swiftmetatrd.<br>
                            If this message is not relevant to you, simply ignore it.<br><br>

                            © {{ date('Y') }} Swiftmetatrd All Rights Reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
