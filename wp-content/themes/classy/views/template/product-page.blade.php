{{--Template name: Product Page--}}

@php
    $brochure = get_field('brochure');

    $brochure_data = [
        'image' => $brochure['image'],
        'title' => $brochure['title'],
        'text' => $brochure['text'],
        'file' => $brochure['file'],
        'button_text' => $brochure['button_text']
    ];

    /**
    * Сделано для свободного перемещения и включения/отключения блоков через админку.
    * Все доступные блоки высвечиваются тут. Так же должно быть ACF поле типа select или повторитель,
    * где в value будет путь к шаблону (blade синтаксис).
    */

    $sections_and_order = get_field('sections_and_order');

    $_render_array = [
        'template.product-page.concept' => [],
        'partials.related-insights' => $related_insights,
        'template.product-page.benefits' => [],
        'partials.video-gallery' => [],
        'template.product-page.present' => [],
        'template.product-page.products' => [$products_title, $products, $specifications_title],
        'partials.brochure' => $brochure_data,
        'template.product-page.references' => [],
        'template.product-page.specification' => [],
    ];

    $render_array = [];

    foreach ($sections_and_order as $item) {
        $render_array[$item['value']] = $_render_array[$item['value']];
    }
@endphp

@extends('layout.default')

@section('content')

    <div class="product-template">

        @if(!empty(get_field('acf_tabs', get_the_ID())))
            @include('partials.tabs', ['parent_id' => get_the_ID()])
        @endif

        @foreach($render_array as $path => $data)
            @include($path, $data)
        @endforeach

        @include('partials.new-contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('contact_title'),
            'classes' => 'contact-us--light'
        ])

    </div>

@stop
