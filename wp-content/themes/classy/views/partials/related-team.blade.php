@if(!empty($related))
    <section class="related">
        <div class="container">
            @if(get_field('more_team_members_section_title', 'options'))
                <h2 class="related__title">{{ get_field('more_team_members_section_title', 'options') }}</h2>
            @endif

            <div class="related__content">
                <div class="related__slider js-related-slider owl-carousel">
                    @foreach($related as $key => $item)
                        <div class="carousel__item">
                            <div class="item">
                                <a href="{{ $item->permalink() }}" class="item">
                                    <img class="item__image" src="{{ $item->getAcfImage()->src('large') }}"
                                         alt="{{ $item->title() }}"/>

                                    <div class="item__content">
                                        <h3 class="item__title">
                                            {!! strlen($item->title()) > 150 ? substr($item->title(), 0, 150) . '...' : $item->title() !!}
                                        </h3>

                                        <time class="item__date">
                                            {{ $item->getDate() }}
                                        </time>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
