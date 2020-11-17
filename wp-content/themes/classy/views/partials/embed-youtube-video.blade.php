@php
    if(empty($index)) {
      $index = empty($yt_id) ? 0 : $yt_id;
    }
@endphp
<div class="embed-youtube-video js-video">
    <div class="embed-youtube-video__overlay js-video-poster" style="background-image: url({{ $image }})"></div>

    @if(!empty($title))
        <div class="embed-youtube-video__title">
            {{$title}}
        </div>
    @endif

    <div class="embed-youtube-video__play-wrap js-video-play" type="button">
        <button class="embed-youtube-video__play"></button>

        @if($no_btn_text === true)
            <span class="embed-youtube-video__text">Watch video</span>
        @endif
    </div>

    <div class="embed-responsive embed-responsive-16by9">
        <div class="embed-responsive-item video-player js-video-player"
             id="player{{ $index }}"
             data-index="{{ $index }}"
             data-yt-id="{{ !empty($yt_id) ? $yt_id : 'sDsknFlke9U' }}"
        ></div>
    </div>
</div>