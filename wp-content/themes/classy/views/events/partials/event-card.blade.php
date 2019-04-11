<article class="card {!! $modifier or ' ' !!} {{ $post->getAcfByKey('acf_event_address') ? 'm_address' : ' ' }}">

    <a class="card__image b-lazy" href="{{ $post->permalink() }}"
       data-src={{ $post->getAcfImage()->src('medium_large') }}>
    </a>

    @if($post->getAcfByKey('acf_event_address'))
        <div class="card__address">
            <div class="icon-location"></div>
            <span>{{ $post->getAcfByKey('acf_event_address') }}</span>
        </div>
    @endif

    <h3 class="card__title">
        <div class="title__icon icon-{{ $post->getAcfByKey('acf_event_type') }}"></div>
        <a class="title__link" href="{{ $post->permalink() }}">{!! $post->title() !!}</a>
    </h3>

    <div class="card__info">

        @include ('events.partials.event-datetime', [
            'datetime' => [
                'date' => $post->getDate('d M Y'),
                'time' => $post->getTime(),
                'modifier' => 'm_card'
            ]
        ])

        @include ('partials.button', [
          'link' => $post->permalink(),
          'text' => $post->isUpcoming() ? 'Sign up' : 'Learn more',
          'modifier' => 'm_onlyText'
        ])

    </div>

</article>