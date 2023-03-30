{{-- Template Name: Case Studies Archive --}}

@extends('layout.default')

@php

    function max_title_length( $title ) {
        $max = 50;
        if( strlen( $title ) > $max ) {
            return substr( $title, 0, $max ). "&hellip;";
        } else {
            return $title;
        }
    }

@endphp

@section('content')
    <div class="container">

        <h1 class="main_title">{!! get_field('case_studies_title', 'options') !!}</h1>

        <p class="main_subtitle">{!! get_field('case_studies_subtitle', 'options') !!}</p>

        <div class="case-studies-list-wrapper">
            <div class="case-studies-list">

                @foreach($case_studies as $case_studies_item)

                    <a href="{{ apply_filters('wpml_permalink', $case_studies_item->permalink(), 'en') }}"
                       class="case_study">

                        <div class="left"></div>

                        <div class="image">
                            <div class="item"
                                 style="background-image: url({{ get_the_post_thumbnail_url($case_studies_item->ID,'medium_large') }})"></div>
                        </div>

                        <div class="static_content">
                            <div class="client"> Client: {{get_field('subtitle',$case_studies_item->ID)}}</div>
                            <div class="subtitle"> {!!  max_title_length($case_studies_item->title()) !!}</div>
                            <div class="tag"> {!!  get_the_title(get_field('product',$case_studies_item->ID)) !!} </div>
                        </div>

                    </a>
                @endforeach

            </div>
        </div>

        {!! $pagination_layout !!}

    </div>

@stop
