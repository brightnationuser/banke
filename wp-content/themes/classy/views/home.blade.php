@extends('layout.default')

@section('content')

    <div class="hero parallax-container">
        {{--<div class="parallax" id="js_hero_hero">--}}
            {{--<img src="/wp-content/themes/classy/images/bg/header-bg-2.jpg" data-type="parallax" data-depth="2" data-shift="100">--}}
        {{--</div>--}}

        <div class="parallax">
            <img src="/wp-content/themes/classy/images/bg/header-bg-2.jpg" data-type="parallax" data-depth="2" data-shift="100">
        </div>

        <div class="container">
            <h1>
                {{ $post->getAcfByKey('acf_header')['acf_header_title'] }}
            </h1>

            <div class="hero__caption">
                {{ $post->getAcfByKey('acf_header')['acf_header_caption'] }}
            </div>

            <div class="hero__button">
                <a href="/epto-systems/" class="button">
                    Our products
                </a>
            </div>
        </div>
    </div>

    <div class="benefits m_4">
        <div class="container">
            @foreach($post->getAcfByKey('acf_header')['acf_header_benefits'] as $key => $item)
                <div class="benefit">
                    <div class="benefit__image">
                        @if($key == 0)<i class="icon-lamp"></i>@endif
                        @if($key == 1)<i class="icon-earth"></i>@endif
                        @if($key == 2)<i class="icon-design"></i>@endif
                        @if($key == 3)<i class="icon-quality"></i>@endif
                    </div>

                    <div class="benefit__title">
                        {{ $item['acf_header_benefits_title'] }}
                    </div>

                    <div class="benefit__caption">
                        {{ $item['acf_header_benefits_text'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="our-products">
        <div class="container">
            <h2>
                Our products
            </h2>

            {{--@include('partials.car-slider')--}}
        </div>
    </div>

    <div class="epto">
        <div class="container">
            @include('partials.epto-slider')

            <div class="description-w">
                <h3>
                    {{ $post->getAcfByKey('acf_our_products')['acf_our_products_title_2'] }}
                </h3>

                <div class="description__text">
                    {{ $post->getAcfByKey('acf_our_products')['acf_our_products_text_2'] }}
                </div>

                <div class="description__button">
                    <a href="/epto-systems/" class="button">Read more</a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.contact-us')

@stop
