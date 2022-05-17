<div class="popup popup--anniversary js-popup" id="popup-anniversary">
    <div class="popup__dialog">
        <div class="popup__overlay js-popup-close"></div>

        <div class="popup__content">
            <div class="popup__content-inner">
                <h2 class="popup__title">{{$title}}</h2>

                <div class="popup__info">
                    <p class="date">{{$date}}</p>

                    <p class="time">{{$time}}</p>

                    <p class="address">{{$address}}</p>
                </div>

                <a href="{{$link}}" class="popup__link">Read More</a>
            </div>

            <button class="popup__close js-popup-close" type="button">&times;</button>
        </div>
    </div>
</div>