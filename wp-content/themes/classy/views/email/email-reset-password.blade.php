<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{WP_HOME}}/wp-content/themes/classy/dist/style.css">
</head>

<body class="email-template__container"
      style="background-image: url({{WP_HOME}}/wp-content/themes/classy/dist/images/email-template/bg.jpg)">
<div class="email-template__container-inner">
    <table class="email-template__table-top">
        <tr>
            <td>
                <div class="email-template__logo">
                    <img class="no-lazyload" src="http://banke-pro.idudka.com/wp-content/uploads/2021/01/logo.png" alt="logo"
                         width="151">
                </div>
                <div class="email-template__wrapper-line">
                    <div class="email-template__line"></div>
                </div>
                <div class="email-template__title email-template__center">Reset Password</div>
                <div class="email-template__created">You're receiving this email because you requested a password reset for your Banke account.
                    Please click the link below to set a new password:
                </div>
                <div class="email-template__reset-password__wrapper">
                    <a class="email-template__reset-password" href="https://banke.pro" target="_blank"
                    >{{WP_HOME}}/reset-password/?key={{ $post['key'] }}&username={{ $post['username'] }}</a>
                </div>
            </td>
        </tr>
    </table>


    <table class="email-template__info">
        <tr>
            <td class="email-template__info-inner">
                <span>Ormstoft 5 | 6400 Sønderborg | Denmark</span>
                <span class="divider">|</span>
                <a class="email-template__footer-phone email-template__color-grey" href="tel:+380630342390" style="margin-top: 3px;">+45 7777 16
                    16</a>
                <span class="divider">|</span>
                <a class="email-template__link" href="https://banke.pro" target="_blank"
                   rel="noopener">banke.pro</a>

            </td>
        </tr>
    </table>
</div>

</body>
</html>