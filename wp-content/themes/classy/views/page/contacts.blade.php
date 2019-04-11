@extends('layout.default')

@section('content')
  <div class="container">
    {!! $post->content() !!}
  </div>

  @include('partials.contact-us')
@stop