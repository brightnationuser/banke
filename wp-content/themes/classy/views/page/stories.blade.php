{{-- Template Name: Stories Archive --}}

@extends('layout.default')

@section('content')
    <div class="container">

        <h1 class="h2 h2--mt-0">Stories</h1>

        <div class="news-list-wrapper">
            <div class="news-list">
                @foreach($news as $news_item)
                    <a href="{{ apply_filters('wpml_permalink', $news_item->permalink(), 'en') }}" class="news">
                        <div class="news__img">
                            <div class="img__inner b-lazy" data-src="{{ $news_item->getAcfImage()->src('large') }}">
                            </div>
                        </div>

                        <div class="news__content">
                            <div class="news__title">
                                {!! $news_item->title() !!}
                            </div>

                            @if(get_field('mini_description', $news_item->ID))
                                <p class="news__descr">{{get_field('mini_description', $news_item->ID)}}</p>
                            @endif
                        </div>
                    </a>
                @endforeach

                <div class="news m_fake"></div>
                <div class="news m_fake"></div>
                <div class="news m_fake"></div>
            </div>
        </div>

        {!! $pagination_layout !!}
    </div>
@stop
