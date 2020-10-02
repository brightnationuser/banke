@extends('layout.default')

@section('content')
	<div class="container">
		<div class="news__date">
			{{ $post->getDate() }}
		</div>

		<div class="news__title">
			{{ $post->title() }}
		</div>

		<div class="news__content">
			<img class="content__img" src="{{ $post->getAcfImage()->src('large') }}" alt="">

			<div class="content__text text__content">
				{!! $post->content() !!}
			</div>
		</div>

		<div class="b-news__carousel owl-carousel">
			@foreach($news_carousel as $news_item)
				<a href="{{ $news_item->permalink() }}" class="carousel__item">
					<div class="item__img" style="background-image: url('{{ $news_item->getAcfImage()->src('large') }}')">
					</div>

					<div class="item__content">
						<div class="item__date">
							{{ $news_item->getDate() }}
						</div>

						<div class="item__title">
							{!! strlen($news_item->title()) > 30 ? substr($news_item->title(), 0, 30) . '...' : $news_item->title() !!}
						</div>
					</div>
				</a>
			@endforeach
		</div>
	</div>
@stop

