<div class="tips-image js-tips-image">
    <div class="tips-image__image b-scene">
        <div class="scene__item active">
            <img src="{{ $image['url'] }}" class="tips-image__image preload" alt="Banke scene image">

            @include ('partials.slider.partials.infobox', [
               'items' => get_field('acf_tip_items')
            ])
        </div>
    </div>
</div>

