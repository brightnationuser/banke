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


          let closeVideo = $('.js-close-video')



          $('.js-video-show').on('click', function () {
            let timeVideoOpen = 500;
            let ths = $(this)
            owl.trigger('to.owl.carousel', [ths[0].attributes['data-id'].value, timeVideoOpen])
            setTimeout(() => {
              player.loadVideoById(ths[0].attributes['data-yt-id'].value)
              $('.js-video-gallery__window').fadeIn(500)
            }, timeVideoOpen + 100)

            // console.log('ths index:', ths[0].attributes['data-id'].value)

          })

          closeVideo.on('click', function () {
            player.stopVideo();
            $('.js-video-gallery__window').fadeOut(500)
            // player.loadVideoById('8D9d9weVQnI');
            // alert('Hello my friend')
          })

          if (typeof (YT) == 'undefined' || typeof (YT.Player) == 'undefined') {
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            window.onYouTubePlayerAPIReady = function () {
              onYouTubePlayer();
            };
          }
        }

        function onYouTubePlayer() {

          player = new YT.Player('open-video', {
            height: '360',
            width: '640',
            videoId: 'dWSqqckKjVM',
            events: {
              'onReady': onPlayerReady,
              'onStop': onPlayerStop

            }
          });
        }

        function onPlayerReady() {

        }

        function onPlayerStop() {

        }

        loadPlayer()

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
