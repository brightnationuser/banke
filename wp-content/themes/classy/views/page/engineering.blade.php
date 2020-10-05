{{-- Template Name: Customized Solutions --}}
@extends('layout.default')

@section('content')

    <div class="engineering-page">

        @php
            $offers = $post->getAcfByKey('offers');
            $under_title = $post->getAcfByKey('offers_under_title');
        @endphp

        @if(!empty($offers))
        <section class="offers">
            <div class="container">

                <h2 class="offers__title">
                    {!! $post->getAcfByKey('offers_title') !!}
                </h2>

                @if(!empty($under_title))
                <p class="offers__under-title">
                    {!! $under_title !!}
                </p>
                @endif

                <div class="offers__list d-flex">
                    @foreach($offers as $row)
                        <div class="offer d-flex aos-animation" data-aos-delay="{{ 200 * (1 + $loop->index) }}">
                            <div class="offer__image">
                                <div class="offer__icon" style="top:{!! $row['icon']['top_px'] !!}px; right:{!! $row['icon']['right_px'] !!}px">
                                    <img src="{!! $row['icon']['image']['url'] !!}" alt="{!! $row['title'] !!} icon">
                                </div>
                                @if(!empty($row['image']['max_width']))
                                    <img style="max-width: {!! $row['image']['max_width'] !!}px"
                                         src="{!! $row['image']['image']['url'] !!}" alt="{!! $row['title'] !!} image">
                                @else
                                    <img src="{!! $row['image']['image']['url'] !!}" alt="{!! $row['title'] !!} image">
                                @endif
                            </div>

                            <div class="offer__content">
                                <h3 class="offer__title">{!! $row['title'] !!}</h3>
                                <ul class="offer__points">
                                    @foreach($row['points'] as $point)
                                        <li>{!! $point['point'] !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="offers__description aos-animation" data-aos-delay="200">
                    {!! $post->getAcfByKey('offers_description') !!}
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

        @php
            $benefits = $post->getAcfByKey('benefits');
        @endphp

        @if(!empty($benefits))
        <section class="benefits">
            <div class="container">
                <h2>{!! $post->getAcfByKey('benefits_title'); !!}</h2>

                <div class="benefits__list">
                    @foreach($benefits as $row)
                        <div class="benefit aos-animation" data-aos="fade-in">
                            <div class="benefit__image">
                                <img src="{!! $row['icon']['url'] !!}" alt="{!! $row['title'] !!}">
                            </div>
                            <div class="benefit__title">
                                {!! $row['title'] !!}
                            </div>
                            <div class="benefit__text">
                                {!! $row['text'] !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @include('partials.contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('contact_title'),
            'classes' => 'contact-us--light'
        ])

    </div>

@stop
