@if($brochures)
    <section class="brochures-section">
        <div class="container">
            @if($title)
                <div class="brochures-section__title">{{ $title }}</div>
            @endif
            <div class="brochures-section__brochures">
                @foreach($brochures as $brochure)
                    <div class="brochures-section__brochure brochures-section-brochure aos-animation"
                         data-aos="fade-up">
                        @if($brochure['image'])
                            {!! wp_get_attachment_image($brochure['image']['id'],'full', false, array('class' => 'brochures-section-brochure__image')) !!}
                        @endif
                        @if($brochure['title'])
                            <div class="brochures-section-brochure__title">{{ $brochure['title'] }}</div>
                        @endif
                        @if($brochure['text'])
                            <div class="brochures-section-brochure__text">{{ $brochure['text'] }}</div>
                        @endif
                        @if($brochure['file'] && $brochure['button_text'])
                            <div class="brochures-section-brochure__link-holder">
                                <a target="_blank" href="{{ $brochure['file']['url'] }}"
                                   class="brochures-section-brochure__link">
                                    <i class="icon-down-arrow"></i>
                                    <span>{{ $brochure['button_text'] }}</span></a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
