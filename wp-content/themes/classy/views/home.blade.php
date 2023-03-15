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
    <div class="our_products" style="background-image: url({{ content_url('themes/classy/images/product/our_products_bg.jpg') }})">
        <div class="container">
            <div class="subtitle">Our Products</div>
            <div class="title">E-PTO Systems</div>
            <div class="caption">Power the on-board hydraulic systems on heavy vehicles such as refuse collection vehicles <br> (RCVs) and cranes using electric power from a Banke E-PTO instead of diesel power</div>
            <div class="product" style="background-image: url({{ content_url('themes/classy/images/product/our_products_bg.jpg') }})">
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">Available in 18, 36, 54 and 72 kWh capacity</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">Lithium Ion batteries ensure low weight of <br> the E-PTO. The chemistry used (LiFePO4) <br> ensures a slow aging of the batteries when <br> these are deeply discharged on a daily basis</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">Banke E-PTO systems have a generic design <br> and can be used with all body manufacturers</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">The battery pack is constructed in such way <br> that each cell can be individually exchanged</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">15-30 kW continuous30 - 60 kW peak</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">Available with CAN-bus or Analog <br> control interface</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">One package that contains all components. <br> No external high voltage cables</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">Powder coated aluminium outer structure<br> in RAL 9010 white. Can be delivered in RAL<br> colour code if this colour is available <br>as powder coat. Please consult the factory</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">Every E-PTO can be delivered with a Load-Sense <br>variable piston pump or alternatively a single <br>or dual gear pump. Our gear pumps <br>are noiseless continuum pumps.</div>
                </div>
                <div class="info">
                    <div class="plus"> <img src="{{ content_url('themes/classy/images/product/plus.svg') }}" ></div>
                    <div class="text">The on-board charger is connected to the mains <br> using an industrial standard CEE-16A connector. <br> You can recharge on any location where 400 Volt <br> 3 phase (16 Amp group) is available.</div>
                </div>
            </div>
            <div class="principles animated fadeInUp">
                <div class="container">
                    <div class="principles__list">
                            <div class="principles__item">
                                <div class="principles__image-wrap">
                                    <img class="principles__image"
                                         src="{{ content_url('themes/classy/images/product/1.svg') }}" >
                                </div>
                                <div class="principles__title">
                                    Less noise <br>
                                    and emissions
                                </div>
                            </div>
                        <div class="principles__item">
                            <div class="principles__image-wrap">
                                <img class="principles__image"
                                     src="{{ content_url('themes/classy/images/product/2.svg') }}" >
                            </div>
                            <div class="principles__title">
                                A full plug-in <br>
                                system
                            </div>
                        </div>
                        <div class="principles__item">
                            <div class="principles__image-wrap">
                                <img class="principles__image"
                                     src="{{ content_url('themes/classy/images/product/3.svg') }}" >
                            </div>
                            <div class="principles__title">
                                Electrical<br>
                                Cranes
                            </div>
                        </div>
                        <div class="principles__item">
                            <div class="principles__image-wrap">
                                <img class="principles__image"
                                     src="{{ content_url('themes/classy/images/product/4.svg') }}" >
                            </div>
                            <div class="principles__title">
                                Refrigeration <br>
                                Vehicles
                            </div>
                        </div>
                        <div class="principles__item">
                            <div class="principles__image-wrap">
                                <img class="principles__image"
                                     src="{{ content_url('themes/classy/images/product/5.svg') }}" >
                            </div>
                            <div class="principles__title">
                                Concrete <br>
                                Mixers
                            </div>
                        </div>
                        <div class="principles__item">
                            <div class="principles__image-wrap">
                                <img class="principles__image"
                                     src="{{ content_url('themes/classy/images/product/6.svg') }}" >
                            </div>
                            <div class="principles__title">
                                City <br>
                                Distribution
                            </div>
                        </div>
                        <div class="principles__item">
                            <div class="principles__image-wrap">
                                <img class="principles__image"
                                     src="{{ content_url('themes/classy/images/product/7.svg') }}" >
                            </div>
                            <div class="principles__title">
                                Other <br>
                                Applications
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="button">Learn more about product</a>
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
