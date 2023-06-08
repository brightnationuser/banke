@extends('layout.main-page')

@php

    function max_title_length( $title ) {
        $max = 50;
        if( strlen( $title ) > $max ) {
            return substr( $title, 0, $max ). "&hellip;";
        } else {
            return $title;
        }
    }

@endphp

@section('content')
    <div class="first_screen">
        <div class="left"
             data-no-lazy="1"
             style="background-image: url({{ content_url('themes/classy/images/main-page-fs-bg.png') }})"></div>
        @php
            $slides = get_field('main_slider')
        @endphp

        @if(!empty($slides))
            <div class="carousel owl-carousel main-page-carousel" data-start="{{ !empty($start) ? $start : 4 }}">

                @foreach(get_field('main_slider') as $row)
                    <div class="item"
                         data-no-lazy="1"
                         style="background-image: linear-gradient(180deg, rgba(0, 30, 56, 0.95) 0%, rgba(0, 52, 98, 0) 37.99%), linear-gradient(180deg, rgba(0, 52, 98, 0) 35.18%, rgba(0, 30, 56, 0.95) 100%), url({{ wp_get_attachment_image_src($row['image']['ID'], 'large')[0] }})">
                        @if(!empty($row['link']))
                            <a href="{{ $row['link']['url']}}">{{$row['link']['title']}}</a>
                        @endif

                    </div>
                @endforeach

            </div>
        @endif

        <div class="static_content">
            <div class="container">
                <div class="logo">
                    <img src="{{ content_url('themes/classy/images/logo.svg') }}" alt="Banke logo">
                </div>
                <div class="subtitle"> {!!$post->getAcfByKey('acf_header')['acf_header_title'] !!}</div>
                <div class="caption"> {!!  $post->getAcfByKey('acf_header')['acf_header_caption'] !!}
                </div>
                <a href="{{ $post->getAcfByKey('acf_header')['acf_header_button_link'] }}"> {{ $post->getAcfByKey('acf_header')['acf_header_button'] }}</a>
            </div>
        </div>
    </div>

    @if(have_rows('numbers'))
        <div class="numbers js-numbers">
            <div class="container">
                <div class="wrapper">
                    @foreach(get_field('numbers') as $row)

                        <div class="item">
                            <div class="number" data-number="{{$row['number']}}">0</div>
                            <div class="text">{!!$row['text']!!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="our_products"
         style="background-image: url({{ content_url('themes/classy/images/product/our_products_bg.webp') }})">
        <div class="container">

            @if(!empty(get_field('what_we_do_title')))
                <div class="subtitle"> {{ get_field('what_we_do_title') }}</div>
            @endif

            @if(!empty(get_field('main_page_product_title')))
                <div class="title">{!! get_field('main_page_product_title') !!}</div>
            @endif

            @if(!empty(get_field('main_page_product_subtitle')))
                <div class="caption">{!! get_field('main_page_product_subtitle') !!}</div>
            @endif

            @php
                $slides = get_field('acf_slide', 'option');
            @endphp

            @if(!empty($slides))
                <div class="b-scene m-epto">
                    <div class="scene__item">
                        <img src="{{ $slides[0]['image']['url'] }}" class="epto__image preload"
                             alt="{{ $slides[0]['image']['alt'] }}">

                        @include ('partials.slider.partials.infobox', [
                           'items' => $slides[0]['acf_item']
                        ])
                    </div>
                </div>
            @endif

            @php
                $principles = $post->getAcfByKey('acf_benefits');
            @endphp
            @if(!empty($principles))
                <div class="principles animated fadeInUp">
                    <div class="container">
                        <div class="principles__list">
                            @foreach($principles as $key => $item)
                                <div class="principles__item">
                                    <div class="principles__image-wrap">
                                        <img class="principles__image {{ pathinfo(basename($item['image']['url']), PATHINFO_FILENAME) }}"
                                             src="{!! $item['image']['url'] !!}" alt="{{ strip_tags($item['title']) }}">
                                    </div>
                                    <div class="principles__title">
                                        {!! $item['title'] !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <a href="{{ get_field('product_page', 'option')['url'] }}"
               class="button">{{ get_field('product_page', 'option')['title'] }}</a>
        </div>

        @if(!empty($case_studies))
            <div class="home-references">
                <div class="container">
                    <div class="references-slider owl-carousel js-references-slider">

                        @foreach($case_studies as $case_study)
                            <div class="reference-slide">
                                <a href="{!! get_post_permalink($case_study->ID) !!}">

                                    @if($case_study->post_type=="page")
                                        <div class="reference-slide__image">
                                            <picture>
                                                <img src="{!! \Helpers\General::getFlyImage($case_study->getAcfByKey('acf_image'), [600, 400]); !!}"
                                                     alt="{!! $case_study->post_title !!}"/>
                                            </picture>
                                        </div>
                                    @else
                                        <div class="reference-slide__image">
                                            <picture>
                                                <img class="item__image"
                                                     src="{{ get_the_post_thumbnail_url($case_study->ID,'medium_large') }}"
                                                     alt="{{ get_the_title($case_study->ID) }}"/>
                                            </picture>
                                            <div class="manufacturer">
                                                CLIENT: {!!  get_field('subtitle',$case_study->ID) !!}
                                            </div>
                                        </div>
                                    @endif

                                    <div class="reference-slide__title">
                                        {!! max_title_length($case_study->post_title) !!}
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <div class="custom-nav">
                        <svg class="owl-prev" xmlns="http://www.w3.org/2000/svg" width="14" height="38"
                             viewBox="0 0 14 38"
                             fill="none">
                            <g clip-path="url(#clip0_414_540)">
                                <path d="M0.5 0.5L13.5 19L0.5 37.5" stroke="#9AAFC1" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_414_540">
                                    <rect width="14" height="38" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>

                        <svg class="owl-next" xmlns="http://www.w3.org/2000/svg" width="14" height="38"
                             viewBox="0 0 14 38"
                             fill="none">
                            <g clip-path="url(#clip0_414_540)">
                                <path d="M0.5 0.5L13.5 19L0.5 37.5" stroke="#9AAFC1" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_414_540">
                                    <rect width="14" height="38" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @php
        $products = $post->getAcfByKey('what_we_do');
    @endphp

    @if(!empty($products))
        <div class="other_products"
             style="background-image: url({{ content_url('themes/classy/images/other-products-bg.webp') }})">
            <div class="container">
                <h2 class="title">{{ get_field('products_title', 'option')}}</h2>
                <div class="wrapper">

                    @foreach($post->getAcfByKey('what_we_do') as $row)

                        <a href="{{ $row['link'] }}" class="item">
                            <div style="background-image: url({!! \Helpers\General::getFlyWebpImage($row['image']['id'], [700, 700]); !!})"
                                 class="image"></div>
                            <div class="title">{!! $row['title'] !!}</div>
                            <div class="description">{!! $row['text'] !!}
                            </div>
                            <div class="read_more">{!! get_field('read_more', 'options') !!}</div>
                        </a>

                    @endforeach

                </div>
            </div>
        </div>
    @endif

    @include('partials.new-video-gallery')

    @include('partials.new-contact-us', [
        'form' => $post->getAcfByKey('contact_form'),
        'title' => $post->getAcfByKey('form_title'),
        'classes' => 'contact-us--light'
    ])
    @php
        $vacancy_popup = get_field('vacancy_popup');
        $anniversary_popup = get_field('anniversary_popup');
    @endphp

    @if(!empty($vacancy_popup) && $vacancy_popup['show'])
        @include('partials.popup-vacancy', [
            'title' => $vacancy_popup['title'],
            'text' => $vacancy_popup['text'],
            'button_link' => $vacancy_popup['button_link'],
            'button_text' => $vacancy_popup['button_text']
        ])
    @endif

    @if(!empty($anniversary_popup) && $anniversary_popup['show'])
        @include('partials.popup-anniversary', [
            'title' => $anniversary_popup['title'],
            'date' => $anniversary_popup['date'],
            'time' => $anniversary_popup['time'],
            'address' => $anniversary_popup['address'],
            'link' => $anniversary_popup['link']
        ])
    @endif

@stop
