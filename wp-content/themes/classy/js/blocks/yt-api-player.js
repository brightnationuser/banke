let loadYT;

class YtApiPlayer {

    constructor(options) {
        const defaults = {
            player_selector: '.js-video-iframe',
            video_id: 'from_data',
            play_button: '.js-video-play'
        };

        this.options = Object.assign(defaults, options);

        this.player_el = $(document).find(this.options.player_selector);
        this.player_parent_el = this.player_el.parents('.video');
        this.player_image_el = this.player_parent_el.find('.js-video-poster');
        this.height = this.player_parent_el.height();
        this.width = this.player_parent_el.width();
        this.players = [];

        let object = this;

        this.player_el.each(function (index) {
            object.init($(this), index);
        })
    }

    init($element, index) {
        this.player_el.fadeOut();
        if(this.options.video_id === 'from_data') {
            this.options.video_id = $element.data('video-id')
        }

        let player_id = $element.data('element-id');

        if (!loadYT) {
            loadYT = new Promise((resolve) => {
                const tag = document.createElement('script');
                tag.src = 'https://www.youtube.com/iframe_api';
                const firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                window.onYouTubeIframeAPIReady = () => resolve(window.YT)
            })
        }
        loadYT.then((YT) => {

            this.player = new YT.Player(player_id, {
                height: this.height,
                width: this.width,
                videoId: this.options.video_id,
                events: {
                    'onReady': this.onPlayerReady(player_id, index),
                }
            });

            this.players.push(this.player);
        })
    }

    // 4. The API will call this function when the video player is ready.
    onPlayerReady (player_id, index) {
        let object = this;

        $(object.options.play_button).eq(index).on('click', function() {

            let el = $(this).parents('.video').find('#' + player_id);
            el.fadeIn();

            el.parents('.video').find(object.options.play_button).fadeOut();
            el.parents('.video').find(object.player_image_el).fadeOut();
            object.players[index].playVideo();

        });
    }
};

export default YtApiPlayer;