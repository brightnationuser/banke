<section class="concept">
    <div class="container">

        <div class="concept__title h2">
            {{ $post->getAcfByKey('acf_title_concept') }}
        </div>

        <div class="concept__description d-flex">

            @php
                $slider = $post->getAcfByKey('slider');
            @endphp

            @if(!empty($slider))
                <div class="concept__image animated fadeInLeft">
                    <div class="concept-carousel owl-carousel owl-theme-banke owl-theme-banke--concept-carousel">
                        @foreach($slider as $slide)
                            @if($slide['type_of_media'] === 'image')
                                <div>
                                    <img src="{!! $slide['image']['url'] !!}"
                                         alt="{!! $slide['image']['alt'] !!}">
                                </div>
                            @endif
                            @if($slide['type_of_media'] === 'video')
                                <div>
                                    <video src="{!! $slide['video']['url'] !!}" muted controls></video>
                                </div>
                            @endif
                        @endforeach
                    </div>
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

        @if($specifications_button)
            <div class="concept__specifications">
                <a class="concept__specifications-button"
                   href="{{$specifications_button['url']}}">{{$specifications_button['title']}}</a>
            </div>
        @endif
    </div>
</section>
