{{-- Template Name: Reference --}}

@extends('layout.default')

@section('content')

    <div class="p-reference">

        <div class="container">

            @php
                $parent_id = get_page_by_path( 'references' );
                $translated_parent_id = apply_filters( 'wpml_object_id', $parent_id->ID, 'page' );
            @endphp
            <ul class="breadcrumbs breadcrumbs--references">
                <li class="breadcrumbs__item">
                    <a class="breadcrumb breadcrumb--link"
                       href="{{ get_permalink($translated_parent_id) }}">{!! get_the_title($translated_parent_id) !!}</a>
                </li>
                <li class="breadcrumbs__item">
                    <span class="breadcrumb">
                        {!! get_the_title($post) !!}
                    </span>
                </li>
            </ul>
        </div>

        <div class="container">
            <div class="reference__image">
                <img src="{{ $post->getAcfImage()->src('large') }}" alt="{{ $post->post_title }}">
            </div>

            <div class="reference__content">
                <h1 class="reference__title">
                    {{ $post->get_title() }}
                </h1>

                <div class="reference__text">
                    {!! $post->content() !!}
                </div>

                <div class="reference__selected_text">
                    {!! $post->getAcfByKey('acf_selected_text') !!}
                </div>
            </div>
        </div>
    </div>

@stop
