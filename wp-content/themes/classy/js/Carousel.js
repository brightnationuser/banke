export default class Carousel {
  constructor(carouselName) {

    this.carousels = {
      initNewsCarousel: function () {
        $('.b-news__carousel.owl-carousel').owlCarousel({
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
              items: 4
            }
          }
        });
      },

      initTeamCarousel: function () {
        $('.team__members.owl-carousel').owlCarousel({
          loop: false,
          margin: 30,
          onInitialized: show,
          nav: true,
          dots: false,
          responsive: {
            0: {
              items: 1
            },
            500: {
              items: 2
            },
            800: {
              items: 3
            },
            1200: {
              items: 4
            }
          }
        });
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
  }
}
