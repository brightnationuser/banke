const tipsImage = (container) => {
    const $container = $(container);

    if($container.length > 0) {

        const $info_dots = $container.find('.infobox__dot');

        $info_dots.on('mouseenter', function () {

            let ths = $(this);
            ths.parents('.infobox-w').find('.infobox__content').stop(1,0).fadeIn(500);

        }).on('mouseleave', function () {

            let ths = $(this);
            ths.parents('.infobox-w').find('.infobox__content').stop(1,0).fadeOut(500);

        });
    }

};

export default tipsImage;