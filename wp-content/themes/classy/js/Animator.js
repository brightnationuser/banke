import TweenMax from "gsap/TweenMax";
import { TimelineMax } from "gsap";

export default class Animator {

    constructor(page, scrollPoints = []) {       
        // За сколько пикселей до блока начинать его анимацию
        const distanceBeforeAnimation = 700;

        // Массив блоков которые уже были анимированы
        let animated = [];

        // Главный таймлайн
        this.timeline = new TimelineMax();

        // Определяем анимации по таймлайну для текущей страницы
        this[`set${page}Timeline`]();
        $('body').addClass('m_ready');

        // Анимация начинается сразу после загрузки страницы
        this.timeline.play();

        // При скролле определяем дошли ли мы до блока который нужно анимировать
        // Если да, то отжимаем паузу и считаем блок анимированным
        let $w = $(window).scroll(() => {
            scrollPoints.forEach((container) => {
                if(($w.scrollTop() > $(container).offset().top - distanceBeforeAnimation) && !animated.includes(container)) {
                    animated.push(container);
                    this.timeline.play(container);
                }
            });
        });
    }

    setHomeTimeline() {
        this.timeline.add(TweenMax.fromTo('.hero .parallax', 0.5, { opacity: 0, y: -100 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.hero h1', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.hero .hero__button', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.choreographItems('.benefit');
        this.timeline.pause();

        this.timeline.addLabel('.our-products');
        this.timeline.add(TweenMax.fromTo('.our-products h2', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.pause();

        this.timeline.addLabel('.epto');
        this.timeline.add(TweenMax.fromTo('.epto .epto__bg', 0.5, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.epto .epto__image', 0.55, { opacity: 0, y: -40 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.05);
        this.timeline.add(TweenMax.fromTo('.epto h3', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.epto .description__text', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.epto .description__button', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.pause();
        
        this.setContactsTimeline();
    }

    setEPTOSystemsTimeline() {
        this.timeline.add(TweenMax.fromTo('.concept__main h2', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.epto__bg', 0.5, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.epto__image', 0.55, { opacity: 0, y: -40 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.05);
        this.choreographItems('.content-text.m_2 .text-column');
        this.timeline.pause();

        this.timeline.addLabel('.concept__description');
        this.timeline.add(TweenMax.fromTo('.concept__description h2', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.concept__description img', 1, { opacity: 0, x: -100 }, { opacity: 1, x: 0 }));
        this.timeline.delay(0.1);
        this.choreographItems('.content-text.m_1 .text-column');
        this.timeline.pause();

        this.timeline.addLabel('.concept__principles');
        this.timeline.add(TweenMax.fromTo('.concept__principles h2', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.choreographItems('.concept__principles .benefit');
        this.timeline.pause();
    }

    setAboutTimeline() {
        this.timeline.add(TweenMax.fromTo('.history h2', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.history_img', 0.5, { opacity: 0, x: -50 }, { opacity: 1, x: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.history_text', 0.55, { opacity: 0, y: -40 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);

        this.timeline.addLabel('.team');
        this.timeline.add(TweenMax.fromTo('.team h2', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.team__members', 0.55, { opacity: 0, y: -40 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.pause();
    }

    setMediaTimeline() {
        this.choreographItems('.media-list .list__item');
        this.timeline.add(TweenMax.fromTo('.pagination', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.pause();
    }

    setProductsTimeline() {
        this.choreographItems('.products .product__card');
        this.timeline.pause();
    }

    setReferencesTimeline() {
        this.choreographItems('.rederences .references__card');
        this.timeline.pause();
    }

    setNewsTimeline() {
        this.choreographItems('.news');
        this.timeline.add(TweenMax.fromTo('.pagination', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.pause();
    }

    setSingleNewsTimeline() {
        this.timeline.add(TweenMax.fromTo('.news__date', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.news__title', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.news__content', 0.7, { opacity: 0, scaleX: 0.95, scaleY: 0.95 }, { opacity: 1, scaleX: 1, scaleY: 1 }));
        this.timeline.pause();

        this.timeline.addLabel('.b-news__carousel');
        this.timeline.add(TweenMax.fromTo('.b-news__carousel', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));

        this.timeline.pause();
    }

    setFAQTimeline() {
        this.choreographItems('.questions__section');
        this.timeline.add(TweenMax.fromTo('.pagination', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.pause();
    }

    setContactsTimeline() {
        this.timeline.addLabel('.contact-us');
        this.timeline.add(TweenMax.fromTo('.contact-us h2', 0.5, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.1);
        this.timeline.add(TweenMax.fromTo('.contact-us .contact-us__form', 0.55, { opacity: 0, y: -40 }, { opacity: 1, y: 0 }));
        this.timeline.delay(0.05);
        this.timeline.pause();
    }

    choreographItems(selector) {
        const self = this;
        $(selector).each(function(index) {
            self.timeline.delay(index * 0.001);
            self.timeline.add(TweenMax.fromTo($(this), 0.2, { opacity: 0, y: -25 }, { opacity: 1, y: 0 }));
        });
        this.timeline.delay(0.1);
    }
}
