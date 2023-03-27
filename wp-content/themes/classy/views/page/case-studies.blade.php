{{-- Template Name: Case Studies Archive --}}

@extends('layout.default')

@section('content')
    <div class="container">

        <h1 class="h2 h2--mt-0">{!! get_field('news_title', 'options') !!}</h1>

        <div class="case-studies-list-wrapper">
            <div class="case-studies-list">
                @foreach($case_studies as $case_studies_item)
                    <a href="{{ apply_filters('wpml_permalink', $case_studies_item->permalink(), 'en') }}"
                       class="case_study">
                        <div class="left"></div>

                        <div class="image"
                        >
                            <div class="item"
                                 style="background-image: url({{ $case_studies_item->getAcfImage()->src('large') }})"></div>
                        </div>
                        <div class="static_content">

                            <div class="client"> Client: NERU</div>
                            <div class="subtitle"> {!! $case_studies_item->title() !!}</div>
                            <div class="tag"> E-PTO Systems
                            </div>

                        </div>
                    </a>
                @endforeach

            </div>
        </div>

        {!! $pagination_layout !!}
    </div>
@stop
