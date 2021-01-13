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
        const closePopup = $('.js-close-gallery-video');
        const owl = video.parents('.owl-carousel')
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
                    resolve(window.YT)
                }
            })
        }
        loadYT.then((YT) => {
            
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
                    'modestbranding': 0,
                },
            });
            
            players.push(player);
        })
        
        function onPlayerReady(player_id, index) {
            
            closePopup.on('click', function () {
                video.removeClass('is-play');
                players[index].stopVideo();
            })
            
            close.on('click', function () {
                video.removeClass('is-play');
                players[index].stopVideo();
            });
            
            owl.on('click', '.owl-prev, .owl-next, .owl-dot',  function () {
                video.removeClass('is-play');
                players[index].stopVideo();
            });
            
            play.on('click', function () {
                $(this).closest('.js-video').addClass('is-play');
                players[index].playVideo();
            });
        }
        
    })
};

export default video;
