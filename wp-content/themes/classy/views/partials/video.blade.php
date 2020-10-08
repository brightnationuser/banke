<h1>video here</h1>

<div class="product-review__media">
    <div class="product-review__video video">
        <div id="product-video1"
             class="product-video-iframe js-video-iframe"
             data-video-id="{{ $video_url }}"
             data-element-id="product-video1"
        ></div>

        <div class="video__bg">
            <iframe src="https://www.youtube.com/embed/{{ $video_url }}?playsinline=1&modestbranding=0&rel=0&showinfo=0&controls=0&autoplay=1&mute=1&loop=1&disablekb=1&playlist={{ $review['video_url'] }}" frameborder="0" allowfullscreen></iframe>
        </div>

        <span class="video__play js-video-play">Play video</span>
    </div>
</div>