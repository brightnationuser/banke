@extends('layout.default')

@section('content')

    <div class="search-results">

        <div class="results__title">
            <h3>Search results</h3>
        </div>

        <div class="results-items-w">
            @forelse($posts as $post)
                <div class="result__item">
                    <div class="item__link">
                        <a href="{{ $post->permalink() }}">{!! $post->title() !!}</a>
                    </div>
                    <div class="item__preview">
                        {!! $post->get_preview(40, false, '', true) !!}
                    </div>
                </div>
            @empty
                <div style="margin-top: 30px;">not found</div>
            @endforelse
        </div>

        {{ the_posts_pagination() }}

    </div>

@stop