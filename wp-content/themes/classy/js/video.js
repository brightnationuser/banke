/**
 * Video (YouTube)
 *
 * @returns {void}
 */
let loadYT;

const video = () => {
    const doc = document;
    const playerEl = $('.js-video-player')
    let players = []

    playerEl.each(function (index) {
        let playerEl = $(this)

        console.log('check player el ', playerEl)

        const video = playerEl.parents('.js-video')
        const play = video.find('.js-video-play')
        const close = video.parents('.js-popup').find('.js-popup-close')
        const playerID = playerEl.data('yt-id')
        const playerIndex = playerEl.data('index')

        if (!video.length) return;

        /**
         * YT
         */
        let player;
        if (!loadYT) {
            loadYT = new Promise((resolve) => {
                const tag = document.createElement('script');
                tag.src = 'https://www.youtube.com/iframe_api';
                const firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                window.onYouTubeIframeAPIReady = () => {
                    console.log('onYouTubeIframeAPIReady', playerEl)
                    resolve(window.YT)
                }
                console.log('load YT for ', playerEl)
            })
        }
        loadYT.then((YT) => {

            console.log('new player ', 'player' + playerIndex)

            player = new YT.Player('player' + playerIndex, {
                height: '360',
                width: '640',
                videoId: playerID,
                events: {
                    'onReady': onPlayerReady('player' + playerIndex, index),
                },
                playerVars: {
                    'rel': 0,
                    'showinfo': 0,
                    'autoplay': 0,
                    //'controls': 0,
                    'modestbranding': 1,
                },
            });

            players.push(player);
        })

        function onPlayerReady(player_id, index) {
            close.on('click', function () {
                video.removeClass('is-play');
                players[index].stopVideo();
                console.log('click close')
            });

            play.on('click', function () {
                $(this).closest('.js-video').addClass('is-play');
                console.log('click start')
                players[index].playVideo();
            });
        }

    })
};

export default video;
