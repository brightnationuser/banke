@extends('layout.default')

@section('content')

    @if ($page)

        {{--<img src="{{ $page->getAcfImage()->src('medium') }}">--}}

        @if($page->getAcfByKey('acf_hide_header_image') || $page->getAcfImage()->ID == 0)
            <h1>{!! $page->title() !!}</h1>
        @else
            @include('partials.banner', [
               'image_src' => $page->getAcfImage()->src('full'),
               'title' => $page->title(),
               'author' => get_userdata($page->post_author),
               'post_date' => $page->getAcfByKey('acf_date'),
               'extra_tip' => $page->getAcfByKey('acf_banner_extra_tip')
            ])
        @endif

        @include('partials.tags', ['post' => $page])

        <article class="resource">

            <div class="resource__text wp-content">
                {!! $page->content() !!}
            </div>

            <div class="resource__action">

                @include('partials.buttons', ['post' => $page])

                @include('partials.partners', ['page' => $page])

                @include('partials.a2a')

            </div>

        </article>

        {{--<div class="featured m_events">--}}
        {{--<h2 class="featured__title">Public Spend Forum Recommends</h2>--}}
        {{--<div class="featured__carousel owl-carousel">--}}
        {{--@each('partials.post-card', $posts, 'post')--}}
        {{--</div>--}}
        {{--</div>--}}

        @include('partials.comments', ['page' => $page])

    @endif

@stop