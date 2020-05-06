// import Scene from '/Scene';

class Slider {

    constructor(slider) {
        this.slider = slider;
        this.init();
        this.initSwitch();
    }

    init() {

        setTimeout(() => {

            Array.from(document.getElementsByClassName('infobox__dot')).forEach(element => {
                element.addEventListener('mouseenter', (e) => {

                    $(e.target.parentElement).find('.infobox__content').stop(1,0).fadeIn(500);

                });
            });

            Array.from(document.getElementsByClassName('infobox__dot')).forEach(element => {
                element.addEventListener('mouseleave', (e) => {

                    $(e.target.parentElement).find('.infobox__content').stop(1,0).fadeOut(500);

                });
            });

        }, 100);
    }

    initSwitch() {
        let self = this;

        $(this.slider).find('.m-left').on('click', function () {
            let currenIndex = $(self.slider).find('.scene__item.active').index();

            currenIndex --;

            if(currenIndex < 0) {
                currenIndex = $(self.slider).find('.scene__item').length - 1;
            }

            $(self.slider).find('.scene__item').removeClass('active').eq(currenIndex).addClass('active');
        });

        $(this.slider).find('.m-right').on('click', function () {
            let currenIndex = $(self.slider).find('.scene__item.active').index();

            currenIndex ++;

            if(currenIndex >= $(self.slider).find('.scene__item').length) {
                currenIndex = 0;
            }

            $(self.slider).find('.scene__item').removeClass('active').eq(currenIndex).addClass('active');
        });
    }
}

export default Slider;
