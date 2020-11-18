export default class Carousel {
    constructor(carouselName) {
        
        this.carousels = {
            initVideoCarousel: function () {

                let owl_gallery = $('.owl-video_gallery.owl-carousel');
                let owl = owl_gallery.owlCarousel({
                    nav:true,
                    center: true,
                    margin: 2,
                    mouseDrag: false,
                    touchDrag: false,
                    onInitialized: show,
                    startPosition: owl_gallery.data('start'),
                    // rewind: true,
                    video: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        1200: {
                            items: 3
                        }
                    }
                })

                let items = owl.find('.owl-item');

                items.on('click', function (e) {
                    let ths = $(this);
                    let was_open = false;

                    if(!ths.hasClass('center') && !$(e.target).hasClass('js-close-gallery-video')) {

                        items.each(function () {
                            let el = $(this);
                            if(el.find('.js-video').hasClass('is-play')) {
                                was_open = true
                                el.find('.js-close-gallery-video').click()
                            }
                        })

                        if(!was_open) {
                            owl.trigger('to.owl.carousel', ths.index())

                            setTimeout(function () {
                                ths.find('.js-video-play').click()
                            }, 500)
                        }
                        else {
                            setTimeout(function () {
                                owl.trigger('to.owl.carousel', ths.index())
                            }, 500)

                            setTimeout(function () {
                                ths.find('.js-video-play').click()
                            }, 1000)
                        }
                    }
                })

                // owl.on('translate.owl.carousel', function (event) {
                //     let ths = $(this);
                //     let item = event.item.index; // Position of the current item
                //     let items = ths.find('.owl-item');
                //
                //     console.log('item', item)
                //     console.log('items.last()', items.last())
                //
                //     if(item === 0) {
                //         console.log('trigger')
                //         owl.trigger('add.owl.carousel', items.last(), 0)
                //     }
                //
                //     if(item === items.length - 1) {
                //         items.first().after(items.last())
                //     }
                // })
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
