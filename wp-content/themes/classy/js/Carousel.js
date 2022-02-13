export default class Carousel {


    constructor(carouselName) {

        this.carousels = {
            initVideoCarousel: function () {

                let player;

                let owl_gallery = $('.owl-video_gallery.owl-carousel');
                let owl = owl_gallery.owlCarousel({
                    loop: true,
                    nav: true,
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

                function loadPlayer() {

                    const closeVideo = $('.js-close-video') // Крестик для закрытия видео
                    const videoGalleryBlock = $('.js-video-show') // Класс отвечает за отображение видео по умолчанию display: none;
                    const getVideoInfoSize = $('.owl-item.active.center .js-video-show') // Узнаем размеры блоков после загрузки под разные размеры
                    let clickedVideo = null // Состояние, которое отвечает за клик на видео и присвавивает ему данные

                    let freezeClick = false // Заморозка на переключалку, что бы избежать багов

                    let getBaseHeight = getVideoInfoSize.height() // Узнаем базовою высоту блока
                    let getBaseWidth = getVideoInfoSize.width() // Узнаем базовою ширину блока

                    let getCenterHeight = getVideoInfoSize.height() * 1.25 // Узнаем размер блока, которое увеличинно в центре
                    let getCenterWidth = getVideoInfoSize.width() * 1.25 // Узнаем размер блока, которое увеличинно в центре


                    $('.owl-nav button').on('click', function () { // Если нажимаем на данные, анулируем логику полностью и приводим в дефолтное состояние
                        $(clickedVideo).css('width', getBaseWidth).css('height', getBaseHeight)
                        clickedVideo = null
                    })

                    videoGalleryBlock.on('click', function () {

                        if (freezeClick) {
                            console.log('FLOOD')
                            return
                        }
                        player.stopVideo();
                        const ths = $(this)
                        const getCenterClicked = ths.parent().parent().hasClass('owl-item active center')
                        let dataIdGallery = ths[0].attributes['data-id'].value // Узнаем Id видео
                        let dataIdVideo = ths[0].attributes['data-yt-id'].value // Узнаем линку на Ютуб


                        if (window.innerWidth >= 1200) {

                            if (!getCenterClicked) { // Проверка ли не кликнуто по центру


                                freezeClick = true
                                $('.js-video-gallery__window').hide() // Скрываем видео
                                $(clickedVideo).css('width', getCenterWidth).css('height', getCenterHeight) // Устанавливаем размер основнога окна ( Прошлое просм. видео )
                                setTimeout(() => {
                                    $(clickedVideo).css('width', getBaseWidth).css('height', getBaseHeight) // Устанавливаем базовый размер прошлого видео
                                    owl.trigger('to.owl.carousel', [dataIdGallery, 1000]) // Переключаем на новое видео [ dataIdGallery: На какой Id ссылается, 1000 - Время переключалки триггера]
                                    setTimeout(() => { // Через 500 м.с делаем размер пропопорционально ютубу
                                        console.log('Yes')
                                        ths.css('width', '600px').css('height', '320px')
                                        setTimeout(() => { // И уже как повляется картинка для видео, мы через 500 м.с отображаем саом видео
                                            player.loadVideoById(dataIdVideo)
                                            $('.js-video-gallery__window').fadeIn(500)
                                            clickedVideo = ths
                                            freezeClick = false
                                        }, 500)
                                    }, 500)
                                }, 1000)


                            } else {

                                ths.css('width', '600px').css('height', '320px')
                                owl.trigger('to.owl.carousel', [dataIdGallery, 1000])
                                clickedVideo = ths
                                freezeClick = true
                                setTimeout(() => {
                                    player.loadVideoById(dataIdVideo)
                                    $('.js-video-gallery__window').show()
                                    freezeClick = false
                                }, 1000)
                            }
                        } else {
                            player.loadVideoById(dataIdVideo)
                            $('.js-video-gallery__window').fadeIn(500)
                        }
                    })

                    closeVideo.on('click', function () {
                        player.stopVideo();
                        $('.js-video-gallery__window').hide()
                        $(clickedVideo).css('width', getCenterWidth).css('height', getCenterHeight)
                        freezeClick = false
                        // player.loadVideoById('8D9d9weVQnI');
                        // alert('Hello my friend')
                    })
                }

                function onPlayerReady() {
                    //remove preloader
                    loadPlayer()
                    $('.embed-youtube-video').removeClass('is-loading');
                }

                if (typeof (YT) == 'undefined' || typeof (YT.Player) == 'undefined') {

                    window.onYouTubePlayerAPIReady = function () {
                        onYouTubePlayer();
                    };

                    var tag = document.createElement('script');
                    tag.src = "https://www.youtube.com/iframe_api";
                    var firstScriptTag = document.getElementsByTagName('script')[0];
                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                } else {
                    onYouTubePlayer()
                }

                function onYouTubePlayer() {

                    player = new YT.Player('open-video', {
                        height: '360',
                        width: '640',
                        videoId: '',
                        events: {
                            'onReady': onPlayerReady,
                            'onStop': onPlayerStop
                        }
                    });
                }

                function onPlayerStop() {

                }
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
                    onTranslate: function () {
                        $('.owl-item').removeClass('rounded-first').removeClass('rounded-last');
                    },
                    onChange: function () {
                        $('.owl-item').removeClass('rounded-first').removeClass('rounded-last');
                    },
                    onDrag: function () {
                        $('.owl-item').removeClass('rounded-first').removeClass('rounded-last');
                    },
                    onTranslated: function () {
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

            initWhatWeDoCarousel: function () {
                $('.js-what-we-do-slider.owl-carousel').owlCarousel({
                    loop: false,
                    margin: 30,
                    onInitialized: show,

                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            margin: 0,
                            items: 1
                        },
                        601: {
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
