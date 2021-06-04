<section class="concept">
    <div class="container">

        <h1 class="concept__title h2">
            {{ $post->getAcfByKey('acf_title_concept') }}
        </h1>

        <div class="concept__description d-flex">

            @if($post->getAcfByKey('is_acf_concept_image'))
                <div class="concept__image animated fadeInLeft">
                    <img src="{!! $post->getAcfByKey('acf_image_concept')['url'] !!}"
                         alt="{!! $post->getAcfByKey('acf_title_concept') !!}">
                </div>
            @else
                <div class="concept__video animated fadeInLeft">
                    <video class="product-template-concept-video" src="{!! $post->getAcfByKey('acf_video_concept')['url'] !!}" muted></video>
                </div>
            @endif

            <div class="concept__content">
                <article class="content-text m_1 animated fadeInDown">
                    <div class="text-column">
                        {!! $post->getAcfByKey('acf_concept_description') !!}
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
