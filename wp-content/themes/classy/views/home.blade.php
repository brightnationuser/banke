@extends('layout.default')

@section('content')

    <div class="hero">
        <div class="container">
            <h1>
                {{ $post->getAcfByKey('acf_header')['acf_header_title'] }}
            </h1>

            <div class="hero__caption">
                {{--100% electric. Clean cities. Clean air--}}
                {{ $post->getAcfByKey('acf_header')['acf_header_caption'] }}
            </div>

            <div class="hero__button">
                <a href="https://banke.pro/products-2/" class="button">
                    Our products
                </a>
            </div>
        </div>
    </div>

    <div class="benefits">
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

            <div class="our-products__bg">
            </div>

            <div class="our-products__car">
                <div class="main-car">
                    <div class="container">
                        <div class="switch m_left" id="switch_left"></div>
                        <div class="switch m_right" id="switch_right"></div>

                        <div class="car" id="scene_0">

                            <div class="car-w">
                                <img src="/wp-content/themes/classy/images/pages/home/car_1.png" class="car__image preload">
                                <div class="infobox-w hidden" id="infobox_0">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_0.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Flashing beacons.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_1">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_1.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            3-way electrically adjustable<br>roof hatch (front side up,<br>rear side up,
                                            both sides up).
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_2">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_2.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Drivers cockpit and steering column<br>are pneumatically adjustable<br>and can
                                            be quick released to the front.<br>This extra
                                            space allows the driver<br>to enter or leave the cab unhindered<br>from the
                                            passenger side.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_3">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_6.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Large glass surfaces give excellent visibility<br>to all directions. Enhanced
                                            awareness of surrounding traffic<br> enhances
                                            safety when operating<br>in densely built-up areas.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_4">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_3.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            3 or 4 seat arrangement<br>for operating crew.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_5">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_2.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Adjustable steering column.<br>
                                            Pneumatically locked/unlocked to<br>
                                            quickly increase space when the<br>
                                            driver needs to step out through<br>
                                            the passenger side door.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_6">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_4.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            100% LED<br>lights throughout.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="car hidden" id="scene_1">

                            <div class="car-w">
                                <img src="/wp-content/themes/classy/images/pages/home/car_2.png" class="car__image preload">

                                <div class="infobox-w hidden" id="infobox_7">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_7.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Body builder access to<br>drive shaft for hydraulic pump.<br>45kW peak and 30kW
                                            nominal power<br>at 1000 rpm allows for the mounting<br>of normal body builder
                                            pump type.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_8">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_8.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Sliding door protrudes only 90 mm<br>to the outside of the vehicle<br>when
                                            opening and represents<br>no hazard to surrounding traffic.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_9">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_9.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Step in height for driver<br>is only 400 mm and gives immediate<br>access to
                                            seat.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_10">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_10.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Curved sliding door design<br>on driver side allows for driving<br>with open
                                            door at low speeds<br>while maintaining full steering deflection.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_11">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_11.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Body builder electrical interface<br>according to EN1501-1.<br>Can bus and
                                            Analog interfaces available.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_12">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_12.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            8 tons front axle made by ZF.<br>53 degrees deflection enables<br>a very small
                                            turning circle<br>for the vehicle.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_13">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_12.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            11,5 tons Driving axle<br>from ZF with two integrated electric motors.<br>220 kW
                                            of power enables<br>climbing angles of 14 degrees at GVW.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_14">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_12.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            8 tons rear steer axle<br>made by ZF. 29 degrees deflection enables<br>a very
                                            small turning circle<br>for the vehicle.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="car hidden" id="scene_2">

                            <div class="car-w">

                                <img src="/wp-content/themes/classy/images/pages/home/car_3.png" class="car__image preload">

                                <div class="infobox-w hidden" id="infobox_15">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_7.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Chassis fabricated from<br>automotive grade stainless steel.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_16">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_left-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_11.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            1550mm available frame space<br>(on 3600mm wheelbase vehicle)<br>offering 610
                                            liters of storage space.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_17">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_7.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Battery system design allows<br>single cell replacement<br>in case of a defect
                                            battery cell.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_18">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_7.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Battery system placement ensures<br>optimal front-axle load.<br>Gross vehicle
                                            weight is 27 tons<br>under EN2015/719 directive.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_19">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_8.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Large glass surfaces gives excellent<br> visibility to all directions.<br>Enhanced
                                            awareness of surrounding trafic<br>enhances safety when operating in<br>densilly
                                            build up areas.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_20">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_9.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Sliding door protrudes only 90 mm<br>to the outside of the vehicle<br>when
                                            opening and represents no hazard<br>to surrounding traffic and cyclists.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_21">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_9.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Step-in height for crew is only 400 mm.<br>Cab interior has a flat floor<br>throughout
                                            and a standing height of 2000 mm.
                                        </div>
                                    </div>
                                </div>

                                <div class="infobox-w hidden" id="infobox_22">
                                    <div class="infobox">
                                        <div class="infobox__dot pulse_main m_right-top"></div>
                                        <div class="infobox__image">
                                            <img src="/wp-content/themes/classy/images/pages/home/infobox/infobox_10.png" class="preload">
                                        </div>
                                        <div class="infobox__text">
                                            Curved sliding door design on passenger side<br>allows for driving with open
                                            door<br>at low speeds while maintaining full steering deflection.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="description-w">
                <h3>
                    {{ $post->getAcfByKey('acf_our_products')['acf_our_products_title'] }}
                </h3>

                <div class="description__text">
                    {{ $post->getAcfByKey('acf_our_products')['acf_our_products_text'] }}
                </div>

                <div class="description__button">
                    <a href="https://banke.pro/projects/" class="button">Read more</a>
                </div>
            </div>
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
                    <a href="https://banke.pro/products-2/" class="button">Read more</a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.contact-us')

@stop