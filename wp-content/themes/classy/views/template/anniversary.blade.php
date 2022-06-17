{{-- Template Name: Anniversary --}}

@extends('layout.default')

@section('content')

    <section class="head">
        <div class="container">
            <h1 class="head__title">10+1 Anniversary</h1>

            <div class="head__row">
                <p class="head__item"><img src="{{get_template_directory_uri()}}/images/icons/icon_calendar_blue.svg" alt="calendar"> 29<sup>TH</sup> of June, 2022</p>

                <p class="head__item"><img src="{{get_template_directory_uri()}}/images/icons/icon_clock_blue.svg" alt="clock"> 09:30</p>

                <a target="_blank" rel="noopener nofollow noreferrer" href="https://www.google.com/maps/place/Mellemvej+20,+6430+Nordborg,+%D0%94%D0%B0%D0%BD%D1%96%D1%8F/@55.0509199,9.7482639,16.25z/data=!4m5!3m4!1s0x47b335874c090157:0xb892b049cd1eaf63!8m2!3d55.0508862!4d9.750637" class="head__item"><img src="{{get_template_directory_uri()}}/images/icons/icon_mark.svg" alt="mark"> Mellemvej 20, 6430 Nordborg, Denmark</a>
            </div>

            <a href="https://docs.google.com/forms/d/e/1FAIpQLSedU3fuugqiPRed8ZXsabILbVg_52UdDshncz98BEW4rEjItA/viewform" target="_blank" rel="nofollow noopener noreferrer" class="btn--anniversary btn--head">REGISTER Now</a>
        </div>
    </section>

    <section class="event">
        <div class="container">
            <h2 class="pretitle event__title">About Event</h2>

            <div class="event__content">
                <p>In 2021 Banke ApS celebrated it’s 10th anniversary. Unfortunately COVID-19 prevented us from <br> celebrating a decade in business in the style we would have liked to. We would therefore like to invite you <br> to our 10+1 anniversary event which will be held on the 29th of June at our new location at Mellemvej 20, 6430 Nordborg, Denmark. We have prepared a number of different Q&A sessions and other activities you can <br> participate in covering various topics related to the business of electrifying working vehicle applications. </p>

                <p>In parallel we will hold an Open House reception, where you can, in an informal setting, meet with <br> our team and other guests. You will also have the opportunity to look round our new production facilities, <br> see our solutions in action and have all your questions answered by our expert engineers and technicians. Check out the program below and let us know which sessions you’d like to attend.</p>
            </div>
        </div>
    </section>

    <section class="agenda" id="agenda">
        <div class="container">
            <h2 class="pretitle agenda__title">Agenda</h2>

            <h3 class="agenda__subtitle">WEDNESDAY 29<sup>TH</sup> OF JUNE, 2022</h3>

            <div class="agenda__block">
                <div class="agenda__item">
                    <p>09:30 – 10:00</p>

                    <p>Registration and coffee</p>
                </div>

                <div class="agenda__item">
                    <p>10:00 – 11:00</p>

                    <p>Welcome and Tour of the Factory</p>
                </div>

                <div class="agenda__item">
                    <p>11:00 – 12:00</p>

                    <p>Q&A About Power Take-offs</p>
                </div>

                <div class="agenda__item">
                    <p>12:00 – 12:45</p>

                    <p>Future of the Chargers</p>
                </div>

                <div class="agenda__item">
                    <p>12:45 – 13:45</p>

                    <p>Lunch</p>
                </div>

                <div class="agenda__item">
                    <p>13:45 – 15:00</p>

                    <p>Q&A About Battery-electric and Fuel-cell Powertrains for Heavy Vehicles.</p>
                </div>

                <div class="agenda__item">
                    <p>15:00 – 15:15</p>

                    <p>Short Break</p>
                </div>

                <div class="agenda__item">
                    <p>15:15 – 16:30</p>

                    <p>"Hydrogen as a fuel". Panel debate with Uffe Borup (Everfuel), Søren Have (Concito), Søren Büchmann Petersen (DTL), and Brian Vad Mathiesen (Aalborg University)</p>
                </div>

                <div class="agenda__item">
                    <p>16:30 – 17:00</p>

                    <p>Rasmus BANKE Closing Remarks</p>
                </div>

                <div class="agenda__item">
                    <p>17:00 – 18:00</p>

                    <p>Networking/Customer Meetings</p>
                </div>

                <div class="agenda__item">
                    <p>18:00</p>

                    <p>Dinner</p>
                </div>
            </div>

            <div class="agenda__btns">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSedU3fuugqiPRed8ZXsabILbVg_52UdDshncz98BEW4rEjItA/viewform" target="_blank" rel="nofollow noopener noreferrer" class="btn--anniversary btn--agenda">REGISTER NOW</a>

                <a href="https://zoom.us/j/95364685706" target="_blank" rel="nofollow noopener noreferrer" class="btn--anniversary btn--agenda btn--zoom">Participate Online</a>
            </div>
        </div>
    </section>

{{--    <section class="getting">--}}
{{--        <div class="container">--}}
{{--            <h2 class="pretitle getting__title">Getting to Nordborg by</h2>--}}

{{--            <div class="getting__row">--}}
{{--                <div class="getting-item">--}}
{{--                    <img src="{{get_template_directory_uri()}}/images/icons/icon_car.svg" alt="car">--}}

{{--                    <h3 class="getting-item__title">CAR</h3>--}}

{{--                    <div class="getting-item__content">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                Turn to Sønderborg--}}
{{--                                direction (Kliplev exit) from--}}
{{--                                the motorway A45--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="getting-item">--}}
{{--                    <img src="{{get_template_directory_uri()}}/images/icons/icon_plane.svg" alt="plane">--}}

{{--                    <h3 class="getting-item__title">PLANE</h3>--}}

{{--                    <div class="getting-item__content">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                From Copenhagen Airport –--}}
{{--                                direct flight to Sønderborg--}}
{{--                                <a href="https://alsieexpress.dk/en/" target="_blank" rel="nofollow noopener noreferrer">Frontpage - Alsie Express</a>--}}
{{--                            </li>--}}

{{--                            <li>--}}
{{--                                From Hamburg or Billund--}}
{{--                                Airport – to rent a car--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="getting-item">--}}
{{--                    <img src="{{get_template_directory_uri()}}/images/icons/icon_train.svg" alt="train">--}}

{{--                    <h3 class="getting-item__title">TRAIN</h3>--}}

{{--                    <div class="getting-item__content">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                Check railway services how to reach Sønderborg station--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <p class="getting__after">You are always welcome <br> to <a href="#contact_us">contact us</a> for more details</p>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="accommodation">
        <div class="container">
            <h2 class="pretitle accommodation__title">Accommodation</h2>

            <div class="accommodation__descr">
                <p>
                    There are a number of hotel options in Sønderborg and Nordborg for those planning to stay for a night or two.
                    Please remember though that Sønderborg and Als are popular tourist destinations particularly during the summer months, so we advise you to book you stay well in advance.
                </p>
            </div>

            <div class="accommodation__row">
                <div class="accommodation-item">
                    <h3 class="accommodation-item__title">SØNDERBORG</h3>

                    <div class="accommodation-item__block row">
                        <a href="https://alsik.dk/en/" target="_blank" rel="nofollow noopener noreferrer">Alsik Hotel & Spa</a>

                        <a href=https://hotelsonderborgkaserne.dk/kontakt-os/" target="_blank" rel="nofollow noopener noreferrer">Sønderborg Kasserne</a>

                        <a href="https://www.scandichotels.com/hotels/denmark/sonderborg/scandic-sonderborg" target="_blank" rel="nofollow noopener noreferrer">Scandic</a>

                        <a href="https://www.hotel6400.dk/" target="_blank" rel="nofollow noopener noreferrer">Hotel 6400</a>

                        <a href="http://www.hotelsoenderborg.dk/" target="_blank" rel="nofollow noopener noreferrer">Sønderborg Garnie</a>

                        <a href="https://sonderborgstrand.dk/en/" target="_blank" rel="nofollow noopener noreferrer">Sønderborg Strand</a>
                    </div>
                </div>

                <div class="accommodation-item">
                    <h3 class="accommodation-item__title">NORDBORG</h3>

                    <div class="accommodation-item__block">
                        <a href="https://www.nhhus.dk" target="_blank" rel="nofollow noopener noreferrer">Nørherredhus Hotel</a>

                        <p>
                            Located conveniently close to our factory. The hotel has only 20 rooms so if you want to book a room please let us know and we will try to help.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section" id="contact_us">
        <div class="container">
            <h2 class="pretitle contact-section__title">Contact Us</h2>

            <div class="contact-section__descr">
                <p>For further information about the event, please contact Tetiana Gregersen</p>
            </div>

            <ul class="contact-section__row">
                <li>
                    <a href="mailto:tg@banke.pro"><img src="{{get_template_directory_uri()}}/images/icons/icon_mail.svg" alt="mail"> tg@banke.pro</a>
                </li>
                
                <li>
                    <a href="tel:+4522712206"><img src="{{get_template_directory_uri()}}/images/icons/icon_phone.svg" alt="phone"> +45 2271 2206</a>
                </li>
            </ul>

{{--            <a href="{{get_permalink(get_page_by_path('contacts')->ID)}}" class="btn--anniversary btn--contact">Contact us</a>--}}
        </div>
    </section>
@stop