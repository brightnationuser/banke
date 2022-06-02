@extends('layout.default')

@section('content')
    <div class="container">
        <div class="article__heading">
            <h1 class="news__title">
                {!! $post->title() !!}
            </h1>
        </div>
        <div class="article">
            <div class="article__content">
                <div class="news__content">
                    <img class="content__img" src="{{ $post->getAcfImage()->src('large') }}" alt="{!! $post->title() !!}">

                    <div class="content__text text__content">
                        {!! $post->content() !!}
                    </div>
                </div>
            </div>
            <div class="article__sidebar is-desktop">
                <h3>Latest stories</h3>
                <div class="article__relateds">
                    @if(!empty($related))
                        @foreach($related as $news_item)
                            <div class="article__related">

                                <a href="{{ $news_item->permalink() }}" class="item">
                                    @if(get_field('acf_image', $news_item->ID))
                                        <div class="item__img" style="background-image: url('{{ wp_get_attachment_image_url(get_field('acf_image', $news_item->ID), 'large') }}')"></div>
                                    @endif

                                    <div class="item__title">{{$news_item->title()}}</div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        @if(!empty($slider))
            <div class="b-news__carousel owl-carousel">
                @foreach($slider as $key=>$slide)
                    <div class="carousel__item">
                        <img src="{{ $slide['image']['url'] }}" alt="{{ $post->title() . ' photo ' . ($key+1) }}">
                    </div>
                @endforeach
            </div>
        @endif

        <div class="article__sidebar is-mobile">
            <h3>Latest stories</h3>
            <div class="article__relateds">
                @if(!empty($related))
                    @foreach($related as $news_item)
                        <div class="article__related">

                            <a href="{{ $news_item->permalink() }}" class="item">
                                <div class="item__img" style="background-image: url('{{ $news_item->getAcfImage()->src('large') }}')"></div>

                                <div class="item__content">
                                    <div class="item__date">
                                        {{ $news_item->getDate() }}
                                    </div>

                                    <div class="item__title">
                                        {!! strlen($news_item->title()) > 150 ? substr($news_item->title(), 0, 150) . '...' : $news_item->title() !!}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@stop

