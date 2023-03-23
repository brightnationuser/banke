const contactFormOverlay = (overlay) => {
    const $overlay = $(overlay);

    $(window).scroll(function() {
        let scroll = $(window).scrollTop();
        if (scroll >= 1) {
            $("header").addClass("white");
        } else {
            $("header").removeClass("white");
        }
    });

    document.addEventListener( 'wpcf7mailsent', function( event ) {
        $overlay.addClass("active")
    }, false );
    $overlay.find('.cross').on("click",function(){
        $overlay.removeClass("active")
    })

};

export default contactFormOverlay;