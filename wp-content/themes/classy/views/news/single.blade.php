@extends('layout.default')

@section('content')
    <div class="article-layout {{ $two_columns_layout ? 'article-layout--two-columns': '' }}">
        <div class="container">
            <div class="article">
                <div class="article__content">

                    @php
                        $parent_id = get_page_by_path( 'news' );
                        $translated_parent_id = apply_filters( 'wpml_object_id', $parent_id->ID, 'page' );
                    @endphp
                    <ul class="breadcrumbs breadcrumbs--news">
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

                    <div class="article__heading">
                        <div class="news__date">
                            <i class="icon-calendar news__date-icon"></i>
                            {!! $post->getDate() !!}
                        </div>

                        <h1 class="news__title">
                            {!! $post->title() !!}
                        </h1>
                    </div>

                    <div class="news__content">
                        @if(!$two_columns_layout)
                            <a href="{{ $post->getAcfImage()->src('large') }}" data-fancybox
                               data-caption="{!! $post->title() !!}">
                                <img class="content__img" src="{{ $post->getAcfImage()->src('large') }}"
                                     alt="{!! $post->title() !!}">
                            </a>
                        @endif

                        <div class="content__text text__content">
                            {!! $post->content() !!}
                        </div>
                    </div>
                    
                    <div class="news__back">
                        <a class="news__back-link" href="{{ get_permalink($translated_parent_id) }}"><i class="icon-chevron-left news__back-icon"></i>{{ $back_button_text }}</a>
                    </div>
                </div>

                @if($two_columns_layout)
                    <img class="content__img" src="{{ $post->getAcfImage()->src('large', 'vertical') }}"
                         alt="{!! $post->title() !!}">
                @endif
            </div>
        </div>

        @include('partials.related-news', ['related' => $related])
        @include('partials.new-contact-us', [
    'form' => get_field('contact_form',"option"),
    'title' => get_field('contact_form_title',"option"),
    'classes' => 'contact-us--light contact-us--blue-bg'
])
    </div>
@stop

