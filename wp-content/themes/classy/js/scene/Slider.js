// import Scene from '/Scene';

class Slider {

    constructor(slider) {
        this.slider = slider;
        this.init();
        this.initSwitch();
    }

    init() {

        //this.scenes[currentScene].show();

        // setTimeout(()=> {
        //     this.scenes.forEach(scene => scene.animate())
        // }, 1700);

        setTimeout(() => {

            //this.scenes[currentScene].infoboxes[0].show();

            Array.from(document.getElementsByClassName('infobox__dot')).forEach(element => {
                element.addEventListener('mouseenter', (e) => {
                    //this.scenes[currentScene].suppress = true;
                    //this.scenes[currentScene].infoboxes[this.scenes[currentScene].currentInfobox - 1].hide();
                    // e.target.parentElement.className = 'infobox-w';

                    // $(e.target.parentElement).removeClass('fade-out hidden');
                    $(e.target.parentElement).find('.infobox__content').stop(1,0).fadeIn(500);
                });
            });

            Array.from(document.getElementsByClassName('infobox__dot')).forEach(element => {
                element.addEventListener('mouseleave', (e) => {
                    //e.target.parentElement.className = 'infobox-w hidden';

                    // $(e.target.parentElement).addClass('fade-out');
                    //
                    // setTimeout(function () {
                    //     $(e.target.parentElement).addClass('hidden');
                    // }, 500);

                    $(e.target.parentElement).find('.infobox__content').stop(1,0).fadeOut(500);
                });
            });

            // document.getElementById('switch_right').addEventListener('click', () => {
            //     this.scenes[currentScene].hide();
            //     currentScene += 1;
            //     if(currentScene == 3) {
            //         currentScene = 0;
            //     }
            //     this.scenes[currentScene].show();
            // });
            //
            // document.getElementById('switch_left').addEventListener('click', () => {
            //     this.scenes[currentScene].hide();
            //     currentScene -= 1;
            //     if (currentScene == -1) {
            //         currentScene = 2;
            //     }
            //     this.scenes[currentScene].show();
            // });
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
