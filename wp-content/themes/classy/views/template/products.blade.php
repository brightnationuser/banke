{{-- Template Name: Products --}}

@extends('layout.default')

@section('content')

    @if(!empty(get_field('acf_tabs', wp_get_post_parent_id(get_the_ID()))))
        @include('partials.tabs', ['parent_id' => wp_get_post_parent_id(get_the_ID())])
    @endif

    <div class="container">
        <div class="products">
            @foreach ($post->getAcfByKey('acf_products') as $product)
                <div class="product__card">
                    <div class="card__image-w">
                        <div class="card__image" style="background-image: url({{ $product['image'] }});"></div>
                    </div>
                    <div class="card__info">
                        <div class="card__title">{{ $product['title'] }}</div>
                        <div class="card__text">{{ $product['text'] }}</div>
                        <div class="card__links">
                            @foreach ($product['links'] as $link)
                                <a href="{{ $link['link_url'] }}" class="links__link">{{ $link['link_text'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
