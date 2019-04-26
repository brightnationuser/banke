{{-- Template Name: Reference --}}

@extends('layout.default')

@section('content')

    <div class="p-reference">
        <div class="container">
            <div class="reference__image">
                <img src="{{ $post->getAcfImage()->src('large') }}">
            </div>

            <div class="reference__content">
                <div class="reference__title">
                    {{ $post->get_title() }}
                </div>

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
