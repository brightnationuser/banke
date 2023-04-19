{{-- Template Name: New Contacts --}}

@extends('layout.default')

@section('content')

    <section class="contacts">
        <div class="container">
            <div class="contacts__wrap d-flex">
                <div class="contacts__columns d-flex">
                    <h1 class="h2 h2--mt-0 h2--left">{!! $post->getAcfByKey('title') !!}</h1>
                    <div class="contacts__left">

                        @foreach($post->getAcfByKey('contact_info_left') as $row)

                            <div class="contact animated fadeInUp"
                                 style="animation-delay: {{ 200 * (1 + $loop->index) }}">
                                <h3 class="contact__title">{!! $row['title'] !!}</h3>

                                @if(!empty($row['text']))
                                    <div class="contact__text">{!! $row['text'] !!}</div>
                                @endif

                                @if(!empty($row['phone']))
                                    <div class="contact__info">
                                        <a class="disable_preloader" href="tel:{!! $row['phone'] !!}">
                                            <i class="icon-phone"></i>
                                            <span>{!! $row['phone'] !!}</span>
                                        </a>
                                    </div>
                                @endif

                                @if(!empty($row['email']))
                                    <div class="contact__info">
                                        <a class="disable_preloader" href="mailto:{{$row ['email'] }}">
                                            <i class="icon-email"></i>
                                            <span>{!! $row['email'] !!}</span>
                                        </a>
                                    </div>
                                @endif

                                @if(!empty($row['work_time']))
                                    <div class="contact__info">
                                        <i class="icon-clock"></i>
                                        <span>{!! $row['work_time'] !!}</span>
                                    </div>
                                @endif

                            </div>
                        @endforeach

                    </div>
                    <div class="contacts__right">

                        @foreach($post->getAcfByKey('contact_info_right') as $row)

                            <div class="contact animated fadeInUp"
                                 style="animation-delay: {{ 200 * (1 + $loop->index) * (1 + count($post->getAcfByKey('contact_info_left'))) }}ms">
                                <h3 class="contact__title">{!! $row['title'] !!}</h3>

                                @if(!empty($row['text']))
                                    <div class="contact__text">{!! $row['text'] !!}</div>
                                @endif

                                @if(!empty($row['phone']))
                                    <div class="contact__info">
                                        <a class="disable_preloader" href="tel:{!! $row['phone'] !!}">
                                            <i class="icon-phone"></i>
                                            <span>{!! $row['phone'] !!}</span>
                                        </a>
                                    </div>
                                @endif

                                @if(!empty($row['email']))
                                    <div class="contact__info">
                                        <a class="disable_preloader" href="mailto:{{$row ['email'] }}">
                                            <i class="icon-email"></i>
                                            <span>{!! $row['email'] !!}</span>
                                        </a>
                                    </div>
                                @endif

                                @if(!empty($row['work_time']))
                                    <div class="contact__info">
                                        <i class="icon-clock"></i>
                                        <span>{!! $row['work_time'] !!}</span>
                                    </div>
                                @endif

                            </div>

                        @endforeach

                    </div>
                </div>

                <div class="contact-us {{ $classes }}">
                    <div class="container">
                        <div class="contact-us__form">
                            <div class="form_overlay js-form_overlay">
                                <div class="cross">
                                    &times;
                                </div>
                                <div class="icon">
                                    <svg width="81" height="38" viewBox="0 0 81 38" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_418_4401)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M24.2211 37.903H69.084C71.3727 37.903 73.6114 36.105 74.0736 33.8958L80.1549 4.78718C80.3946 3.64689 80.1463 2.55929 79.4581 1.7283C78.7682 0.8956 77.7403 0.436768 76.5572 0.436768H31.6942C29.4055 0.436768 27.1686 2.23301 26.7046 4.4439L20.6233 33.5526C20.3836 34.6928 20.632 35.7805 21.3201 36.6114C22.01 37.4441 23.0397 37.903 24.2211 37.903ZM28.3931 4.78888C28.6949 3.3512 30.2075 2.13615 31.6942 2.13615H76.5572C77.2108 2.13615 77.7662 2.37236 78.1197 2.8023C78.475 3.23055 78.5975 3.81513 78.4664 4.4456L72.3851 33.5543C72.0833 34.9919 70.5724 36.2053 69.084 36.2053H24.2211C23.5674 36.2053 23.0138 35.9691 22.6585 35.5391C22.3032 35.1109 22.1807 34.5263 22.3118 33.8958L28.3931 4.78888Z"
                                                  fill="#003462"/>
                                            <path d="M49.8967 23.4515C48.6015 23.4515 47.3045 22.9655 46.4008 22.0257L29.3555 4.32157C29.0278 3.98169 29.0399 3.44299 29.3883 3.12181C29.7315 2.80062 30.28 2.81082 30.6059 3.1541L47.6512 20.8565C48.6584 21.8948 50.4969 22.0614 51.6697 21.21L76.7348 3.05213C77.116 2.77513 77.6558 2.85331 77.9404 3.23397C78.2215 3.61293 78.1387 4.14313 77.7558 4.42183L52.689 22.578C51.8784 23.166 50.8884 23.4515 49.8967 23.4515Z"
                                                  fill="#003462"/>
                                            <path d="M21.3163 7.60002H9.96952C9.49351 7.60002 9.10718 7.11362 9.10718 6.5143C9.10718 5.91499 9.49351 5.42859 9.96952 5.42859H21.3163C21.7923 5.42859 22.1786 5.91499 22.1786 6.5143C22.1786 7.11362 21.7923 7.60002 21.3163 7.60002Z"
                                                  fill="#003462"/>
                                            <path d="M19.1283 18.4572H1.26462C0.783422 18.4572 0.392883 17.9708 0.392883 17.3715C0.392883 16.7722 0.783422 16.2858 1.26462 16.2858H19.1283C19.6095 16.2858 20 16.7722 20 17.3715C20 17.9708 19.6095 18.4572 19.1283 18.4572Z"
                                                  fill="#003462"/>
                                            <path d="M15.9145 29.3143H7.74623C7.29489 29.3143 6.92859 28.8279 6.92859 28.2285C6.92859 27.6292 7.29489 27.1428 7.74623 27.1428H15.9145C16.3659 27.1428 16.7322 27.6292 16.7322 28.2285C16.7322 28.8279 16.3659 29.3143 15.9145 29.3143Z"
                                                  fill="#003462"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_418_4401">
                                                <rect width="80.6071" height="38" fill="white"
                                                      transform="translate(0.392883)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </div>
                                {!! get_field('mail_success', 'options') !!}
                            </div>

                            @if(!empty($form))
                                {!! do_shortcode($form) !!}
                            @else

                                @if(ICL_LANGUAGE_CODE === 'en')
                                    {!! do_shortcode('[contact-form-7 id="3267" title="Contact page form EN with placeholders"]') !!}
                                @elseif(ICL_LANGUAGE_CODE === 'de')
                                    {!! do_shortcode('[contact-form-7 id="3285" title="Contact page form DE with placeholders"]') !!}
                                @endif
                            @endif

                            <div class="socials_block wrapper">
                                <div class="title">
                                    {!! get_field('contact_us_social_title', 'options') !!}
                                </div>
                                <div class="socials_list wrapper">

                                    <a href="{!! get_field('linkedin', 'option')['link'] !!}"
                                       class="social linkedin disable_preloader"
                                       target="_blank">

                                        <i class="icon-linkedin"></i>
                                    </a>

                                    <a href="{!! get_field('facebook', 'option')['link'] !!}"
                                       class="social facebook disable_preloader"
                                       target="_blank">

                                        <i class="icon-facebook"></i>
                                    </a>

                                    <a href="{!! get_field('youtube', 'option')['link'] !!}"
                                       class="social youtube disable_preloader"
                                       target="_blank">

                                        <i class="icon-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgemEnSDgHmYiG0c3RHFD1s5h16yfS2ZE&amp;language=en"></script>

    <script>
        jQuery(document).ready(function () {
            var map; // Global declaration of the map
            var markersArray = []; //массив маркеров на карте
            var locations = [];
            var colors = {'uptown': '#27d3c9', 'downtown': '#e7680c', 'midtown': '#a438ca'};

            // Получаем данные для карты из пхп55.05135327352421, 9.748866740590023
            locations[0] = [
                'Mellemvej 20, 6430 Nordborg, Denmark',
                '55.05083489983951',
                '9.750879922549528',
                '0',
                '',
            ];

            var average = function average(nums) {
                return +(nums.reduce((a, b) => (a + b)) / nums.length).toFixed(6);
            };

            var latitudes = locations.map(item => +item[1]);
            var longitudes = locations.map(item => +item[2]);
            var center = [average(latitudes), average(longitudes)];

            var api_center_param = new google.maps.LatLng(center[0] + 0.001, center[1] + 0.006);
            var myOptions = {};
            if (window.innerWidth <= 992) {
                api_center_param = new google.maps.LatLng(center[0], center[1]);
            }

            function initialize_map() {
                //console.log('initialize_map');

                myOptions = {
                    zoom: 21,
                    scrollwheel: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false,
                    mapTypeControlOptions: {position: google.maps.ControlPosition.TOP_RIGHT},
                    minZoom: 15,
                    maxZoom: 30,
                    zoomControlOptions: {style: google.maps.ZoomControlStyle.LARGE},
                    //center: new google.maps.LatLng(locations[1][1], locations[1][2]),
                    center: api_center_param,

                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{
                        "featureType": "all",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#6c6c6c"}]
                    }, {
                        "featureType": "all",
                        "elementType": "labels.text.stroke",
                        "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]
                    }, {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [{"visibility": "off"}]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#aaa"}, {"lightness": 20}]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{"color": "#aaa"}, {"lightness": 17}, {"weight": 1.2}]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{"color": "#f0f0f0"}]
                    }, {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{"color": "#f0f0f0"}]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{"color": "#ffffff"}, {"weight": 0.2}]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{"color": "#e1e1e1"}, {"lightness": 17}]
                    }]
                };

                map = new google.maps.Map(document.getElementById("map"), myOptions);
                // google.maps.event.addListener(map, "rightclick", function (event) {
                //     console.info('lat|lng: ' + event.latLng.lat() + ', ' + event.latLng.lng());
                // });

                add_markers();
            }

            function add_markers() {
                var bounds = new google.maps.LatLngBounds(); //массив точек

                var marker_icon = {
                    url: '/wp-content/themes/classy/images/banke-marker.png',
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(74, 65),
                    // labelOrigin: new google.maps.Point(24, 85),
                    scaledSize: new google.maps.Size(100, 100)
                };

                if (window.innerWidth < 768) {
                    marker_icon.size = new google.maps.Size(70, 70);
                    marker_icon.anchor = new google.maps.Point(37, 15);
                    // marker_icon.labelOrigin = new google.maps.Point(11, 45);
                    marker_icon.scaledSize = new google.maps.Size(70, 70);
                }

                var marker, i;
                var infowindow = new google.maps.InfoWindow({
                    pixelOffset: new google.maps.Size(0, 0)
                });

                for (i = 0; i < locations.length; i++) {
                    var marker_position = new google.maps.LatLng(locations[i][1], locations[i][2]);
                    var title = locations[i][0];


                    var marker_options = {
                        position: marker_position,
                        map: map,
                        icon: marker_icon,
                    };

                    if (window.innerWidth < 768) {
                        //marker_options.icon.url = '/wp-content/themes/kadroom/img/icons/map-marker-' + title + '-sm.png';
                        // marker_options.label.fontSize = '14px';
                    }

                    //if (locations[i][3] === '0') marker_options.label = null;

                    marker = new google.maps.Marker(marker_options);


                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            window.open('https://www.google.com/maps/place/Banke+Aps/@55.0508893,9.748443,17z/data=!3m1!4b1!4m5!3m4!1s0x47b33739354187c3:0x8527e938d58e7be6!8m2!3d55.0508862!4d9.750637', '_blank').focus();

                        }
                    })(marker, i));


                    bounds.extend(marker_position); //добавляем позиции маркеров
                }

                google.maps.event.addListener(infowindow, 'domready', function () {
                    var infoContent = jQuery('.infowindow-content');

                    infoContent.css({
                        'padding': '6px',
                        'font-size': '16px',
                        'font-family': "'Open', sans-serif",
                    });

                    var wrapper = infoContent.parent().parent().parent().siblings();

                    for (var i = 0; i < wrapper.length; i++) {
                        if (jQuery(wrapper[i]).css('z-index') === 'auto') {
                            wrapper.find('div:last-child').css('background-color', 'transparent');
                            wrapper.parent().find('img').hide();

                            jQuery(wrapper[i]).css({
                                'border': '2px solid #C90006',
                                'border-radius': '6px',
                                'color': 'black',
                                'font-size': '18px',
                                'background-color': '#1d1d1d',
                                'width': '100%',
                                'height': '100%',
                            });

                            wrapper.parent().fadeIn();
                        }
                    }

                    infoContent.on('click', function () {
                        location.href = "http://escape-city/#?tag_id=" + jQuery(this).data('id');
                    });
                });
                // уменьшаем зум
                google.maps.event.addListenerOnce(map, 'idle', function () {
                    var zoom = map.getZoom();
                    if (zoom > 13) zoom = 13;
                    map.setZoom(zoom);
                });

            }

            var panBy = false;

            function onResizeHandler() {
                var width = window.innerWidth;
                var screenWidth = 768;

                if (myOptions.zoom !== 11 && width < screenWidth) {
                    myOptions.zoom = 11;
                    map.setZoom(myOptions.zoom)
                } else if (myOptions.zoom === 11 && width >= screenWidth) {
                    myOptions.zoom = 12;
                    map.setZoom(myOptions.zoom)
                }

                if (!panBy && width >= screenWidth) {
                    map.panBy(-jQuery('.b-map__box').outerWidth() + 200, 0);
                    panBy = true;
                } else if (panBy && width < screenWidth) {
                    map.panBy((jQuery('.b-map__box').outerWidth() + 50) / 2, 0);
                    panBy = false;
                }
            }

            // google.maps.event.addDomListener(window, "load", initialize_map);

            if (window.google) {
                google.maps.event.addDomListener(window, 'load', function () {
                    var map_inted = false;

                    setTimeout(function () {
                        if (!map_inted) {
                            initialize_map();
                            onResizeHandler();
                            window.addEventListener('resize', onResizeHandler);
                            map_inted = true;
                        }
                    }, 0);

                    jQuery('#map').on('mouseover', function () {
                        if (!map_inted) {
                            initialize_map();
                            onResizeHandler();
                            window.addEventListener('resize', onResizeHandler);
                            map_inted = true;
                        }
                    });
                });
            }
        })

    </script>
@stop