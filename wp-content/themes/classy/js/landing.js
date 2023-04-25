import AOS from 'aos';
import cookieconsent from 'cookieconsent';
import * as JQuery from "jquery";

window.$ = JQuery.default;

$(document).ready(function () {
    setTimeout(function () {
        let window_height = $(window).height();
        let offset = window_height / 6;

        console.log(offset);

        $('.aos-animation:not([data-aos])').attr('data-aos', 'fade-up');
        $('.aos-animation:not([data-aos-anchor-placement])').attr('data-aos-anchor-placement', 'top-bottom');
        $('.aos-animation:not([data-aos-offset])').attr('data-aos-offset', offset);

        AOS.init({
            duration: 500,
        });
    }, 100);
});

document.addEventListener('wpcf7invalid', function (e) {
    if (document.querySelector('.modal-team__btn .wpcf7-not-valid-tip')) {
        document.querySelector('.wpcf7-validation-errors').textContent = document.querySelector('.modal-team__btn .wpcf7-not-valid-tip').textContent;
    }
}, false);

document.addEventListener('wpcf7mailsent', function (event) {
    if (document.querySelector('.modal-thank')) {
        document.querySelector(`#${event.detail.id}`).style.display = 'none';
        document.querySelector('.modal-thank').style.display = 'block';
    }
}, false);


// Cookieconsent
$(document).ready(function () {
    var GaInited = false;

    function delete_all_cookie(name) {
        var arrSplit = document.cookie.split(";");
        for (var i = 0; i < arrSplit.length; i++) {
            var cookie = arrSplit[i].trim();
            var cookieName = cookie.split("=")[0];

            if (cookieName != 'cookieconsent_status') {
                console.log(cookieName);
                document.cookie = cookieName + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                document.cookie = cookieName + '=; Path=/; Domain=*; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                document.cookie = cookieName + '=; Path=/; Domain=.banke.pro; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            }
        }
    }

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }

    var initCookieconsent = function () {
        var status = getCookie('cookieconsent_status');

        var trans = window.trans;

        window.cookieconsent.initialise({
            type: 'opt-in',
            position: 'bottom',
            revokable: true,
            content: {
                message: trans.cookieconsent_message,
                dismiss: trans.cookieconsent_dismiss,
                allow: trans.cookieconsent_allow,
                link: trans.cookieconsent_link,
                href: trans.cookieconsent_href
            },
            onInitialise: function (status) {
                var type = this.options.type;
                var didConsent = this.hasConsented();
                if (type == 'opt-in' && didConsent) {
                    // enable cookies
                    if (status == 'allow') {
                        //initGA();
                    } else {
                        delete_all_cookie();
                    }

                    //$('.b24-widget-button-position-bottom-right').removeClass('b24-widget-button-position-bottom-right_bottom100');
                }
            },
            onStatusChange: function (status, chosenBefore) {
                var type = this.options.type;
                var didConsent = this.hasConsented();

                if (type == 'opt-in' && didConsent) {
                    // enable cookies
                    if (status == 'allow') {
                        //initGA();
                        //$('.b24-widget-button-position-bottom-right').removeClass('b24-widget-button-position-bottom-right_bottom100');
                    } else {
                        delete_all_cookie();
                        location.reload();
                    }
                }
            }
        });
    };

    var initGA = function () {
        if (GaInited == false) {
        }

        GaInited = true;
    };

    initCookieconsent();
});

