{{-- Template Name: Service --}}

@extends('layout.default')

@section('content')

    <div class="service-page">
        <section class="service-intro">
            <div class="container">
                <div class="service-intro__wrap d-flex">
                    <div class="service-intro__content">
                        <h1>
                            {!! $post->getAcfByKey('title') !!}
                        </h1>
                        <div class="service-intro__text">
                            {!! $post->getAcfByKey('content') !!}
                        </div>
                        <a href="{!! $post->getAcfByKey('file')['file_arr']['url'] !!}" class="button button--primary disable_preloader" target="_blank" download>
                            {!! $post->getAcfByKey('file')['caption'] !!} <i class="icon-down-arrow"></i></a>
                    </div>
                    <div class="service-intro__image">
                        <img src="{!! $post->getAcfByKey('image')['url'] !!}" alt="{!! $post->getAcfByKey('title') !!}">
                    </div>
                </div>
            </div>
        </section>

        @include('partials.contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('form_title'),
            'classes' => 'contact-us--light contact-us--blue-bg'
        ])
    </div>

@stop