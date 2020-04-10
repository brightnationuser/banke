const textTrim = (selector) => {
    const $items = $(selector);

    $items.each(function (index, el) {

        let ths = $(el);

        let $more_button = ths.find('.read-more-btn');
        let text_open = ths.data('text-open');
        let text_close = ths.data('text-close');
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
        })
    })
};

export default textTrim;