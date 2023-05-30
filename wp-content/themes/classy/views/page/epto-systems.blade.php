@extends('layout.default')

@section('content')

    <div class="epto-page product-template">

        @if(!empty(get_field('acf_tabs', get_the_ID())))
            @include('partials.tabs', ['parent_id' => get_the_ID()])
        @endif

        <section class="concept">
            <div class="container">

                <h1 class="concept__title h2">
                    {{ $post->getAcfByKey('acf_title_concept') }}
                </h1>

                <div class="concept__description d-flex">

                    @php
                        $slider = $post->getAcfByKey('slider');
                    @endphp

                    @if(!empty($slider))
                        <div class="concept__image animated fadeInLeft">
                            <div class="epto-systems-carousel owl-carousel owl-theme-banke">
                                @foreach($slider as $slide)
                                    <img src="{!! $slide['image']['url'] !!}"
                                         alt="{!! $slide['image']['alt'] !!}">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="concept__content">
                        <article class="content-text m_1 animated fadeInDown">
                            <div class="text-column">
                                {!! $post->getAcfByKey('acf_concept_description') !!}
                            </div>
                        </article>
                    </div>
                </div>
                @if($specifications_button)
                    <div class="concept__specifications">
                        <a class="concept__specifications-button"
                           href="{{$specifications_button['url']}}">{{$specifications_button['title']}}</a>
                    </div>
                @endif
            </div>
        </section>

        @include('partials.related-insights', $related_insights)

        <section class="present">
            <div class="container">
                <h2 class="present__title">
                    {{ $post->getAcfByKey('acf_title_main') }}
                </h2>

                <div class="present__slider-outer thin-nav">
                    @include('partials.slider.epto-slider', ['nav' => 'thin'])
                </div>
            </div>
        </section>

        @if($products)
            <section id="specifications" class="products-list-section">
                <div class="container">
                    <div class="products-list">
                        @foreach($products as $product)
                            <div class="products-list__item">
                                <div class="product-list-card">
                                    <div class="product-list-card__content">
                                        {!! wp_get_attachment_image(get_post_thumbnail_id($product), 'full', false, array('class' => 'product-list-card__image')) !!}
                                        <div class="product-list-card__title">{{$product->post_title}}</div>
                                        <div class="product-list-card__description">{{ get_field('short_description', $product->ID) }}</div>
                                        @php
                                            $specifications = $product->getAcfByKey('product_specifications');
                                        @endphp

                                        @if(!empty($specifications))
                                            @if($specifications_title)
                                                <div class="product-list-card__specifications-title">{{$specifications_title}}</div>
                                            @endif
                                            <div class="product-list-card__specifications">
                                                @foreach($specifications as $key => $specification)
                                                    <a class="product-list-card__specification-link"
                                                       href="{{ get_permalink($product->ID) }}{{ (count($specifications) > 1 && $key > 0) ? '?tab=' . $key : '' }}">{{$specification['name']}}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @php
            $principles = $post->getAcfByKey('acf_benefits');
        @endphp

        @if(!empty($principles))
            <div class="principles animated fadeInUp">
                <div class="container">
                    <div class="principles__list">
                        @foreach($principles as $key => $item)
                            <div class="principles__item">
                                <div class="principles__image-wrap">
                                    <img class="principles__image {{ pathinfo(basename($item['image']['url']), PATHINFO_FILENAME) }}"
                                         src="{!! $item['image']['url'] !!}" alt="{{ strip_tags($item['title']) }}">
                                </div>
                                <div class="principles__title">
                                    {!! $item['title'] !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @include('partials.video-gallery')


        @php($brochure = get_field('brochure'))
        @include('partials.brochure', [
            'image' => $brochure['image'],
            'title' => $brochure['title'],
            'text' => $brochure['text'],
            'file' => $brochure['file'],
            'button_text' => $brochure['button_text']
        ])

        <section class="references-sect">
            @if(!empty(get_field('references_title')))
                <h2>
                    {{ get_field('references_title') }}
                </h2>
                @if(!empty(get_field('references_about')))
                    <p>{{ get_field('references_about') }}</p>
                @endif
            @endif
            <div class="container thin-nav">
                <div class="references owl-carousel">

                    @foreach ($references as $reference)
                        <a href="{{ $reference->permalink() }}" class="references__card disable_preloader aos-animation"
                           data-aos="fade-in">
                            <div class="card__image"
                                 style="background-image: url({{ $reference->getAcfImage()->src('large') }});"></div>
                            <div class="card__info">
                                <div class="card__title">{{ $reference->get_title() }}</div>
                                <div class="card__text">{!! $reference->getAcfByKey('acf_references_short_text') !!}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        @include('partials.new-contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('contact_title'),
            'classes' => 'contact-us--light'
        ])
    </div>

@stop
