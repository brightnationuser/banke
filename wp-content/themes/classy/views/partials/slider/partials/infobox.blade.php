@foreach($items as $item)
    <div class="infobox-w" style="left: {{ $item['left'] }}px; top: {{ $item['top'] }}px">
        <div class="infobox__dot"><span></span><span></span><span></span></div>

        <div class="infobox__content" style="display: none">
            <div class="content__image">
                <img src="{{ $item['acf_item_image']['url'] }}" class="preload" alt="">
            </div>
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
