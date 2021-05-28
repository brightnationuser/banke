@php
    $principles = $post->getAcfByKey('acf_benefits');
@endphp

@if(!empty($principles))
    <div class="principles animated fadeInUp">
        <div class="container">
            <div class="principles__list">
                @foreach($principles as $key => $item)
                    <div class="principles__item">
                        <div class="principles__image-wrap">
                            <img class="principles__image {{ pathinfo(basename($item['image']['url']), PATHINFO_FILENAME) }}"
                                 src="{!! $item['image']['url'] !!}" alt="{{ strip_tags($item['title']) }}">
                        </div>
                        <div class="principles__title">
                            {!! $item['title'] !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
