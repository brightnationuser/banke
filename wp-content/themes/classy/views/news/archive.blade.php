@extends('layout.default')

@section('content')
    <div class="container">
        <div class="news-list">
            @foreach($news as $news_item)
                <a href="{{ $news_item->permalink() }}" class="news">
                    <div class="news__img">
                        <div class="img__inner"
                             style="background-image: url('{{ $news_item->getAcfImage()->src('large') }}')">
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
        </div>

        {{ the_posts_pagination() }}
    </div>
@stop