<div class="epto__bg">
</div>

<div class="b-scene m-epto">
    <div class="scene__item active">
        <img src="/wp-content/themes/classy/images/pages/home/epto.png" class="epto__image preload">

        @include ('partials.slider.partials.infobox', [
           'items' => get_field('acf_slide', 'option')[0]['acf_item']
        ])
    </div>

    <div class="scene__item">
        <img src="/wp-content/themes/classy/images/pages/home/epto2.png" class="epto__image preload">

        @include ('partials.slider.partials.infobox', [
          'items' => get_field('acf_slide', 'option')[1]['acf_item']
        ])
    </div>

    <div class="switch m-left"><i class="icon-prev"></i></div>
    <div class="switch m-right"><i class="icon-next"></i></div>
</div>
