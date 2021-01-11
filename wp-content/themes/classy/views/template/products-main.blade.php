{{-- Template Name: Products Main --}}

@extends('layout.default')

@section('content')

    @if(!empty(get_field('acf_tabs', get_the_ID())))
        @include('partials.tabs', ['parent_id' => get_the_ID()])
    @endif

    <div class="home">
        <div class="content">
            <div class="products-page">
                <div class="what-we-do">
                    <div class="container">
                        <h1 class="h2">{{ $post->title() }}</h1>

                        @if(!empty($products = $post->getAcfByKey('acf_products')))
                            <div class="what-we-do__list d-flex">
                                @foreach($products as $item)
                                    <div class="what-we-do__item item">
                                        <div class="item__image">
                                            <a href="{{ $item['link'] }}">
                                                <img src="{!! $item['image']['url'] !!}" alt="{{ $item['title'] }}">
                                            </a>
                                        </div>
                                        <div class="item__content">
                                            <h3 class="item__title">{!! $item['title'] !!}</h3>
                                            <div class="item__text">{!! $item['text'] !!}</div>
                                            <a  href="{{ $item['link'] }}" class="item__read-more read-more">{!! $item['text_link'] !!}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.contact-us', [
        'form' => $post->getAcfByKey('contact_form'),
        'title' => $post->getAcfByKey('contact_title'),
        'classes' => '',
    ])

@stop
