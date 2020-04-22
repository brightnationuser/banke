@extends('layout.default')

@section('content')

    <div class="hero parallax-container">
 {{--       <div class="parallax" id="js_hero_hero">
        </div>--}}

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

    <div class="what-we-do">
        <div class="container">
            <h2>
                What We Do
            </h2>

            <div class="what-we-do__list d-flex">
                <div class="what-we-do__item item">
                    <div class="item__image">
                        <img src="/wp-content/themes/classy/images/pages/home/wwd-1.png" alt="image">
                    </div>
                    <div class="item__content">
                        <h3 class="item__title">
                            E-PTO Systems
                        </h3>
                        <div class="item__text">
                            Banke offers the broadest range of electric power
                            take-off (E-PTO) solutions for refuse vehicles and mobile cranes
                        </div>
                        <a  href="#" class="item__read-more read-more">
                            Read More
                        </a>
                    </div>

                </div>

                <div class="what-we-do__item item">
                    <div class="item__image">
                        <img src="/wp-content/themes/classy/images/pages/home/wwd-2.png" alt="image">
                    </div>
                    <div class="item__content">
                        <h3 class="item__title">
                            Engineering Services
                        </h3>
                        <div class="item__text">
                            Our team of automotive and power-electronics engineers is ready
                            to begin designing your battery-electric solution now
                        </div>
                        <a  href="#" class="item__read-more read-more">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.contact-us', [
        'form' => $post->getAcfByKey('contact_form'),
        'title' => 'Contact Us',
        'classes' => 'contact-us--light'
    ])

@stop
