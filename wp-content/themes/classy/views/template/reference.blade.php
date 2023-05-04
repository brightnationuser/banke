{{-- Template Name: Reference --}}

@extends('layout.default')

@section('content')

    <div class="p-reference">

        <div class="container">
            <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumb">
                        <a href="{{ get_permalink( get_page_by_path( 'products/epto-systems' ) )  }}">E-PTO Systems</a>
                    </li>
                    <li class="breadcrumb">
                        <span>{!! $post->post_title !!}</span>
                    </li>
                </ul>
            </div>
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
