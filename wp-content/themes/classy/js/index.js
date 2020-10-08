// Import libs
import Blazy from 'blazy';
import cookieconsent from 'cookieconsent';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
import AOS from 'aos';

import * as JQuery from "jquery";
window.$ = JQuery.default;

// Import main scripts
import App from './App';
import textTrim from './text-trim';
import popup from './popup';
import video from './video';
import tipsImage from './blocks/tips-image';
import YtApiPlayer from './blocks/yt-api-player';

$(document).ready(function () {
    video();
    popup();
    textTrim('.js-trim-text');
    textTrim('.js-intro-content', {show_block:true});
    tipsImage('.js-tips-image');

    new YtApiPlayer({
        player_id: 'product-video',
        video_id: 'from_data',
        play_button: '.js-video-play'
    });

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
// Init main scripts
$(document).ready(function() {
    new Blazy()
    new App()
});

// Cookieconsent
$(document).ready(function(){
    var GaInited = false;

    function delete_all_cookie( name ) {
        var arrSplit = document.cookie.split(";");
        for(var i = 0; i < arrSplit.length; i++)
        {
            var cookie = arrSplit[i].trim();
            var cookieName = cookie.split("=")[0];

            if(cookieName != 'cookieconsent_status') {
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

        /*if(status != 'dismiss') {
            initGA();
        }

        if(status == undefined) {
            setTimeout(function () {
                $('.b24-widget-button-position-bottom-right').addClass('b24-widget-button-position-bottom-right_bottom100');
            }, 500);
            setTimeout(function () {
                $('.b24-widget-button-position-bottom-right').addClass('b24-widget-button-position-bottom-right_bottom100');
            }, 1000);
        }*/

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
                    if(status == 'allow') {
                        //initGA();
                    }
                    else {
                        delete_all_cookie();
                    }

                    //$('.b24-widget-button-position-bottom-right').removeClass('b24-widget-button-position-bottom-right_bottom100');
                }
            },
            onStatusChange: function(status, chosenBefore) {
                var type = this.options.type;
                var didConsent = this.hasConsented();

                if (type == 'opt-in' && didConsent) {
                    // enable cookies
                    if(status == 'allow') {
                        //initGA();
                        //$('.b24-widget-button-position-bottom-right').removeClass('b24-widget-button-position-bottom-right_bottom100');
                    }
                    else {
                        delete_all_cookie();
                        location.reload();
                    }
                }
            }
        });
    };

    var initGA = function () {
        if(GaInited == false) {
            //console.log(9);
            // gtag('js', new Date());
            // gtag('config', 'UA-53333340-1');

            // (function(w,d,u){
            //     var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
            //     var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
            // })(window,document,'//b24.sb-sb.com/upload/crm/site_button/loader_7_tzvxv1.js');

            // <!--ремаркетинг-->
            // window.google_trackConversion({
            //     google_conversion_id: 814069041,
            //     google_custom_params: window.google_tag_params,
            //     google_remarketing_only: false
            // });
        }

        GaInited = true;
    };

    initCookieconsent();
});

