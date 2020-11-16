/**
 * Video (YouTube)
 *
 * @returns {void}
 */
const video = () => {
    const doc = document;
    const video = $('.js-video');
    const play = $('.js-video-play');
    const close = $('.js-popup-close');
    const playerID = $('.video-player').data('yt-id');

    if (!video.length) return;

    const tag = doc.createElement('script');
    const firstScriptTag = doc.getElementsByTagName('script')[0];
    tag.src = 'https://www.youtube.com/player_api';
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    /**
     * YT
     */
    let player;

    function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
            height: '360',
            width: '640',
            videoId: playerID,
            playerVars: {
                'rel': 0,
                'showinfo': 0,
                'autoplay': 0,
                //'controls': 0,
                'modestbranding': 1,
            },
        });
    }

    close.on('click', function () {
        video.removeClass('is-play');
        player.stopVideo();
    });

    play.on('click', function () {
        $(this).closest('.js-video').addClass('is-play');
        player.playVideo();
    });

    window.onYouTubePlayerAPIReady = onYouTubePlayerAPIReady;
};

export default video;
