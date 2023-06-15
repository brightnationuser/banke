@extends('layout.default')

@section('content')
	<div class="article-layout {{ $two_columns_layout ? 'article-layout--two-columns': '' }}">
		<div class="container">
			<div class="article">
				<div class="article__content">
					<div class="article__heading">
						<div class="news__date">
							{!! $post->getDate() !!}
						</div>

						<h1 class="news__title">
							{!! $post->title() !!}
						</h1>
					</div>

					<div class="news__content">
						@if(!$two_columns_layout)
							<a href="{{ $post->getAcfImage()->src('large') }}" data-fancybox data-caption="{!! $post->title() !!}">
								<img class="content__img" src="{{ $post->getAcfImage()->src('large') }}" alt="{!! $post->title() !!}">
							</a>
						@endif

						<div class="content__text text__content">
							{!! $post->content() !!}
						</div>
					</div>
				</div>

				@if($two_columns_layout)
					<img class="content__img" src="{{ $post->getAcfImage()->src('large', 'vertical') }}" alt="{!! $post->title() !!}">
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

