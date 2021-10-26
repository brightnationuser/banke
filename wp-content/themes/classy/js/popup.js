/**
 * PopUp
 *
 * @returns {void}
 */
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

        if (popup.attr('id') === 'youtube-video') {
            localStorage.setItem('popup-youtube', '1');
        }

        popup.removeClass(activeClass);

        /*if (iframe.length) {
            let videoSrc = iframe.prop('src');

            iframe.prop('src', '');
            iframe.prop('src', videoSrc);
        }*/
    });

    /*if (body.hasClass('home') && localStorage.getItem('popup-youtube') !== '1') {
        setTimeout(() => {
            $('#youtube-video').addClass(activeClass);
        }, 2000);
    }*/
};

export default popup;
