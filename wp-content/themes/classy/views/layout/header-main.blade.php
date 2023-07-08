@php
    //$languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
@endphp
<div class="header-wrap">
    <header class="header">
        <div class="header__container">
            @php($lng_code = ICL_LANGUAGE_CODE === 'en' ? '' : ICL_LANGUAGE_CODE)
            <div class="header__logo-and-hamburger-holder">
                <a href="{{WP_HOME}}/{{$lng_code}}{{$lng_code ? '/' : ''}}" class="header__logo">
                    <img src="{{ content_url('themes/classy/images/logo.png') }}" alt="Banke logo">
                </a>
                <button class="header__hamburger hamburger hamburger--3dxy" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
                </button>
            </div>

            <div class="header__navigation">
                <div class="header__menu">
                    {{
                         wp_nav_menu([
                            'menu' => 2,
                            'container' => FALSE,
                            'container_id' => FALSE,
                            'menu_class' => 'header-menu',
                            'depth' => 2,
                            'walker' => new \Helpers\Excerpt_Walker
                        ])
                    }}
                </div>

                <div class="header__right header-right-items">
                    <div class="header-right-items__item header-right-items__item--language">
                        <div class="header__lng">
                            <div class="lng-w">
                                @foreach($languages as $language)
                                    @if($language['active'])
                                        <a class="active-language" href="{{ $language['url'] }}">{!! $language['language_code'] !!}</a>
                                    @endif
                                @endforeach
                                @if(count($languages) > 1)
                                    <i class="icon-arrow-down"></i>
                                    <div class="lng-dropdown">
                                        @foreach($languages as $language)
                                            @if(!$language['active'])
                                                <a href="{{ $language['url'] }}">{!! $language['language_code'] !!}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="header-right-items__item header-right-items__item--account">
                        <div class="header__account app-forms-wrapper js-disabled">
                            <div id="app-forms"></div>
                        </div>
                    </div>
                    <div class="header-right-items__item header-right-items__item--phone">
                        <div class="header__phone">
                            <a href="tel:{!! get_field('number', 'options') !!}" class="disable_preloader">
                                <div class="icon">
                                    <i class="icon-phone-call"></i>
                                </div>
                                <span>
                    {!! get_field('number', 'options') !!}
                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--    @include('partials.account-forms.popup-login')--}}
        {{--    @include('partials.account-forms.popup-forgot')--}}
        {{--    @include('partials.account-forms.popup-register')--}}
    </header>
    <div class="header-spacer"></div>
</div>
