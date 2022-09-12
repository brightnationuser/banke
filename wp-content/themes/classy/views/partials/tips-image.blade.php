@foreach($slider as $slide)
    <div class="tips-image js-tips-image">
        <div class="tips-image__image b-scene">
            <div class="scene__item active">
                <img src="{{ $slide['image']['url'] }}" class="tips-image__image preload"
                     alt="{{ $slide['image']['alt'] }}">

                @if($slide['features'])
                    @include ('partials.slider.partials.infobox', ['items' => $slide['features']]);
                @endif
            </div>
        </div>
    </div>
@endforeach

