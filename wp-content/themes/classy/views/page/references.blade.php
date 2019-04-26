@extends('layout.default')

@section('content')

    @include('partials.tabs', ['parent_id' => wp_get_post_parent_id(get_the_ID())])

    <div class="container">

        <div class="references owl-carousel">
            {{--@foreach ($post->getAcfByKey('acf_references') as $reference)--}}
            {{--<a class="references__card disable_preloader">--}}
            {{--<div class="card__image" style="background-image: url({{ $reference['image'] }});"></div>--}}
            {{--<div class="card__info">--}}
            {{--<div class="card__title">{{ $reference['title'] }}</div>--}}
            {{--<div class="card__text">{{ $reference['text'] }}</div>--}}
            {{--</div>--}}
            {{--</a>--}}
            {{--@endforeach--}}

            @foreach ($references as $reference)
                <a href="{{ $reference->permalink() }}" class="references__card disable_preloader">
                    <div class="card__image" style="background-image: url({{ $reference->getAcfImage()->src('large') }});"></div>
                    <div class="card__info">
                        <div class="card__title">{{ $reference->get_title() }}</div>
                        <div class="card__text">{!! $reference->getAcfByKey('acf_references_short_text') !!}</div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>


@stop
