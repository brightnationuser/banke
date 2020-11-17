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
                    @include ('partials.embed-youtube-video', [
                        'title' => '',
                        'image' => $video['image']['url'],
                        'yt_id' => $video['video_id'],
                        'index' => $video['player_id'],
                        'no_btn_text' => true
                    ])
                    <div class="item__text">{{ $video['text'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
