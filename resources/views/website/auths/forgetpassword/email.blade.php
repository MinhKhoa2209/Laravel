
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Password Reset</title>
    <style type="text/css">
        html {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }
    </style>
    <style em="styles">
        .font-mulish,
        .font-mulish-500,
        .font-mulish-700,
        .font-mulish-800 {
            font-family: Mulish, sans-serif !important;
        }

        @media only screen and (max-device-width:640px),
        only screen and (max-width:640px) {
            .em-mob-wrap.em-mob-wrap-cancel {
                display: table-cell !important;
            }

            .em-narrow-table {
                width: 100% !important;
                max-width: 640px !important;
                min-width: 320px !important;
            }

            .em-mob-wrap {
                display: block !important;
            }

            .em-mob-width-100perc {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 100% !important;
            }

            .em-mob-padding_right-20 {
                padding-right: 20px !important;
            }

            .em-mob-padding_left-20 {
                padding-left: 20px !important;
            }

            .em-mob-width-auto {
                width: auto !important;
            }
        }

        @media screen {
            .Roboto400 {
                font-family: "Roboto", Arial, sans-serif !important;
                font-weight: 400 !important;
            }
        }
    </style>
</head>

<body data-new-gr-c-s-check-loaded="null" data-gr-ext-installed="null" style="margin: 0; padding: 0;"
    data-gr-ext-disabled="forever">
    <span class="preheader"
        style="display: none !important; visibility: hidden; opacity: 0; color: #F8F8F8; height: 0; width: 0; font-size: 1px;">&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌</span>
    <!--[if !mso]><!-->
    <div style="font-size:0px;color:transparent;opacity:0;">
        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
    </div>
    <!--<![endif]-->
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-size: 1px; line-height: normal;">
        <tbody>
            <tr em="group">
                <td align="center">
                    <!--[if (gte mso 9)|(IE)]>
				<table cellpadding="0" cellspacing="0" border="0" width="640"><tr><td>
				<![endif]-->
                    <table cellpadding="0" cellspacing="0" width="100%" border="0"
                        style="max-width: 640px; min-width: 640px; width: 640px;" class="em-narrow-table">
                        <tbody>
                            <tr em="block" class="em-structure">
                                <td align="center" style="padding: 12px 40px;"
                                    class="em-mob-padding_left-20 em-mob-padding_right-20">
                                    <table border="0" cellspacing="0" cellpadding="0" class="em-mob-width-100perc">
                                        <tbody>
                                            <tr>
                                                <td width="640" valign="top"
                                                    class="em-mob-wrap em-mob-wrap-cancel em-mob-width-auto">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                                        em="atom">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding-bottom: 0px;">
                                                                    <div class="font-mulish"
                                                                        style="font-family: -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 12px; line-height: 20px; color: #000000;"
                                                                        align="right"><a href="#" target="_blank"
                                                                            style="text-decoration: none; color: #000000;">View
                                                                            in browser</a></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr em="block" class="em-structure">
                                <td align="center" style="padding: 40px; background-color: #14b8b9;"
                                    class="em-mob-padding_left-20 em-mob-padding_right-20" bgcolor="#14b8b9">
                                    <table border="0" cellspacing="0" cellpadding="0" class="em-mob-width-100perc">
                                        <tbody>
                                            <tr>
                                                <td width="640" valign="top" class="em-mob-wrap em-mob-width-100perc">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                                        em="atom">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset('admin_assets/img/images.jpg') }}"
                                                                        width="99" border="0" alt=""
                                                                        style="display: inline-block; width: 100%; max-width: 99px;">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr em="block" class="em-structure">
                                <td align="center" style="padding: 15px 30px; background-color: #e6e6e6;"
                                    class="em-mob-padding_left-20 em-mob-padding_right-20" bgcolor="#E6E6E6">
                                    <table align="center" border="0" cellspacing="0" cellpadding="0"
                                        class="em-mob-width-100perc">
                                        <tbody>
                                            <tr>
                                                <td width="580" valign="top" class="em-mob-wrap em-mob-width-100perc">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                                        em="atom">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 20px 15px; background-color: #ffffff; border-radius: 7px;"
                                                                    bgcolor="#FFFFFF">
                                                                    <div
                                                                        style="font-family: Georgia, serif; font-size: 24px; line-height: 30px; color: #333333;">
                                                                        <strong>Your password reset is here</strong>
                
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr em="block" class="em-structure">
                                <td align="center" style="padding: 15px 30px; background-color: #dfe6e6;"
                                    class="em-mob-padding_left-20 em-mob-padding_right-20" bgcolor="#dfe6e6">
                                    <table align="center" border="0" cellspacing="0" cellpadding="0"
                                        class="em-mob-width-100perc">
                                        <tbody>
                                            <tr>
                                                <td width="580" valign="top" class="em-mob-wrap em-mob-width-100perc">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                                        em="atom">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 10px 15px; background-color: #ffffff; border-radius: 7px;"
                                                                    bgcolor="#FFFFFF">
                                                                    <div
                                                                        style="font-family: -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 16px; line-height: 24px; color: #333333;">
                                                                        <span style="font-family: Georgia, serif;">Hello
                                                                            MixiShop's Customer,</span><br><br><span
                                                                            style="font-family: Georgia, serif;">To
                                                                            ensure the security of your account, you can
                                                                            easily reset your password:</span><br></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr em="block" class="em-structure">
                                <td align="center" bgcolor="#dfe6e6"
                                    style="background-color: #dfe6e6; padding-top: 15px; padding-bottom: 15px;">
                                    <!--[if (gte mso 9)|(IE)]>
		<table cellpadding="0" cellspacing="0" border="0" width="640"><tr><td>
		<![endif]-->
                                    <table align="center" cellpadding="0" cellspacing="0" border="0" width="100%"
                                        style="max-width: 580px;">
                                        <tbody>
                                            <tr>
                                                <td align="center" bgcolor="#FFFFFF"
                                                    style="padding-bottom: 5px; padding-left: 15px; padding-right: 15px; border-radius: 7px;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                                        em="atom">
                                                        <tbody>
                                                            <tr>
                                                                <td height="20"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table align="center" cellpadding="0" cellspacing="0" border="0"
                                                        width="91%">
                                                        <tbody>
                                                            <tr em="atom">
                                                                <td width="25" valign="top">
                                                                    <div
                                                                        style="font-family: Georgia, serif; font-size: 16px; line-height: 24px; color: #333333;">
                                                                        <strong>1.</strong></div>
                                                                </td>
                                                                <td align="left" valign="top">
                                                                    <div
                                                                        style="font-family: Georgia, serif; font-size: 16px; line-height: 24px; color: #333333;">
                                                                        Click the "Reset Password" button below.</div>
                                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                                        width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="10"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr em="atom">
                                                                <td width="25" valign="top">
                                                                    <div
                                                                        style="font-family: Georgia, serif; font-size: 16px; line-height: 24px; color: #333333;">
                                                                        <strong>2.</strong></div>
                                                                </td>
                                                                <td align="left" valign="top">
                                                                    <div
                                                                        style="font-family: Georgia, serif; font-size: 16px; line-height: 24px; color: #333333;">
                                                                        Create a strong password.</div>
                                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                                        width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="10"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr em="atom">
                                                                <td width="25" valign="top">
                                                                    <div
                                                                        style="font-family: Georgia, serif; font-size: 16px; line-height: 24px; color: #333333;">
                                                                        <strong>3.</strong></div>
                                                                </td>
                                                                <td align="left" valign="top">
                                                                    <div
                                                                        style="font-family: Georgia, serif; font-size: 16px; line-height: 24px; color: #333333;">
                                                                        Log in with your new password.</div>
                                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                                        width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="10"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                                        em="atom">
                                                        <tbody>
                                                            <tr>
                                                                <td height="10"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
		</td></tr></table>
		<![endif]-->
                                </td>
                            </tr>
                            <tr em="block" class="em-structure">
                                <td align="center" style="padding: 0px 30px; background-color: #dfe6e6;"
                                    class="em-mob-padding_left-20 em-mob-padding_right-20" bgcolor="#dfe6e6">
                                    <table align="center" border="0" cellspacing="0" cellpadding="0"
                                        class="em-mob-width-100perc">
                                        <tbody>
                                            <tr>
                                                <td width="580" valign="top" class="em-mob-wrap em-mob-width-100perc">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                                        em="atom">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 15px 0px;" align="center">
                                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                                        width="200">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" valign="middle"
                                                                                    height="45"
                                                                                    style="background-color: #333333; border-radius: 7px; height: 45px;">
                                                                                    <a href="" target="_blank" href="{{ route('auth.ShowResetPassword', ['token'=>$token]) }}"
                                                                                        style="display: block; height: 45px; font-family: Georgia, serif; color: #ffffff; font-size: 16px; line-height: 45px; text-decoration: none; white-space: nowrap;">Reset
                                                                                        password</a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr em="block" class="em-structure">
                                <td align="center" style="padding: 15px 30px 30px; background-color: #dfe6e6;"
                                    class="em-mob-padding_left-20 em-mob-padding_right-20" bgcolor="#dfe6e6">
                                    <table align="center" border="0" cellspacing="0" cellpadding="0"
                                        class="em-mob-width-100perc">
                                        <tbody>
                                            <tr>
                                                <td width="580" valign="top" class="em-mob-wrap em-mob-width-100perc">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                                        em="atom">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 10px 15px; border-radius: 7px; background-color: #ffffff;"
                                                                    bgcolor="#FFFFFF">
                                                                    <div
                                                                        style="font-family: Georgia, serif; font-size: 16px; line-height: 24px; color: #333333;">
                                                                        If you didn't initiate the password reset
                                                                        procedure, please ignore this email.</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr em="block" class="em-structure">
                                <td align="center" valign="top" style="background: #14b8b9;" bgcolor="#14B8B9">
                                    <div style="height: 60px; line-height: 60px; font-size: 8px;">&nbsp;</div>
                                    <table cellpadding="0" cellspacing="0" border="0" width="75%"
                                        style="width: 75%; min-width: 330px; border-width: 2px; border-style: solid; border-color: #E4E4E4; border-left: none; border-right: none; border-bottom: none;">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                                                    </div>
                                                    <!--[if (gte mso 9)|(IE)]>
										<table border="0" cellspacing="0" cellpadding="0">
										<tr><td dir="ltr" align="center" valign="top" width="240"><![endif]-->
                                                    <div dir="ltr"
                                                        style="display: inline-block; vertical-align: top; width: 240px;">
                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" valign="bottom" width="77">
                                                                        <a href="" target="_blank"
                                                                            style="display: block; max-width: 47px;">
                                                                            <img src="https://cdn.useblocks.io/1865/230816_431_pAvxZcK.png"
                                                                                width="47" border="0" alt=""
                                                                                style="display: block; width: 100%; max-width: 47px;">
                                                                        </a>
                                                                    </td>
                                                                    <td align="left" valign="bottom" width="35">
                                                                        <a href="" target="_blank"
                                                                            style="display: block; max-width: 27px;">
                                                                            <img src="https://cdn.useblocks.io/1865/230816_431_7XQHRua.png"
                                                                                width="27" border="0" alt=""
                                                                                style="display: block; width: 100%; max-width: 27px;">
                                                                        </a>
                                                                    </td>
                                                                    <td align="left" valign="bottom" width="35">
                                                                        <a href="" target="_blank"
                                                                            style="display: block; max-width: 27px;">
                                                                            <img src="https://cdn.useblocks.io/1865/230816_431_P5h6YQr.png"
                                                                                width="27" border="0" alt=""
                                                                                style="display: block; width: 100%; max-width: 27px;">
                                                                        </a>
                                                                    </td>
                                                                    <td align="left" valign="bottom" width="35">
                                                                        <a href="" target="_blank"
                                                                            style="display: block; max-width: 27px;">
                                                                            <img src="https://cdn.useblocks.io/1865/230816_431_x5j8yhO.png"
                                                                                width="27" border="0" alt=""
                                                                                style="display: block; width: 100%; max-width: 27px;">
                                                                        </a>
                                                                    </td>
                                                                    <td align="left" valign="bottom">
                                                                        <a href="" target="_blank"
                                                                            style="display: block; max-width: 27px;">
                                                                            <img src="https://cdn.useblocks.io/1865/230816_431_EGmkPkX.png"
                                                                                width="27" border="0" alt=""
                                                                                style="display: block; width: 100%; max-width: 27px;">
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--[if (gte mso 9)|(IE)]></td><td dir="ltr" align="center" valign="top" width="360"><![endif]-->
                                                    <div dir="ltr"
                                                        style="display: inline-block; vertical-align: top; width: 100%; max-width: 358px;">
                                                        <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                            &nbsp;</div>
                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <div class="Roboto400"
                                                                            style="font-family: Georgia, serif; color: #9a9a9a; font-size: 12px; line-height: 17px;">
                                                                            <span style="color: #ffffff;"><span
                                                                                    style="font-family: Georgia, serif;">You’ve
                                                                                    received this email because you
                                                                                    initiated the password reset
                                                                                    procedure</span>. </span><br><span
                                                                                style="color: #ffffff; font-family: Georgia, serif;">If
                                                                                you don't want to receive emails from
                                                                                us, you can </span><span
                                                                                style="text-decoration: underline;"><span
                                                                                    style="color: #ffffff; text-decoration: underline; font-family: Georgia, serif;">u</span><a
                                                                                    href="" target="_blank"
                                                                                    class="Roboto400"
                                                                                    style="font-family: Arial, sans-serif; color: #9a9a9a; font-size: 12px; line-height: 17px; text-decoration: underline;"><span
                                                                                        style="color: #ffffff; text-decoration: underline;"><span
                                                                                            style="font-family: Georgia, serif;">nsubscribe</span></span></a></span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--[if (gte mso 9)|(IE)]>
										</td></tr>
										</table><![endif]-->
                                                    <div style="height: 60px; line-height: 60px; font-size: 8px;">&nbsp;
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
				</td></tr></table>
				<![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
