<div class="popup js-popup" id="youtube-video">
    <div class="popup__dialog">
        <div class="popup__overlay js-popup-close"></div>

        <div class="popup__content">
            @if($title)
                <h2 class="popup__title">{{ $title }}</h2>
            @endif

            <div class="popup__video js-video">
                <div class="popup__video-overlay" style="background-image: url({{ $image }})"></div>

                <button class="popup__video-play js-video-play" type="button"></button>

                <div class="embed-responsive embed-responsive-16by9">
                    <div class="embed-responsive-item js-video-player"
                         id="player{{$video_id}}"
                         data-index="{{$video_id}}"
                         data-yt-id="{{ $video_id }}"
                    ></div>
                </div>
            </div>

            <button class="popup__close js-popup-close" type="button">&times;</button>
        </div>
    </div>
</div>
