@foreach($slider as $slide)
    <div class="tips-image js-tips-image">
        <div class="tips-image__image b-scene">
            <div class="scene__item active">
                <img src="{{ $slide['image']['url'] }}" class="tips-image__image preload"
                     alt="{{ $slide['image']['alt'] }}">

                @include ('partials.slider.partials.infobox', [
                   'items' => $slide['features']
                ])
            </div>
        </div>
    </div>
@endforeach

