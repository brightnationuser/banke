import TweenMax, { TimelineLite } from "gsap/TweenMax";
import { TimelineMax } from "gsap";

export default class Animator {

    constructor(page, scrollPoints) {       
        // За сколько пикселей до блока начинать его анимацию
        const distanceBeforeAnimation = 700;

        // Массив блоков которые уже были анимированы
        let animated = [];

        // Главный таймлайн
        let timeline = new TimelineMax();

        // Определяем анимации по таймлайну для текущей страницы
        this[`set${page}Timeline`](timeline);

        // Анимация первого блока начинается сразу после загрузки страницы
        timeline.play();

        // При скролле определяем дошли ли мы до блока который нужно анимировать
        // Если да, то отжимаем паузу и считаем блок анимированным
        let $w = $(window).scroll(() => {
            scrollPoints.forEach((container) => {
                if(($w.scrollTop() > $(container).offset().top - distanceBeforeAnimation) && !animated.includes(container)) {
                    animated.push(container);
                    timeline.play(container);
                }
            });
        });
    }

    setHomeTimeline(timeline) {
        timeline.add(TweenMax.fromTo('.hero .parallax', 0.5, { opacity: 0, y: -100 }, { opacity: 1, y: 0 }));
        timeline.delay(0.1);
        timeline.add(TweenMax.fromTo('.hero h1', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        timeline.delay(0.1);
        timeline.add(TweenMax.fromTo('.hero .hero__button', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        $('.benefits .benefit').each(function(index) {
            timeline.delay(index * 0.05);
            timeline.add(TweenMax.fromTo($(this), 0.2, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        });
        timeline.pause();

        timeline.addLabel('.our-products');
        timeline.add(TweenMax.fromTo('.our-products h2', 0.8, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        timeline.delay(0.1);
        timeline.pause();

        timeline.addLabel('.epto');
        timeline.add(TweenMax.fromTo('.epto .epto__bg', 0.5, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        timeline.delay(0.1);
        timeline.add(TweenMax.fromTo('.epto .epto__image', 0.55, { opacity: 0, y: -40 }, { opacity: 1, y: 0 }));
        timeline.delay(0.05);
        timeline.add(TweenMax.fromTo('.epto h3', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        timeline.delay(0.1);
        timeline.add(TweenMax.fromTo('.epto .description__text', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        timeline.delay(0.1);
        timeline.add(TweenMax.fromTo('.epto .description__button', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        timeline.delay(0.1);
        timeline.pause();
        
        this.setContactsTimeline(timeline);
    }

    setNewsTimeline(timeline) {
        $('.news').each(function(index) {
            timeline.delay(index * 0.05);
            timeline.add(TweenMax.fromTo($(this), 0.2, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        });
        timeline.delay(0.1);
        timeline.add(TweenMax.fromTo('.pagination', 0.3, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        timeline.pause();
    }

    setContactsTimeline(timeline) {
        timeline.addLabel('.contact-us');
        timeline.add(TweenMax.fromTo('.contact-us h2', 0.5, { opacity: 0, y: -30 }, { opacity: 1, y: 0 }));
        timeline.delay(0.1);
        timeline.add(TweenMax.fromTo('.contact-us .contact-us__form', 0.55, { opacity: 0, y: -40 }, { opacity: 1, y: 0 }));
        timeline.delay(0.05);
        timeline.pause();
    }
}
