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
    <div class="video-gallery"  style="background-image: url({{ content_url('themes/classy/images/bg/video_gallery_bg.jpg') }})">
        <div class="container">
            @if(!empty($title))
                <h2 class="video-gallery__title">{{ $title }}</h2>
            @endif
            <div class="video-gallery__window js-video-gallery__window">
                <button class="video-gallery__close js-close-video" type="button">&times;</button>
                <div id="open-video"></div>
            </div>
                <div class="gallery_wrap">
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
                    <div class="custom-nav">
                        <svg class="owl-prev" xmlns="http://www.w3.org/2000/svg" width="14" height="38" viewBox="0 0 14 38" fill="none">
                            <g clip-path="url(#clip0_414_540)">
                                <path d="M0.5 0.5L13.5 19L0.5 37.5" stroke="#9AAFC1" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_414_540">
                                    <rect width="14" height="38" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <svg class="owl-next" xmlns="http://www.w3.org/2000/svg" width="14" height="38" viewBox="0 0 14 38" fill="none">
                            <g clip-path="url(#clip0_414_540)">
                                <path d="M0.5 0.5L13.5 19L0.5 37.5" stroke="#9AAFC1" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_414_540">
                                    <rect width="14" height="38" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
                @php
                    $button = get_field('case_study_main_page_button','options');
                @endphp
                @if($button)
                <div class="button_wrap">
                    <a target="{{ $button['target'] ?: '_self' }}" href="{!! $button['url'] !!}" class="button">{!! $button['title'] !!}</a>
                </div>
                @endif
        </div>
    </div>
@endif
