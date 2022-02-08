<div class="popup popup--vacancy js-popup" id="popup-vacancy">
    <div class="popup__dialog">
        <div class="popup__overlay js-popup-close"></div>

        <div class="popup__content">
            <div class="popup__content-inner">
                <h2 class="popup__title">{!! $title !!}</h2>

                <div class="popup__text">
                    {!! $text !!}
                </div>

                <a class="button popup__button js-popup-close" href="{{ $button_link }}">{{ $button_text }}</a>
            </div>

            <button class="popup__close js-popup-close" type="button">&times;</button>
        </div>
    </div>
</div>
