import Slider from './Slider';
import Scene from './Scene';
import Carousel from './Carousel';
import '@fancyapps/fancybox';

class App {

    constructor() {
        // App modules
        this.initModules();

        this.initTabsSwitcher();
        this.initHeaderHamburger();
        this.initParallax();

        if($('.our-products__car').length > 0) {
            this.initCarSlider();
        }

        if($('.p-media').length > 0) {
            this.initMedia();
        }

        if($('.p-faq').length > 0) {
            this.initFaq();
        }
    }

    initCarSlider() {
        let scenes = [
            new Scene('scene_0', 'car'),
            new Scene('scene_1', 'car'),
            new Scene('scene_2', 'car')
        ];

        new Slider(scenes);
    }

    initTabsSwitcher() {
        Array.from(document.getElementsByClassName('page-tabs__item')).forEach(function(element) {
            element.addEventListener('click', function(e) {
                for(let tab of document.querySelectorAll('.page-tabs__item')) tab.classList.remove('m_active');
                e.target.className = e.target.className.concat(' m_active');

                for(let tab of document.querySelectorAll('.tab')) tab.classList.remove('m_active');
                document.querySelector('.tab[data-id="' + e.target.dataset.id + '"]').className = document.querySelector('.tab[data-id="' + e.target.dataset.id + '"]').className.concat(' m_active');
            });
        });
    }

    initHeaderHamburger() {
        $('.hamburger').click(function() {
            $(this).toggleClass('is-active');
            $('.header').toggleClass('m_opened');
        });
    }

    initParallax() {
        $('[data-type=parallax]').each(function(index, element) {
            function parallax() {
                var depth = parseInt($(element).data('depth'));
                var shift = parseInt($(element).data('shift'));
                var parent = $(element).parent();
                var parentTop = $(parent).offset().top;
                var scrollTop = $(window).scrollTop();
                var imgPos = shift + ((scrollTop-parentTop) / depth) + 'px';
                $(element).css('transform', 'translateY(' + imgPos + ')');
            }

            $(window).scroll(function() {
                parallax();
            });
            parallax();
        });
    }

    initMedia() {
        $('[data-fancybox="gallery"]').fancybox({
        });
    }

    initModules() {
        // Carousel initialization
        let carousel = new Carousel();
        carousel.init('News');
        carousel.init('Team');
    }

    initFaq() {
        $(".questions__item .item__q").click(function () {
            $('.item__q.m_active').not(this).removeClass('m_active').siblings('.item__a').slideUp();
            $(this).addClass('m_active').siblings('.item__a').stop(1,0).slideToggle();
        });
    }
}

export default App;
