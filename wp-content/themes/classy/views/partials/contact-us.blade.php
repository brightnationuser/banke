<div class="contact-us {{ $classes }}">
    <div class="container">

        @if(!empty($title))
            <h2>
                {!! $title !!}
            </h2>
        @else
            <h2>
                Contact Us
            </h2>
        @endif


        <div class="contact-us__form aos-animation">
            @if(!empty($form))
                {!! do_shortcode($form) !!}
            @else
                {!! do_shortcode('[contact-form-7 id="5" title="Send Us A Message"]') !!}
            @endif
        </div>
    </div>
</div>