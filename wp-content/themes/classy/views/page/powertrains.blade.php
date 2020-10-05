{{--Template name: Powertrains--}}

@extends('layout.default')

@section('content')

    @if(!empty(get_field('acf_tabs', get_the_ID())))
        @include('partials.tabs', ['parent_id' => get_the_ID()])
    @endif

    @php($intro = $post->getAcfByKey('powertrains_intro'))
    <div class="p-powertrains">
        <section class="intro">
            <h2 class="animated fadeInDown" style="animation-delay: .7s">{{ $post->post_title }}</h2>
            <div class="text-center">
                <a href="#youtube-video" class="button disable_preloader js-popup-action" target="_blank">
                    <img src="/wp-content/themes/classy/images/icons/play.svg" alt="Play icon">
                    watch video
                </a>
            </div>

            <div class="container">
                <div class="intro__wrapper d-flex">
                    <div class="intro__image animated fadeInLeft" style="animation-delay: .5s">
                        @include('partials.tips-image', ['image' => $intro['image']])
                    </div>
                    <div class="intro__content js-intro-content" data-text-open="read more" data-text-close="show less">
                        <div class="intro__text animated fadeInUp" style="animation-delay: .5s">
                            <div>
                                {!! $intro['text'] !!}
                            </div>
                            <div class="js-hide-able intro__text-hidden" style="display:none;">
                                {!! $intro['hidden_text'] !!}
                            </div>
                        </div>
                        @if(!empty($intro['hidden_text']))
                            <div class="intro__read-more read-more-btn animated fadeInUp" style="animation-delay: .8s">
                                read more
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="key-benefits">
            <div class="container">
                <h2>Key Benefits</h2>
                @php($benefits = $post->getAcfByKey('benefits'))
                @if(!empty($benefits))
                    <div class="key-benefits__list d-flex">
                        @foreach($benefits as $row)
                            <div class="benefit aos-animation" data-aos-delay="{!! 200 * ($loop->index + 1) !!}">
                                <div class="benefit__content">
                                    <div class="benefit__icon">
                                        <img src="{{ $row['icon']['url'] }}" alt="{!! $row['title'] !!}">
                                    </div>
                                    <h4 class="benefit__title">
                                        {!! $row['title'] !!}
                                    </h4>
                                    <div class="benefit__text">
                                        {!! $row['text'] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        @include('partials.contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('form_title'),
            'classes' => 'contact-us--light'
        ])
    </div>

    <div class="popup js-popup" id="youtube-video">
        <div class="popup__dialog">
            <div class="popup__overlay js-popup-close"></div>

            <div class="popup__content">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sDsknFlke9U" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <button class="popup__close js-popup-close" type="button">&times;</button>
            </div>
        </div>
    </div>

@stop
