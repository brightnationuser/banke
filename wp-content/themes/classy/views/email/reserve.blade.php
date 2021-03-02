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
<body class="email-template" style="background-image: url({{WP_HOME}}/wp-content/themes/classy/dist/img/email-template/bg.jpg)">
<div class="container">
    <div class="container-inner">
        <div class="email-template__top">
            <table class="email-template__top-table">
                <tr>
                    <td>
                        <div class="email-template__logo">
                            <img class="no-lazyload" src="http://banke-pro.idudka.com/wp-content/uploads/2021/01/logo.png" alt="logo"  width="151">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="email-template__title">Welcome to Banke!</div>
        <div class="email-template__text">You created account on banke.pro. Please confirm your email to get access to Banke materials</div>

        <div class="email-template__stats gp-stats">
            {{--<div class="gp-stats__title">Ваша конфигурация состоит из</div>--}}
            <div class="gp-stats__table">
                <table>
                    <tr>
                        <th style="width: 240px;">Наименование</th>
                        {{--<th style="width: 175px;">Количество</th>--}}
                        <th style="width: 225px;">Размер</th>
                        <th style="width: 161px;">Цена</th>
                    </tr>
                    <tr>
                        <td style="width: 156px;">Ткань {{ $post['materialName'] }} {{ $post['materialColor'] }}</td>
                        <td style="width: 125px; white-space: nowrap;"></td>
                        <td style="width: 100px; white-space: nowrap;"></td>
                    </tr>
                </table>
            </div>
            <table class="email-template__bottom">
                <tr>
                    <td>
                        <span class="gp-stats__total-text">Полная стоимость&nbsp;&nbsp;</span>
                        <span class="gp-stats__total">
                            <span style="width: 100px;text-align:left;">{{ $post['total'] }} {{ get_field('грн', 'option') }}</span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td><a href="{{WP_HOME}}" class="gp-stats__button">Оформить покупку</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="email-template__footer">
    <div class="container">
        <div class="container-inner">
            <table class="email-template__footer-table">
                <tr>
                    <td>
                        <a class="email-template__footer-site" href="https://blanche.ua" target="_blank" rel="noopener">blanche.ua</a>
                        <span class="divider">|</span>
                        <a class="email-template__footer-phone" href="tel:+380630342390" style="margin-top: 3px;">+380 63 034 23 90</a>
                    </td>
                    <td>
                        <table class="email-template__socials" align="right">
                            <tr>
                                <td>
                                    <a href="https://www.facebook.com/TMBlanche/" target="_blank" style="margin-right: 7px;">
                                        <img class="no-lazyload" src="{{WP_HOME}}/wp-content/themes/classy/assets/img/email-template/facebook.png" alt="facebook"
                                             width="26" height="26"
                                        >
                                    </a>
                                </td>
                                <td>
                                    <a href="https://www.instagram.com/blanche_ua/" target="_blank" style="margin-right: 7px;">
                                        <img class="no-lazyload" src="{{WP_HOME}}/wp-content/themes/classy/assets/img/email-template/instagram.png" alt="instagram"
                                             width="26" height="26"
                                        >
                                    </a>
                                </td>
                                <td>
                                    <a href="https://www.youtube.com/channel/UClrMRp_6arIlOUis5wJMuNg" target="_blank">
                                        <img class="no-lazyload" src="{{WP_HOME}}/wp-content/themes/classy/assets/img/email-template/youtube.png" alt="youtube"
                                             width="26" height="26"
                                        >
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>