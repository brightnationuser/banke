@extends('layout.default')

@section('content')

    <div class="hero parallax-container">
{{--        <div class="parallax" id="js_hero_hero">
        </div>--}}

        <div class="parallax">
            <img src="/wp-content/themes/classy/images/bg/header-bg-2.jpg" alt="" data-type="parallax" data-depth="2" data-shift="150">
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

    <div class="what-we-do">
        <div class="container">
            <h2>
                What We Do
            </h2>

            @if(!empty($post->getAcfByKey('what_we_do')))
                <div class="what-we-do__list d-flex">
                    @foreach($post->getAcfByKey('what_we_do') as $row)
                        <div class="what-we-do__item item">
                            <div class="item__image">
                                <a  href="{{ $row['link'] }}">
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
                                <a  href="{{ $row['link'] }}" class="item__read-more read-more">
                                    Read More
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
            <h2>References</h2>

            <div class="references-slider owl-carousel js-references-slider">
                @foreach($references as $reference)
                    <div class="reference-slide">
                        <a href="{!! get_post_permalink($reference->ID) !!}">
                            <div class="reference-slide__image">
                                <img src="{!! wp_get_attachment_url($reference->getAcfByKey('acf_image')) !!}" alt="{!! $reference->post_title !!}">
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

@stop
