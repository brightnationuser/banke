import Slider from './Slider';
import Scene from './Scene';
import Carousel from './Carousel';
import '@fancyapps/fancybox';
import Animator from './Animator';
import Animation from './animation/Animation';

class App {

    constructor() {
        
        this.initHeaderHamburger();
        
        this.initAnimations();

        if($('.p-media').length > 0) {
            this.initMedia();
        }

        if($('.p-faq').length > 0) {
            this.initFaq();
        }

        if($('.owl-carousel').length > 0) {
            this.initCarousels();
        }

        if($('.page-tabs__item').length > 0) {
            this.initTabsSwitcher();
        }

        if($('.our-products__car').length > 0) {
            this.initCarSlider();
        }

        if($('.epto__image').length > 0) {
            this.initEptoSlider();
        }

        //$('body').addClass('m_ready');
        setTimeout(function () {
            $('body').addClass('m_ready');
        }, 100);

        $("a:not(.disable_preloader)").click(function () {
            $('body').removeClass('m_ready');
        });

        if($('#js_hero_hero').length > 0) {
            new Animation();
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

    initEptoSlider() {
        let scenes = [
            new Scene('scene_4', 'epto'),
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

    initAnimations() {
        if($('[data-type=parallax]').length > 0)  this.initParallax();

        if($('body.home').length > 0)             new Animator('Home', ['.our-products', '.epto', '.contact-us']);
        if($('body.archive-news').length > 0)     new Animator('News');
        if($('body.single-news').length > 0)      new Animator('SingleNews', ['.b-news__carousel']);
        if($('body.p-about').length > 0)          new Animator('About', ['.team']);
        if($('body.p-faq').length > 0)            new Animator('FAQ');
        if($('body.p-media').length > 0)          new Animator('Media');
        if($('body.p-products').length > 0)       new Animator('Products');
        if($('body.p-references').length > 0)     new Animator('References');
        if($('body.p-epto-systems').length > 0)   new Animator('EPTOSystems', ['.concept__description', '.concept__principles']);
    }

    initMedia() {
        $('[data-fancybox="gallery"]').fancybox({
        });
    }

    initCarousels() {
        let carousel = new Carousel();
        carousel.init('News');
        carousel.init('References');
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
