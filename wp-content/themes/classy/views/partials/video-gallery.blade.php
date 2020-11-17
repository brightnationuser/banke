@php
    $videos = [
        [
            'video_id' => 'BgTl_uSbFS4',
            'image' => '/wp-content/themes/classy/images/video-preview.jpg'
        ],
        [
            'video_id' => 'MYt4F98PUeM',
            'image' => '/wp-content/themes/classy/images/video-preview.jpg'
        ],
        [
            'video_id' => 'XbMv79EcRUk',
            'image' => '/wp-content/themes/classy/images/video-preview.jpg'
        ],
        [
            'video_id' => 'gM_rm9ryqYM',
            'image' => '/wp-content/themes/classy/images/video-preview.jpg'
        ],
    ]
@endphp

<div class="video-gallery">
    <h2 class="video-gallery__title">Video Gallery</h2>
    <div class="owl-carousel owl-video_gallery">
        @foreach($videos as $video)
            @include ('partials.embed-youtube-video', [
                'title' => '',
                'image' => $video['image'],
                'yt_id' => $video['video_id'],
                'no_btn_text' => true
            ])
        @endforeach
    </div>
</div>
