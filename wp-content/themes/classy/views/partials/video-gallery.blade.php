@php
    $videos = get_field('video_gallery');

    if(empty($videos)) {
        $videos = [
            [
                'video_id' => 'LlsAKKd8rrI',
                'image' => ['url' => '/wp-content/themes/classy/images/pages/powertrains/video-1.jpg'],
                'text' => 'Step 1'
            ],
            [
                'video_id' => '5n386Sguyz8',
                'image' => ['url' => '/wp-content/themes/classy/images/pages/powertrains/video-2.jpg'],
                'text' => 'Step 2'
            ],
            [
                'video_id' => 'LlsAKKd8rrI',
                'image' => ['url' => '/wp-content/themes/classy/images/pages/powertrains/video-3.jpg'],
                'text' => 'Step 3'
            ],
        ];
    }

    $videos = array_merge($videos, $videos, $videos);

    foreach($videos as $key => &$item) {
        $item['player_id'] = $item['video_id'] . $key;
    }

    $start = get_field('video_gallery_start');
    $title = get_field('video_gallery_title');
@endphp

<div class="video-gallery">
    <div class="container">
        @if(!empty($title))
            <h2 class="video-gallery__title">{{ $title }}</h2>
        @endif
        <div class="owl-carousel owl-video_gallery" data-start="{{ !empty($start) ? $start : 4 }}">
            @foreach($videos as $video)
                <div class="video-gallery__item">
                    <div class="embed-youtube-video js-video">
                        <button class="popup__close js-close-gallery-video" type="button">&times;</button>

                        <div class="embed-youtube-video__overlay js-video-poster" style="background-image: url({{ $video['image']['url'] }})"></div>

                        <div class="embed-youtube-video__play-wrap js-video-play centered" type="button">
                            <button class="embed-youtube-video__play"></button>
                        </div>

                        <div class="embed-responsive embed-responsive-16by9">
                            <div class="embed-responsive-item video-player js-video-player"
                                 id="player{{ $video['player_id'] }}"
                                 data-index="{{ $video['player_id'] }}"
                                 data-yt-id="{{ !empty($video['video_id']) ? $video['video_id'] : 'sDsknFlke9U' }}"
                            ></div>
                        </div>
                    </div>
                    <div class="item__text">{{ $video['text'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
