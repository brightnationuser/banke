/**
 * PopUp
 *
 * @returns {void}
 */
const popup = () => {
    const blocks = $('.js-popup');
    const actions = $('.js-popup-action');
    const close = $('.js-popup-close');
    const activeClass = 'is-opened';

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
        $(this).closest('.js-popup').removeClass(activeClass);
    });
};

export default popup;
