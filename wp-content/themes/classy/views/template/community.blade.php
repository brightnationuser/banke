{{-- Template Name: Community --}}

@extends('layout.default')

@section('content')

    <div class="p-community-home">

        @include('community.header')


        @if (isset($posts))

            <div class="cards">
                @each('discussion.partials.discussion-card', $posts, 'post')
            </div>

        @else

            <div>No discussions or posts yet</div>

        @endif

        {{ the_posts_pagination() }}

    </div>

@stop
