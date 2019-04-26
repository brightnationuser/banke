@extends('layout.default')

@section('content')
    <div class="container">
        {!! $post->content() !!}
    </div>
@stop
