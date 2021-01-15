{{--Template name: Powertrains--}}

@extends('layout.default')

@section('content')

    @if(!empty(get_field('acf_tabs', get_the_ID())))
        @include('partials.tabs', ['parent_id' => get_the_ID()])
    @endif

    @php($intro = $post->getAcfByKey('powertrains_intro'))
    <div class="p-powertrains">
        <section class="intro">
            <h1 class="animated fadeInDown h2" style="animation-delay: .7s">{{ $post->post_title }}</h1>

            <div class="container">
                <div class="intro__wrapper d-flex">
                    <div class="intro__image animated fadeInLeft" style="animation-delay: .5s">
                        @include('partials.tips-image', ['image' => $intro['image']])
                    </div>
                    <div class="intro__content js-intro-content" data-text-open="{{ strtolower(get_field('read_mode', 'option')) }}" data-text-close="show less">
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
                                {{ strtolower(get_field('read_mode', 'option')) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        @include('partials.video-gallery')


        @include ('partials.specification', [
               'items' => get_field('specification')
            ])


        <section class="key-benefits">
            <div class="container">
                <h2>{{ !empty($post->getAcfByKey('benefits_title')) ? $post->getAcfByKey('benefits_title') : 'Key Benefits' }}</h2>
                @php($benefits = $post->getAcfByKey('benefits'))
                @if(!empty($benefits))
                    <div class="key-benefits__list d-flex">
                        @foreach($benefits as $row)
                            <div class="benefit js-benefit aos-animation" data-aos-delay="{!! 200 * ($loop->index + 1) !!}">
                                <div class="benefit__content">
                                    <div class="benefit__icon">
                                        <img src="{{ $row['icon']['url'] }}" alt="{!! $row['title'] !!}">
                                    </div>
                                    <h4 class="benefit__title">
                                        {!! $row['title'] !!}
                                    </h4>
                                </div>
                                <div class="benefit__content benefit__content--back">
                                    <div class="benefit__text">
                                        {!! $row['text'] !!}
                                    </div>
                                    @if($row['add_contact_us']['tf'])
                                        <div class="benefit__contact">
                                            <div class="benefit__contact-title">{{ $row['add_contact_us']['text'] }}</div>
                                            <a class="benefit__contact-link disable_preloader" href="{{ $row['add_contact_us']['url_link'] }}">
                                                {{ $row['add_contact_us']['text_link'] }}
                                            </a>
                                        </div>
                                    @endif
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

@stop
