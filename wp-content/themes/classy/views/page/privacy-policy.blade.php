@extends('layout.default')

@section('content')
    <div class="page-privacy-policy">
        <div class="page-privacy-policy__container">
            @if(!empty(get_field('title')))
                <h1 class="page-privacy-policy__heading">{{ get_field('title') }}</h1>
            @endif

            @if(!empty(get_field('opening')))
                <div class="page-privacy-policy__quick-summary">
                    {{ get_field('opening') }}
                </div>
            @endif
            <div class="page-privacy-policy__content">
                {!! $post->content() !!}
            </div>
        </div>
    </div>
@stop