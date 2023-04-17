<div class="contact-us {{ $classes }}">
    <div class="container">

        <div class="contact-us__form aos-animation">
            <div class="form_overlay js-form_overlay">
                <div class="cross">
                    &times;
                </div>
                <div class="icon">
                    <svg width="81" height="38" viewBox="0 0 81 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_418_4401)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.2211 37.903H69.084C71.3727 37.903 73.6114 36.105 74.0736 33.8958L80.1549 4.78718C80.3946 3.64689 80.1463 2.55929 79.4581 1.7283C78.7682 0.8956 77.7403 0.436768 76.5572 0.436768H31.6942C29.4055 0.436768 27.1686 2.23301 26.7046 4.4439L20.6233 33.5526C20.3836 34.6928 20.632 35.7805 21.3201 36.6114C22.01 37.4441 23.0397 37.903 24.2211 37.903ZM28.3931 4.78888C28.6949 3.3512 30.2075 2.13615 31.6942 2.13615H76.5572C77.2108 2.13615 77.7662 2.37236 78.1197 2.8023C78.475 3.23055 78.5975 3.81513 78.4664 4.4456L72.3851 33.5543C72.0833 34.9919 70.5724 36.2053 69.084 36.2053H24.2211C23.5674 36.2053 23.0138 35.9691 22.6585 35.5391C22.3032 35.1109 22.1807 34.5263 22.3118 33.8958L28.3931 4.78888Z" fill="#003462"/>
                            <path d="M49.8967 23.4515C48.6015 23.4515 47.3045 22.9655 46.4008 22.0257L29.3555 4.32157C29.0278 3.98169 29.0399 3.44299 29.3883 3.12181C29.7315 2.80062 30.28 2.81082 30.6059 3.1541L47.6512 20.8565C48.6584 21.8948 50.4969 22.0614 51.6697 21.21L76.7348 3.05213C77.116 2.77513 77.6558 2.85331 77.9404 3.23397C78.2215 3.61293 78.1387 4.14313 77.7558 4.42183L52.689 22.578C51.8784 23.166 50.8884 23.4515 49.8967 23.4515Z" fill="#003462"/>
                            <path d="M21.3163 7.60002H9.96952C9.49351 7.60002 9.10718 7.11362 9.10718 6.5143C9.10718 5.91499 9.49351 5.42859 9.96952 5.42859H21.3163C21.7923 5.42859 22.1786 5.91499 22.1786 6.5143C22.1786 7.11362 21.7923 7.60002 21.3163 7.60002Z" fill="#003462"/>
                            <path d="M19.1283 18.4572H1.26462C0.783422 18.4572 0.392883 17.9708 0.392883 17.3715C0.392883 16.7722 0.783422 16.2858 1.26462 16.2858H19.1283C19.6095 16.2858 20 16.7722 20 17.3715C20 17.9708 19.6095 18.4572 19.1283 18.4572Z" fill="#003462"/>
                            <path d="M15.9145 29.3143H7.74623C7.29489 29.3143 6.92859 28.8279 6.92859 28.2285C6.92859 27.6292 7.29489 27.1428 7.74623 27.1428H15.9145C16.3659 27.1428 16.7322 27.6292 16.7322 28.2285C16.7322 28.8279 16.3659 29.3143 15.9145 29.3143Z" fill="#003462"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_418_4401">
                                <rect width="80.6071" height="38" fill="white" transform="translate(0.392883)"/>
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                {!! get_field('mail_success', 'options') !!}
            </div>
            @if(!empty($title))
                <h2>
                    {!! $title !!}
                </h2>
            @else
                <h2>
                    {!! get_field('contact_us', 'options') !!}
                </h2>
            @endif
            @if(!empty($form))
                {!! do_shortcode($form) !!}
            @else
                @if(ICL_LANGUAGE_CODE === 'en')
                    {!! do_shortcode('[contact-form-7 id="3321" title="New main page contact form"]') !!}
                @elseif(ICL_LANGUAGE_CODE === 'de')
                    {!! do_shortcode('[contact-form-7 id="3377" title="New main page contact form DE"]') !!}
                @else
                @endif
            @endif

            <div class="socials_block wrapper">
                <div class="title">
                    {!! get_field('contact_us_social_title', 'options') !!}
                </div>
                <div class="socials_list wrapper">
                    <a href="{!! get_field('linkedin', 'option')['link'] !!}" class="social linkedin disable_preloader"
                       target="_blank">
                        <i class="icon-linkedin"></i>
                    </a>
                    <a href="{!! get_field('youtube', 'option')['link'] !!}" class="social youtube disable_preloader"
                       target="_blank">
                        <i class="icon-youtube"></i>
                    </a>
                    <a href="{!! get_field('facebook', 'option')['link'] !!}" class="social facebook disable_preloader"
                       target="_blank">
                        <i class="icon-facebook"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>