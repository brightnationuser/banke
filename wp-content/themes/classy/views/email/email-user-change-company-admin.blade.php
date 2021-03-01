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

<body class="email-template__container">
<div class="email-template__wrapper">
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
                    <div class="email-template__title email-template__center">User changed his company!</div>
                    <div class="email-template__user-info">
                        <div class="user-info__username">Name: {{ $post['name'] }} </div>
                        <div class="user-info__user-email">Email: {{ $post['email'] }}</div>
                        <div class="user-info__user-company">New Company: {{ $post['new_company'] }}</div>
                        <div class="user-info__user-company">Old Company: {{ $post['old_company'] }}</div>
                        <div class="user-info__user-position">Position: {{ $post['position'] }}</div>
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
                    <a class="email-template__link email-template__link" href="https://banke.pro" target="_blank"
                       rel="noopener">banke.pro</a>

                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
