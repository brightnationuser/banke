{{--Template name: Powertrains--}}

@extends('layout.default')

@section('content')

    @php
        $parent_id = wp_get_post_parent_id($post);
    @endphp
    <section class="breadcrumbs-section">
        <div class="breadcrumbs-section__container">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a class="breadcrumb breadcrumb--link" href="{{get_permalink($parent_id)}}">{{ get_the_title($parent_id) }}</a>
                </li>
                <li class="breadcrumbs__item">
                    <span class="breadcrumb">{{get_the_title($post)}}</span>
                </li>
            </ul>
        </div>
    </section>

    @if(!empty(get_field('acf_tabs', get_the_ID())))
        @include('partials.tabs', ['parent_id' => get_the_ID()])
    @endif

    @php
        $powertrains_intro = $post->getAcfByKey('powertrains_intro');
    @endphp
    <div class="p-powertrains">
        <section class="intro">
            <h1 class="animated fadeInDown h2" style="animation-delay: .7s">{{ $post->post_title }}</h1>

            <div class="container">
                <div class="intro__wrapper d-flex">
                    <div class=" intro__image animated fadeInLeft"
                         style="animation-delay: .5s">
                        <div class="tips-carousel owl-carousel owl-theme-banke">
                            @include('partials.tips-image', ['slider' => $powertrains_intro['slider']])
                        </div>
                    </div>
                    <div class="intro__content js-intro-content"
                         data-text-open="{{ strtolower(get_field('read_more', 'option')) }}"
                         data-text-close="{{ !empty(get_field('show_less')) ? get_field('show_less') : 'show less' }}">
                        <div class="intro__text animated fadeInUp" style="animation-delay: .5s">
                            <div>
                                {!! $powertrains_intro['text'] !!}
                            </div>
                            <div class="js-hide-able intro__text-hidden" style="display:none;">
                                {!! $powertrains_intro['hidden_text'] !!}
                            </div>
                        </div>
                        @if(!empty($powertrains_intro['hidden_text']))
                            <div class="intro__read-more read-more-btn animated fadeInUp" style="animation-delay: .8s">
                                {{ strtolower(get_field('read_more', 'option')) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        @include('partials.related-insights', $related_insights)

        @include('partials.video-gallery')

        @include ('template.product-page.specification')


        <section class="key-benefits">
            <div class="container">
                <h2>{{ !empty($post->getAcfByKey('benefits_title')) ? $post->getAcfByKey('benefits_title') : 'Key Benefits' }}</h2>
                @php
                    $benefits = $post->getAcfByKey('benefits')
                @endphp

                @if(!empty($benefits))
                    <div class="key-benefits__list d-flex">
                        @foreach($benefits as $row)
                            <div class="benefit js-benefit aos-animation"
                                 data-aos-delay="{!! 200 * ($loop->index + 1) !!}">
                                <div class="benefit__content">
                                    <div class="benefit__icon">
                                        <img src="{{ $row['icon']['url'] }}" alt="{!! wp_strip_all_tags($row['title'], true) !!}">
                                    </div>
                                    <h4 class="benefit__title">
                                        {!! $row['title'] !!}
                                    </h4>
                                </div>
                                <div class="benefit__content benefit__content--back">
                                    <div class="benefit__text benefit__text--{{ ICL_LANGUAGE_CODE }}">
                                        {!! $row['text'] !!}
                                    </div>
                                    @if($row['add_contact_us']['tf'])
                                        <div class="benefit__contact">
                                            <div class="benefit__contact-title">{{ $row['add_contact_us']['text'] }}</div>
                                            <a class="benefit__contact-link disable_preloader"
                                               href="{{ $row['add_contact_us']['url_link'] }}">
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

        @include('partials.new-contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('form_title'),
            'classes' => 'contact-us--light'
        ])
    </div>

    @php
        $youtube_popup = get_field('video_popup_group');
    @endphp

    @if(!empty($youtube_popup) && $youtube_popup['show'])
        @include('partials.popup-youtube', [
            'class' => 'js-powertrains-popup',
            'title' => $youtube_popup['title'],
            'image' => $youtube_popup['video_preview'] ? $youtube_popup['video_preview']['sizes']['large'] : '/wp-content/themes/classy/images/video-preview.jpg',
            'video_id' => $youtube_popup['video_id']
        ])
    @endif
@stop
