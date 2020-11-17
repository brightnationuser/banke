@php
    $videos = [
        [
            'video_id' => 'LlsAKKd8rrI',
            'image' => '/wp-content/themes/classy/images/pages/powertrains/video-1.jpg',
            'text' => 'Step 1'
        ],
        [
            'video_id' => '5n386Sguyz8',
            'image' => '/wp-content/themes/classy/images/pages/powertrains/video-2.jpg',
            'text' => 'Step 2'
        ],
        [
            'video_id' => 'LlsAKKd8rrI',
            'image' => '/wp-content/themes/classy/images/pages/powertrains/video-3.jpg',
            'text' => 'Step 3'
        ],
                [
            'video_id' => 'LlsAKKd8rrI',
            'image' => '/wp-content/themes/classy/images/pages/powertrains/video-1.jpg',
            'text' => 'Step 1'
        ],
        [
            'video_id' => '5n386Sguyz8',
            'image' => '/wp-content/themes/classy/images/pages/powertrains/video-2.jpg',
            'text' => 'Step 2'
        ],
        [
            'video_id' => 'LlsAKKd8rrI',
            'image' => '/wp-content/themes/classy/images/pages/powertrains/video-3.jpg',
            'text' => 'Step 3'
        ],
    ];

    foreach($videos as $key => &$item) {
        $item['player_id'] = $item['video_id'] . $key;
    }
@endphp

<div class="video-gallery">
    <div class="container">
        <h2 class="video-gallery__title">Video Gallery</h2>
        <div class="owl-carousel owl-video_gallery">
            @foreach($videos as $video)
                <div class="video-gallery__item">
                    @include ('partials.embed-youtube-video', [
                        'title' => '',
                        'image' => $video['image'],
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
