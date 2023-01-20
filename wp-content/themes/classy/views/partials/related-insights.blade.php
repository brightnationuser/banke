@if($insights)
    <section class="related-insights">
        <div class="container">
            @if($title)
                <div class="related-insights__title">{{$title}}</div>
            @endif
            <div class="related-insights__carousel-wrapper">
                <div class="related-insights__carousel related-insights-carousel owl-carousel owl-theme-related-insights js-related-insights-carousel">
                    @foreach ($insights as $insight)
                        <div class="related-insights-carousel__slide related-insights-carousel-slide">
                            <div class="related-insights-carousel-slide__picture-wrapper">
                                <div class="related-insights-carousel-slide__picture"
                                     style="background-image: url('{{ $insight['image'] }}')"></div>
                            </div>
                            <div class="related-insights-carousel-slide__content">
                                <a href="{{ $insight['url'] }}"
                                   class="related-insights-carousel-slide__title">{{ $insight['title'] }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif