@extends('layout.main-page')

@section('content')
    <div class="first_screen">
        <div class="left" style="background-image: url({{ content_url('themes/classy/images/main-page-fs-bg.png') }})">

        </div>
        <div class="carousel owl-carouse">
            <div class="item"  style="background-image: url({{ content_url('themes/classy/images/main-page-fs-slide-1.jpg') }})">
                <a href="#">E-PTO Systems: Learn More</a>
            </div>
        </div>
        <div class="static_content">
            <div class="container">
                <div class="logo">
                    <img src="{{ content_url('themes/classy/images/main-page-logo.png') }}" alt="Banke logo">
                </div>
                <div class="subtitle">Electrifying Heavy Vehicles</div>
                <div class="caption">We provide sustainable solutions <br> that improve the performance <br> of heavy-duty vehicles while <br> reducing their environmental impact</div>
                <a href="#">Learn More</a>
            </div>
        </div>
    </div>
    <div class="numbers">
        <div class="container">
            <div class="wrapper">
                <div class="item">
                    <div class="number">12</div>
                    <div class="text">years <br>  of experience
                    </div>
                </div>
                <div class="item">
                    <div class="number">18</div>
                    <div class="text">European <br> countries</div>
                </div>
                <div class="item">
                    <div class="number">500+</div>
                    <div class="text">units <br> of products</div>
                </div>
            </div>
        </div>
    </div>

    <div class="other_products" style="background-image: url({{ content_url('themes/classy/images/other-products-bg.jpg') }})">
        <div class="container">
            <h2 class="title">Other Products</h2>
            <div class="wrapper">

                <a href="#" class="item">
                    <div class="image" style="background-image: url({{ content_url('themes/classy/images/main-page-our-products.jpg') }})" class="image"></div>
                    <div class="title">Full-electric Powertrains</div>
                    <div class="description">Banke can rebuild your used diesel/CNG vehicles for a second tour of duty with full-electric operation</div>
                    <div class="read_more">Read More</div>
                </a>
                <a href="#" class="item">
                    <div class="image" style="background-image: url({{ content_url('themes/classy/images/main-page-our-products.jpg') }})" class="image"></div>
                    <div class="title">Electric chassis PTO</div>
                    <div class="description">Banke offers first-generation electric chassis PTO (eC-PTO) solutions for battery-electric vehicles</div>
                    <div class="read_more">Read More</div>
                </a>
             </div>
        </div>
    </div>


    <div class="home-references">
        <div class="container">

            <div class="references-slider owl-carousel js-references-slider">

                @foreach($case_studies as $case_study)
                    <div class="reference-slide">
                        <a href="{!! get_post_permalink($case_study->ID) !!}">
                            @if($case_study->post_type=="page")
                                <div class="reference-slide__image">
                                    <picture>
                                        <img src="{!! \Helpers\General::getFlyImage($case_study->getAcfByKey('acf_image'), [600, 400]); !!}" alt="{!! $case_study->post_title !!}"/>
                                    </picture>
                                </div>
                            @else
                            <div class="reference-slide__image">
                                <picture>
                                    <img class="item__image" src="{{ get_the_post_thumbnail_url($case_study->ID,'medium_large') }}" alt="{{ get_the_title($case_study->ID) }}"/>
                                </picture>
                            </div>
                                {!!  get_field('subtitle',$item->ID) !!}
                            @endif
                            <div class="reference-slide__title">
                                {!! $case_study->post_title !!}
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="video-carousel">
        <div class="container">
                <h2>
                    Video Gallery
                </h2>
                <div class="owl-carousel js-main-page-video-carousel">
                        <div class="item">
                            <div class="item__image">
                                <a href="#">
                                    <picture>
                                        <img src="#" alt="{{ $row['title'] }}"/>
                                    </picture>
                                </a>
                            </div>
                        </div>

                </div>
        </div>
    </div>
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
