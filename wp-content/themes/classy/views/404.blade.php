@extends('layout.default')

@section('content')
    <div class="container">
        <h1>{!! get_field('status_404', 'options') !!}</h1>
        <h4>{!! get_field('status_404_text', 'options') !!}</h4>
	</div>
@stop