@extends('layout.default')

@section('content')

    @include('partials.tabs', ['parent_id' => get_the_ID()])
    
@stop
