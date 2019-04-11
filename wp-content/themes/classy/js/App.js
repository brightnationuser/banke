import Slider from './Slider';
import Scene from './Scene'

class App {

    constructor() {
        this.initTabsSwitcher();
        this.initHeaderHamburger();

        if($('.our-products').length > 0) {
            this.initCarSlider();
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
}

export default App;
