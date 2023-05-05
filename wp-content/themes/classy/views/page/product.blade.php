{{-- Template Name: Product --}}

@extends('layout.default')

@section('content')
    <div class="product-container">

        {{-- Content --}}

        <div class="product-content">
            @if($pre_title)
                <div class="product-content__pre-title">{{ $pre_title }}</div>
            @endif
            <h1 class="product-content__title">{{$post->post_title}}</h1>
            <div class="product-content__text">{!! $post->content() !!}</div>
        </div>

        {{-- Image --}}

        @if($image)
            <div class="product-illustration">
                {!! wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'product-illustration__image')) !!}
                @if($features)
                    <ul class="product-illustration__features">
                        @foreach($features as $feature)
                            <li class="product-illustration__feature product-illustration-feature"
                                style="left: {{ $feature['left'] }}px; top: {{ $feature['top'] }}px">
                                <div class="product-illustration-feature__point">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="product-illustration-feature__container">
                                    <div class="product-illustration-feature__text">
                                        {{ $feature['description'] }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        {{-- Specifications --}}

        @if($specifications)
            <div class="product-specifications custom-tabs">
                @if(sizeof($specifications) > 1)
                <ul class="product-specifications__nav-tabs nav-tabs">
                    @foreach($specifications as $specification)
                        <li class="product-specifications__nav-tabs-item">
                            <a class="product-specifications__nav-tabs-button  {{ $loop->first ? 'active' : null }}"
                               href="#tab-{{ $loop->index }}">{{ $specification['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                @endif
                <div class="product-specifications__tab-content tab-content">
                    @foreach($specifications as $specification)
                        <div id="tab-{{ $loop->index }}"
                             class="product-specifications__tab-pane tab-pane {{ $loop->first ? 'active' : null }}">
                            <div class="product-specifications__top">
                                @if($specification['title'])
                                    <div class="product-specifications__top-title-holder">
                                        <div class="product-specifications__title">{{ $specification['title'] }}</div>
                                    </div>
                                @endif
                                @if($specification['pdf_button_text'] && $specification['pdf'])
                                    <div class="product-specifications__top-button-holder">
                                        <a class="product-specification-button" href="{{$specification['pdf']['url']}}"
                                           target="_blank">
                                            <i class="icon-down-arrow"></i>
                                            <span>{{ $specification['pdf_button_text'] }}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            @if($specification['description'])
                                <div class="product-specifications__text">{!! $specification['description'] !!}</div>
                            @endif
                            @if($specification['characteristics'])
                                <div class="product-specifications-table-scroll-wrapper">
                                    <table class="product-specifications-table">
                                        @foreach($specification['characteristics'] as $characteristic)
                                            <tr>
                                                <td>{{ $characteristic['type'] }}</td>
                                                <td>{{ $characteristic['value'] }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                            @if($specification['pdf_button_text'] && $specification['pdf'])
                                <div class="product-specifications__bottom">
                                    <div class="product-specifications__bottom-button-holder">
                                        <a class="product-specification-button" target="_blank"
                                           href="{{$specification['pdf']['url']}}">
                                            <i class="icon-down-arrow"></i>
                                            <span>{{ $specification['pdf_button_text'] }}</span>
                                        </a></div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@stop
