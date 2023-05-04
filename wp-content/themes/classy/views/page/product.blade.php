{{-- Template Name: Product --}}

@extends('layout.default')

@section('content')
    <div class="container">
        <h1>{{$post->post_title}}</h1>
        <div>{!! $post->content() !!}</div>

        {{-- Image --}}

        @if($image)
            <div class="position: relative;">
                {!! wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'lol')) !!}
                @if($features)
                    <ul>
                        @foreach($features as $feature)
                            <li style="position: absolute; left: {{ $feature['left'] }}px; top: {{ $feature['top'] }}px">
                                <div>+</div>
                                <div>{{ $feature['description'] }}</div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        @endif

        {{-- Specifications --}}

        @if($specifications)
            <div class="custom-tabs">
                <ul class="nav-tabs">
                    @foreach($specifications as $specification)
                        <li class="{{ $loop->first ? 'active' : null }}">
                            <a href="#tab-{{ $loop->index }}">{{ $specification['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($specifications as $specification)
                        <div id="tab-{{ $loop->index }}" class="tab-pane {{ $loop->first ? 'active' : null }}">
                            <h3>{{ $specification['title'] }}</h3>
                            <div>{!! $specification['description'] !!}</div>
                            <table>
                                @foreach($specification['characteristics'] as $characteristic)
                                    <tr>
                                        <td>{{ $characteristic['type'] }}</td>
                                        <td>{{ $characteristic['value'] }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
@stop
