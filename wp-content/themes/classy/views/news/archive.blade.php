@extends('layout.default')

@section('content')
    <div class="container">

        <h1 class="h2 h2--mt-0">{!! get_field('news_title', 'options') !!}</h1>

        <div class="news-list">
            @foreach($news as $news_item)
                <a href="{{ $news_item->permalink() }}" class="news">
                    <div class="news__img">
                        <div class="img__inner b-lazy" data-src="{{ $news_item->getAcfImage()->src('large') }}">
                        </div>
                    </div>

                    <div class="news__content">
                        <div class="news__date">
                            {{ $news_item->getDate() }}
                        </div>

                        <div class="news__title">
                            {{ $news_item->title() }}
                        </div>
                    </div>
                </a>
            @endforeach

            <div class="news m_fake"></div>
            <div class="news m_fake"></div>
            <div class="news m_fake"></div>
        </div>

        {{ the_posts_pagination() }}
    </div>
@stop