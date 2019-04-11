@extends('layout.default')

@section('content')
	<h1>post 111111111</h1>
	<h1>{{ $page_title }}</h1>

	@if (isset($posts))
		@forelse ($posts as $post)
			@include ('post.preview')
		@empty
			<p>No posts</p>
		@endforelse
	@endif

	@include ('layout.pagination')
	
@stop