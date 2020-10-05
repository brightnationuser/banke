@extends('layout.default')

@section('content')

    <div class="epto-page">

        @if(!empty(get_field('acf_tabs', get_the_ID())))
            @include('partials.tabs', ['parent_id' => get_the_ID()])
        @endif

        <section class="concept">
            <div class="container">
                <h2 class="concept__title">
                    {{ $post->getAcfByKey('acf_title_concept') }}
                </h2>
                <div class="concept__description d-flex">

                    <div class="concept__image animated fadeInLeft">
                        <img src="{!! $post->getAcfByKey('acf_image_concept')['url'] !!}" alt="{!! $post->getAcfByKey('acf_title_concept') !!}">
                    </div>

                    <div class="concept__content">
                        <article class="content-text m_1 animated fadeInDown">
                            <div class="text-column">
                                {!! $post->getAcfByKey('acf_concept_description') !!}
                            </div>
                        </article>
                        {{--<div class="concept__benefits d-flex animated fadeInUp">
                            @foreach($post->getAcfByKey('acf_benefits') as $key => $item)
                                <div class="concept-benefit d-flex">
                                    <div class="concept-benefit__image-wrap">
                                        <div class="concept-benefit__image">
                                            <img src="{!! $item['image']['url'] !!}" alt="{{ $item['title'] }}">
                                        </div>
                                    </div>
                                    <div class="concept-benefit__title">
                                        {!! $item['title'] !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>--}}
                    </div>
                </div>
            </div>
        </section>

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
                                    <img class="principles__image" src="{!! $item['image']['url'] !!}" alt="{{ strip_tags($item['title']) }}">
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

        <section class="products">
            <div class="container">
                <div class="products__list d-flex">
                    @foreach ($post->getAcfByKey('acf_products') as $product)
                        <div class="product-card aos-animation" data-aos-delay="{{ 200 * (1 + $loop->index) }}">
                            <div class="product-card__image">
                                <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}">
                            </div>
                            <div class="product-card__content">
                                <div class="product-card__title">{{ $product['title'] }}</div>
                                <div class="product-card__text js-trim-text"
                                     data-text-length="{{ empty($product['trim']) ? '147' : $product['trim'] }}"
                                     data-text-open="read more"
                                     data-text-close="less"
                                >
                                    <span class="js-text">
                                        {{ $product['text'] }}
                                    </span>

                                    <div class="read-more-wrap">
                                        <div class="read-more-btn">
                                            read more
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="product-card__links d-flex">
                                @foreach ($product['links'] as $link)
                                    <li class="product-card__link d-flex">
                                        <div class="icon">
                                            <img src="/wp-content/themes/classy/images/pages/epto-systems/pdf.svg" alt="icon">
                                        </div>
                                        <a href="{{ $link['link_url'] }}" class="link disable_preloader" download>{{ $link['link_text'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="references-sect">

            <h2>References</h2>
            <p>Currently more than 400 vehicles in operation all over Europe</p>

            <div class="container thin-nav">
                <div class="references owl-carousel">

                    @foreach ($references as $reference)
                        <a href="{{ $reference->permalink() }}" class="references__card disable_preloader aos-animation" data-aos="fade-in">
                            <div class="card__image" style="background-image: url({{ $reference->getAcfImage()->src('large') }});"></div>
                            <div class="card__info">
                                <div class="card__title">{{ $reference->get_title() }}</div>
                                <div class="card__text">{!! $reference->getAcfByKey('acf_references_short_text') !!}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        @include('partials.contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('contact_title'),
            'classes' => 'contact-us--light'
        ])

    </div>

@stop
