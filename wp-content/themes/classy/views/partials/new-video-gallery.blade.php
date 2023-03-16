@php
    $videos = get_field('video_gallery');

    if(!empty($videos)) {
        $videos = array_merge($videos, $videos, $videos);

        foreach($videos as $key => &$item) {
            $item['player_id'] = $item['video_id'] . $key;
        }
    }

    $start = get_field('video_gallery_start');
    $title = get_field('video_gallery_title');
@endphp

@if(!empty($videos))
    <div class="video-gallery">
        <div class="container">
            @if(!empty($title))
                <h2 class="video-gallery__title">{{ $title }}</h2>
            @endif
            <div class="video-gallery__window js-video-gallery__window">
                <button class="video-gallery__close js-close-video" type="button">&times;</button>
                <div id="open-video"></div>
            </div>
            <div class="owl-carousel owl-video_gallery" data-start="{{ !empty($start) ? $start : 4 }}">
                @foreach($videos as $key => $video)
                    <div class="video-gallery__item">
                        <div class="embed-youtube-video is-loading js-video-show"
                             data-yt-id="{{ !empty($video['video_id']) ? $video['video_id'] : 'sDsknFlke9U' }}"
                             data-id="{{ $key }}"
                        >

                            <div class="embed-youtube-video__overlay js-video-poster"
                                 style="background-image: url({{ $video['image']['url'] }})"></div>

                            <div class="embed-youtube-video__play-wrap centered" type="button">
                                <button class="embed-youtube-video__play"></button>
                            </div>

                        </div>
                        <div class="item__text">{{ $video['text'] }}</div>
                    </div>
                @endforeach
            </div>
                <div class="button_wrap">
                    <a href="#" class="button">Learn more about product</a>
                </div>
        </div>
    </div>
@endif
