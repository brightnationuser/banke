@php
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
@endphp
<header class="header">
    <div class="container">
        @php($lng_code = ICL_LANGUAGE_CODE === 'en' ? '' : ICL_LANGUAGE_CODE)
        <a href="{{WP_HOME}}/{{$lng_code}}" class="header__logo">
            <img src="{{ content_url('themes/classy/images/logo.png') }}" alt="Banke logo">
        </a>

        <div class="header__menu">

            <button class="hamburger hamburger--3dxy" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>

            {{
                 wp_nav_menu([
                    'menu' => 2,
                    'container' => FALSE,
                    'container_id' => FALSE,
                    'menu_class' => 'menu__nav',
                    'depth' => 2,
                    'walker' => new \Helpers\Excerpt_Walker
                ])
            }}

        </div>

        <div class="header__right">
            <div class="header__phone">
                <a href="tel:{!! get_field('number', 'options') !!}" class="disable_preloader">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M10.5976 12.923C10.1047 12.923 9.50947 12.7995 8.85483 12.5525C7.41963 12.0114 5.85813 10.942 4.45799 9.54184C3.05746 8.14131 1.98803 6.57941 1.44655 5.14421C0.954469 3.8393 0.953274 2.76829 1.44376 2.2782C1.51428 2.20767 1.586 2.13197 1.66011 2.05387C2.10757 1.58331 2.61319 1.05378 3.28338 1.07769C3.74517 1.09681 4.19263 1.38369 4.65084 1.95386C6.00475 3.63769 5.39434 4.23775 4.68789 4.93343L4.56318 5.05695C4.44763 5.1725 4.22928 5.70761 6.26055 7.73888C6.92357 8.40189 7.48896 8.8872 7.94079 9.18085C8.22528 9.36573 8.7341 9.64544 8.94288 9.43665L9.06839 9.30995C9.76328 8.6051 10.3633 7.99667 12.046 9.34939C12.6161 9.8076 12.9026 10.2547 12.9217 10.7173C12.9492 11.387 12.4157 11.8939 11.9448 12.3409C11.8671 12.415 11.7914 12.4867 11.7208 12.5569C11.4774 12.8007 11.0881 12.923 10.5976 12.923ZM3.23556 1.47533C2.75942 1.47533 2.3295 1.92797 1.94899 2.3284C1.87249 2.40889 1.79837 2.48698 1.72546 2.5599C1.36009 2.92487 1.39714 3.88393 1.81949 5.00396C2.34145 6.38736 3.37861 7.89905 4.74009 9.26054C6.10118 10.6212 7.61208 11.6584 8.99588 12.1799C10.1159 12.6031 11.075 12.639 11.4395 12.2744C11.5125 12.2015 11.5905 12.1273 11.671 12.0512C12.0802 11.6624 12.5444 11.2217 12.5241 10.7328C12.5102 10.3969 12.2655 10.0355 11.7969 9.65898C10.3948 8.53139 10.0027 8.92943 9.35248 9.58886L9.22498 9.71756C8.9142 10.0287 8.40937 9.95981 7.72404 9.51435C7.2487 9.20516 6.66139 8.70232 5.97925 8.01978C4.29343 6.33436 3.75434 5.30279 4.28188 4.77405L4.40898 4.64854C5.07 3.99828 5.46885 3.60582 4.34085 2.20289C3.96352 1.73472 3.60253 1.49008 3.26664 1.47573C3.25628 1.47533 3.24592 1.47533 3.23556 1.47533Z" fill="#005CA9" stroke="#005CA9" stroke-width="0.25"/>
                        </svg>
                    </div>
                    <span>
                    {!! get_field('number', 'options') !!}
                </span>
                </a>
            </div>
            <span>|</span>
            <div class="header__lng">
                <div class="lng-w">
                    @foreach($languages as $language)
                        @if($language['active'])
                            <a href="{{ $language['url'] }}">{!! $language['language_code'] !!}</a>
                        @endif
                    @endforeach
                    <i class="icon-arrow-down"></i>

                    <div class="lng-dropdown">
                        @foreach($languages as $language)
                            @if(!$language['active'])
                                <a href="{{ $language['url'] }}">{!! $language['language_code'] !!}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    @include('partials.account-forms.popup-login')--}}
{{--    @include('partials.account-forms.popup-forgot')--}}
{{--    @include('partials.account-forms.popup-register')--}}
</header>
