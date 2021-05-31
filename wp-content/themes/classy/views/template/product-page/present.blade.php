<section class="present">
    <div class="container">
        <h2 class="present__title">
            {{ $post->getAcfByKey('acf_title_main') }}
        </h2>

        <div class="present__slider-outer thin-nav">
            @include('partials.slider.epto-slider', ['nav' => 'thin'])
        </div>
    </div>
</section>
