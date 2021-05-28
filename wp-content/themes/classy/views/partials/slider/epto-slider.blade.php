<div class="epto__bg">
</div>

@php
    $slides = get_field('acf_slide', 'option')
@endphp

@unless(empty($slides))

@endunless
<div class="b-scene m-epto">
    @foreach($slides as $key => $slide)
        <div class="scene__item {{ $key === 0 ? 'active' : '' }}">
            <img src="{{ $slide['image']['url'] }}" class="epto__image preload" alt="{{ $slide['image']['alt'] }}">

            @include ('partials.slider.partials.infobox', [
               'items' => $slide['acf_item']
            ])
        </div>
    @endforeach

    @if($nav === 'thin')
        <div class="switch m-left"><i class="icon-prev-thin"></i></div>
        <div class="switch m-right"><i class="icon-next-thin"></i></div>
    @else
        <div class="switch m-left"><i class="icon-prev"></i></div>
        <div class="switch m-right"><i class="icon-next"></i></div>
    @endif
</div>
