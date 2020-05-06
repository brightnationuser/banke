const textTrim = (selector, opt = {}) => {
    const $items = $(selector);
    const defaults = {
        show_block: false
    }

    let options = Object.assign(defaults, opt);

    $items.each(function (index, el) {

        let ths = $(el);

        let $more_button = ths.find('.read-more-btn');
        let text_open = ths.data('text-open');
        let text_close = ths.data('text-close');

        if(options.show_block) {
            let $hide_able_block = ths.find('.js-hide-able');

            console.log($hide_able_block);

            $more_button.on('click', function () {

                if($hide_able_block.hasClass('opened')) {
                    $hide_able_block.removeClass('opened');
                    $hide_able_block.slideUp();
                    $more_button.text(text_open);
                }
                else {
                    $hide_able_block.addClass('opened');
                    $hide_able_block.slideDown();
                    $more_button.text(text_close);
                }
            });
        }
        else {
            let slice_len = ths.data('text-length');
            let text_el = ths.find('.js-text');
            let text_full = text_el.text();
            let text_sliced = text_full.slice(0, slice_len);

            text_el.text(text_sliced + '...');
            $more_button.text(text_open);
            ths.addClass('sliced');

            $more_button.on('click', function () {
                if(ths.hasClass('sliced')) {
                    text_el.text(text_full);
                    $more_button.text(text_close);
                    ths.removeClass('sliced');
                }
                else {
                    text_el.text(text_sliced + '...');
                    $more_button.text(text_open);
                    ths.addClass('sliced');
                }
            });
        }
    });
};

export default textTrim;