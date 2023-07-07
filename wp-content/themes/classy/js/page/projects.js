const owl = $('.partners-list');

const owlOptions = {
    loop: false,
    margin: 30,
    smartSpeed: 700,
    nav: true,
    items: 1,
    autoHeight: true,
    navText: ["<i class='icon-chevron-left'></i>", "<i class='icon-chevron-right'></i>"]

};

if ($(window).width() < 992) {
    const owlActive = owl.owlCarousel(owlOptions);
} else {
    owl.addClass('off');
}

$(window).resize(function() {
    if ( $(window).width() < 992 ) {
        if ( owl.hasClass('off') ) {
            const owlActive = owl.owlCarousel(owlOptions);
            owl.removeClass('off');
        }
    } else {
        if ( !owl.hasClass('off') ) {
            owl.addClass('off').trigger('destroy.owl.carousel');
            owl.find('.owl-stage-outer').children(':eq(0)').unwrap();
        }
    }
});