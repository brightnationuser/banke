/**
 * PopUp
 *
 * @returns {void}
 */
import Cookies from 'js-cookie';

const popup = () => {
    const body = $('body');
    const blocks = $('.js-popup');
    const actions = $('.js-popup-action');
    const close = $('.js-popup-close');
    const video = $('.js-popup-video');
    const activeClass = 'is-opened';

    if (!blocks.length) return;

    actions.on('click', function (event) {
        const el = $(this);
        const target = el.attr('href');
        const block = $(target);

        if (block.length) {
            event.preventDefault();

            blocks.removeClass(activeClass);
            block.addClass(activeClass);
        }
    });

    close.on('click', function () {
        const popup = $(this).closest('.js-popup');
        //const iframe = popup.find('iframe');
        
        if (popup.attr('id') === 'popup-vacancy') {
            localStorage.setItem('popup-vacancy', '1');
        }

        if (popup.attr('id') === 'popup-anniversary') {
            Cookies.set('popup-anniversary', 'closed', { expires: 7 })
        }

        popup.removeClass(activeClass);

        /*if (iframe.length) {
            let videoSrc = iframe.prop('src');

            iframe.prop('src', '');
            iframe.prop('src', videoSrc);
        }*/
    });

    // if (body.hasClass('page-template-classy-powertrains') && Cookies.get('popup-powertrains') !== 'closed') {
    //     setTimeout(() => {
    //         $('#youtube-video').addClass(activeClass);
    //     }, 2000);
    // }
    
    if (body.hasClass('home') && localStorage.getItem('popup-vacancy') !== '1') {
        setTimeout(() => {
            $('#popup-vacancy').addClass(activeClass);
        }, 2000);
    }

    if (body.hasClass('home') && Cookies.get('popup-anniversary') !== 'closed') {
        setTimeout(() => {
            $('#popup-anniversary').addClass(activeClass);
        }, 2000);
    }

    $('.popup__link').click(function () {
        Cookies.set('popup-anniversary', 'closed', { expires: 7 });
        window.location.href = $(this).data('link');
    });

    $('.js-powertrains-popup .js-popup-close').click( function () {
        Cookies.set('popup-powertrains', 'closed', { expires: 7 });
    })
};

export default popup;
