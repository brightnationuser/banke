{{-- Template Name: Vacancies --}}

@extends('layout.default')

@section('content')
    <section class="vacancies">
        <div class="container">
            <h2 class="vacancies__title">{{get_the_title()}}</h2>

            @if(get_the_content())
                <div class="vacancies__content">{!! apply_filters('the_content', get_the_content()) !!}</div>
            @endif

            <div class="vacancies__row">
                @each('partials.vacancy', $posts, 'post')
            </div>

            {!! $pagination_layout !!}
        </div>
    </section>
@stop