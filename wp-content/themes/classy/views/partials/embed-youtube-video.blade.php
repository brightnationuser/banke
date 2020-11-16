<div class="embed-youtube-video js-video">
    <div class="embed-youtube-video__overlay" style="background-image: url({{ $image }})"></div>

    <div class="embed-youtube-video__title">
        {{$title}}
    </div>
    <div class="embed-youtube-video__play-wrap js-video-play" type="button">
        <button class="embed-youtube-video__play"></button>
        <span class="embed-youtube-video__text">Watch video</span>
    </div>

    <div class="embed-responsive embed-responsive-16by9">
        <div class="embed-responsive-item video-player" id="player" data-yt-id="{{ !empty($yt_id) ? $yt_id : 'sDsknFlke9U' }}"></div>
    </div>
</div>