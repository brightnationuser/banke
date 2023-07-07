import Slider from './scene/Slider';
import Scene from './scene/Scene';
import Carousel from './Carousel';
import '@fancyapps/fancybox';
import Animator from './Animator';
import Animation from './animation/Animation';
import initVueInstances from './Vue/indexVue'
import textTrimSimple from "./text-trim-simple";

class App {

    constructor() {

        //this.tabsMenuParent();
        
        this.initHeaderHamburger();
        
        this.initAnimations();

        // WPCF7 Antispam
        this.initWPCF7Antispam();

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

        if($('.js-benefit').length > 0) {
            this.initJsBenefits();
        }
        
        let vacanciesCards = $('.js-vacancies-card-description')
        if(vacanciesCards.length > 0) {
            textTrimSimple(vacanciesCards, 3, 200)
        }

        //$('body').addClass('m_ready');
        setTimeout(function () {
            $('.js-disabled').removeClass('js-disabled')
            $('body').addClass('m_ready');
        }, 100);

        $("a:not(.disable_preloader)").click(function () {
            //$('body').removeClass('m_ready');
        });

        if($('#js_hero_hero').length > 0) {
            new Animation();
        }

        window.onpageshow = function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        };

        initVueInstances()
    }

    initCarSlider() {
        // let scenes = [
        //     new Scene('scene_0', 'car'),
        //     new Scene('scene_1', 'car'),
        //     new Scene('scene_2', 'car')
        // ];
        //
        // new Slider(scenes);
    }

    initEptoSlider() {
        new Slider($('.m-epto'));
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
            $('body').toggleClass('overflow-hidden');
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
        console.log('init carousels')
        let carousel = new Carousel();
        carousel.init('News');
        carousel.init('MainPage');
        carousel.init('References');
        carousel.init('ReferencesThin');
        carousel.init('Video')
        carousel.init('WhatWeDo')
        carousel.init('RelatedInsights')
    }

    initFaq() {
        $(".questions__item .item__q").click(function () {
            $('.item__q.m_active').not(this).removeClass('m_active').siblings('.item__a').slideUp();
            $(this).addClass('m_active').siblings('.item__a').stop(1,0).slideToggle();
        });
    }

    tabsMenuParent() {
        // const $tabs = $('.page-tabs');
        // if($tabs.length > 0) {
        //     $('.current-menu-item, .current-menu-parent').addClass('no-underline');
        // }
        // else {
        //     $('.current-menu-item, .current-menu-parent').addClass('underline');
        // }

        $('.current-menu-item, .current-menu-parent').addClass('underline');
    }

    //antispam for contact form
    initWPCF7Antispam() {
        $('.qqq input').val('745643534543745634532');

        console.log($('.qqq').val());
    }

    initJsBenefits() {
        let benefits = $('.js-benefit')

        benefits.on('click touch', function () {
            let ths = $(this)

            if(ths.hasClass('active')) {
                benefits.removeClass('active')
            }
            else {
                benefits.removeClass('active')
                ths.addClass('active')
            }
        })
    }
}

export default App;
