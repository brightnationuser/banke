@extends('layout.default')

@section('content')
    <div class="page-projects">
        <section class="projects-intro">
            <div class="container">
                <h1 class="projects-intro__title h2">{!! $post->getAcfByKey('projects_title'); !!}</h1>
                <div class="projects-intro__undertitle">
                    {!! $post->getAcfByKey('projects_under_title'); !!}
                </div>

                @if(!empty($post->getAcfByKey('projects')))
                    <div class="projects-intro__list">
                        @foreach($post->getAcfByKey('projects') as $row)
                            <div class="project">
                                <h3 class="project__title">
                                    {!! $row['title']; !!}
                                </h3>
                                <div class="project__text">
                                    {!! $row['text']; !!}
                                </div>
                                <a href="{{ $row['link'] }}" target="_blank" class="read-more project__read-more disable_preloader">
                                    {{ get_field('read_mode', 'option') }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <section class="partners">
            <div class="container">
                <h2 class="partners__title">{!! $post->getAcfByKey('partners_title') !!}</h2>

                @if(!empty($post->getAcfByKey('partners')))
                    <div class="partners__list d-flex" data-aos="fade-in">
                        @foreach($post->getAcfByKey('partners') as $row)
                            <a class="partner__link disable_preloader" href="{{ $row['link'] }}" target="_blank">
                                <div class="partner">
                                    <div class="partner__logo">
                                        <img src="{!! $row['image']['url']; !!}" alt="{!! $row['image']['alt']; !!}">
                                    </div>
                                    <div class="partner__text">
                                        {!! $row['text']; !!}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </div>
@stop