export default class Carousel {
    constructor(carouselName) {
        
        this.carousels = {
            initVideoCarousel: function () {

                $('.owl-video_gallery.owl-carousel').owlCarousel({
                    nav:true,
                    center: true,
                    margin: 2,
                    mouseDrag: false,
                    touchDrag: false,
                    onInitialized: show,
                    startPosition: 1,
                    video:true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        1200: {
                            items: 3
                        }
                    }
                })
            },

            initNewsCarousel: function () {
                $('.b-news__carousel.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    onInitialized: show,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        630: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
            },

            initReferencesThinCarousel: function () {
                $('.js-references-slider').owlCarousel({
                    loop: true,
                    margin: 5,
                    onInitialized: show,
                    onTranslate: function() {
                        $('.owl-item').removeClass('rounded-first').removeClass('rounded-last');
                    },
                    onChange: function() {
                        $('.owl-item').removeClass('rounded-first').removeClass('rounded-last');
                    },
                    onDrag: function() {
                        $('.owl-item').removeClass('rounded-first').removeClass('rounded-last');
                    },
                    onTranslated: function() {
                        $('.active:first').addClass('rounded-first');
                        $('.active:last').addClass('rounded-last');
                    },
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        992: {
                            items: 4
                        }
                    }
                })
            },

            initReferencesCarousel: function () {
                $('.references.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 30,
                    onInitialized: show,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        630: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
            },
        }
        
        function show(event) {
            $(event.target).addClass('m_loaded');
        }
        
    }
    
    init(carouselName) {
        this.carousels["init" + carouselName + "Carousel"]();
        $('.owl-prev span, .owl-next span').text('');
        $('.js-references-slider .active:first').addClass('rounded-first');
        $('.js-references-slider .active:last').addClass('rounded-last');
    }
}
