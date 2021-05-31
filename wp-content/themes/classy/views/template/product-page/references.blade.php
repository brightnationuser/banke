@unless(empty($references))
    <section class="references-sect">
        @if(!empty(get_field('references_title')))
            <h2>
                {{ get_field('references_title') }}
            </h2>
            @if(!empty(get_field('references_about')))
                <p>{{ get_field('references_about') }}</p>
            @endif
        @endif
        <div class="container thin-nav">
            <div class="references owl-carousel">

                @foreach ($references as $reference)
                    <a href="{{ $reference->permalink() }}" class="references__card disable_preloader aos-animation"
                       data-aos="fade-in">
                        <div class="card__image"
                             style="background-image: url({{ $reference->getAcfImage()->src('large') }});"></div>
                        <div class="card__info">
                            <div class="card__title">{{ $reference->get_title() }}</div>
                            <div class="card__text">{!! $reference->getAcfByKey('acf_references_short_text') !!}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endunless
