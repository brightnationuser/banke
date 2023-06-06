@foreach($items as $item)
    @php
        if(!empty($item)) {
            $left = !empty($item['left']) ? $item['left'] : $item['acf_item_left'];
            $top = !empty($item['left']) ? $item['top'] : $item['acf_item_top'];
        }
    @endphp
    <div class="infobox-w" style="left: {{ $left }}px; top: {{ $top }}px">
        <div class="infobox__dot"><span></span><span></span><span></span></div>

        <div class="infobox__content" style="display: none">
            @if($item['acf_item_image'])
                <div class="content__image">
                    <img src="{{ $item['acf_item_image']['url'] }}" class="preload" alt="point">
                </div>
            @endif
            <div class="content__content">
                <div class="content__title">
                    {{ $item['content'] }}
                </div>
                <div class="content__text">
                    {!! $item['acf_item_description'] !!}
                </div>
            </div>
        </div>
    </div>
@endforeach
