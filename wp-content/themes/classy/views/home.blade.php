@extends('layout.default')

@section('content')

    <div class="hero parallax-container">
        {{--        <div class="parallax" id="js_hero_hero">
                </div>--}}

        <div class="parallax">
            <img src="/wp-content/themes/classy/images/bg/header-bg-2.jpg" alt="Banke bg" data-type="parallax"
                 data-depth="2" data-shift="150">
        </div>

        <div class="container">
            <div class="h1">
                {{ $post->getAcfByKey('acf_header')['acf_header_title'] }}
            </div>

            <h1 class="hero__caption">
                {{ $post->getAcfByKey('acf_header')['acf_header_caption'] }}
            </h1>

            <div class="hero__button">
                <a href="{{ $post->getAcfByKey('acf_header')['acf_header_button_link'] }}" class="button">
                    {{ $post->getAcfByKey('acf_header')['acf_header_button'] }}
                </a>
            </div>
        </div>
    </div>

    <div class="what-we-do">
        <div class="container">
            @if(!empty(get_field('what_we_do_title')))
                <h2>
                    {{ get_field('what_we_do_title') }}
                </h2>
            @endif

            @if(!empty($post->getAcfByKey('what_we_do')))
                <div class="owl-carousel js-what-we-do-slider what-we-do__list">
                    @foreach($post->getAcfByKey('what_we_do') as $row)
                        <div class="what-we-do__item item">
                            <div class="item__image">
                                <a href="{{ $row['link'] }}">
                                    <img src="{!! $row['image']['url'] !!}" alt="{{ $row['title'] }}">
                                </a>
                            </div>
                            <div class="item__content">
                                <h3 class="item__title">
                                    {!! $row['title'] !!}
                                </h3>
                                <div class="item__text">
                                    {!! $row['text'] !!}
                                </div>
                                <a href="{{ $row['link'] }}" class="item__read-more read-more">
                                    {!! get_field('read_more', 'options') !!}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="home-references">
        <div class="container">
            @if(!empty(get_field('references_title')))
                <h2>
                    {{ get_field('references_title') }}
                </h2>
                @if(!empty(get_field('references_about')))
                    <p>{{ get_field('references_about') }}</p>
                @endif
            @endif

            <div class="references-slider owl-carousel js-references-slider">
                @foreach($references as $reference)
                    <div class="reference-slide">
                        <a href="{!! get_post_permalink($reference->ID) !!}">
                            <div class="reference-slide__image">
                                <img src="{!! wp_get_attachment_url($reference->getAcfByKey('acf_image')) !!}"
                                     alt="{!! $reference->post_title !!}">
                            </div>
                            <div class="reference-slide__title">
                                {!! $reference->post_title !!}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('partials.contact-us', [
        'form' => $post->getAcfByKey('contact_form'),
        'title' => $post->getAcfByKey('form_title'),
        'classes' => 'contact-us--light'
    ])
{{--
    @include('partials.popup-youtube', [
        'title' => get_field('video_top_text', 'option'),
        'image' => '/wp-content/themes/classy/images/video-preview.jpg',
    ])--}}
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
