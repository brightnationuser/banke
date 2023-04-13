{{-- Template Name: Service --}}

@extends('layout.default')

@section('content')

    <div class="service-page">
        <section class="service-intro">
            <div class="container">
                <div class="service-intro__wrap">
                    <div class="service-intro__content">
                        <h1>
                            {!! $post->getAcfByKey('title') !!}
                        </h1>
                        <div class="service-intro__image">
                            <img src="{!! $post->getAcfByKey('image')['url'] !!}" alt="{!! $post->getAcfByKey('title') !!}">
                        </div>
                        <div class="service-intro__text">
                            {!! $post->getAcfByKey('content') !!}
                        </div>
                        <a class="case__download" href="{!! $post->getAcfByKey('file')['file_arr']['url'] !!}">
                            <i class="icon-down-arrow"></i> <span>{!! $post->getAcfByKey('file')['caption'] !!}</span> </a>

                    </div>

                </div>
            </div>
        </section>

        @include('partials.new-contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('form_title'),
            'classes' => 'contact-us--light contact-us--blue-bg'
        ])
    </div>

@stop