import Scene from './Scene';

class Slider {

    constructor(scenes) {
        this.scenes = scenes;
        this.init();
    }

    init() {
        let currentScene = 0;
        this.scenes[currentScene].show();

        // setTimeout(()=> {
        //     this.scenes.forEach(scene => scene.animate())
        // }, 1700);

        setTimeout(() => {

            this.scenes[currentScene].infoboxes[0].show();

            Array.from(document.getElementsByClassName('infobox__dot')).forEach(element => {
                element.addEventListener('mouseenter', (e) => {
                    this.scenes[currentScene].suppress = true;
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
        }, 1500);
    }

}

export default Slider;
