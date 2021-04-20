<section class="brochure">
    <div class="container">
        <div class="brochure__wrapper">
            <div class="brochure__image aos-animation" data-aos="fade-right">
                <img src="{{$image['url']}}" alt="brochure-image">
            </div>
            <div class="brochure__content">
                <h3 class="brochure__title aos-animation" data-aos="fade-in">
                    {{$title}}
                </h3>
                <p class="brochure__text aos-animation" data-aos-delay="200" data-aos="fade-in">
                    {{$text}}
                </p>
                <div class="brochure__button aos-animation" data-aos-delay="400" data-aos="fade-in">
                    <a href="{{$file['url']}}" class="button button--primary disable_preloader" target="_blank">
                        {{$button_text}} <i class="icon-down-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
