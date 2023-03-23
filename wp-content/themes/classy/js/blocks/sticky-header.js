const stickyHeader = () => {
    $(window).scroll(function() {
        let scroll = $(window).scrollTop();
        if (scroll >= 1) {
            $("header").addClass("white");
        } else {
            $("header").removeClass("white");
        }
    });
};

export default stickyHeader;