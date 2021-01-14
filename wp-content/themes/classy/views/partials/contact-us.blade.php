<div class="contact-us {{ $classes }}">
    <div class="container">

        @if(!empty($title))
            <h2>
                {!! $title !!}
            </h2>
        @else
            <h2>
                {!! get_field('contact_us', 'options') !!}
            </h2>
        @endif


        <div class="contact-us__form aos-animation">
            @if(!empty($form))
                {!! do_shortcode($form) !!}
            @else
                @if(ICL_LANGUAGE_CODE === 'en')
                    {!! do_shortcode('[contact-form-7 id="5" title="Send Us A Message"]') !!}
                @elseif(ICL_LANGUAGE_CODE === 'de')
                    {!! do_shortcode('[contact-form-7 id="1296" title="Contact form DE"]') !!}
                @else
                @endif
            @endif
        </div>
    </div>
</div>