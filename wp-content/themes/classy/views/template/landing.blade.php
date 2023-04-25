{{-- Template Name: Landing --}}

@extends('layout.empty')

@section('content')
    <div class="landing">
        <div class="first_screen"
             style="background-image: url({{ content_url('themes/classy/images/landing/landing_waves.webp') }})">
            <div class="left">

            </div>
            <div class="carousel">
                <div class="item"
                     title="BES-86 is system that enable energy to be stored and then released when customers need power most"
                     style="background-image: url({{ content_url('themes/classy/images/landing/landing_main_image.webp') }})">
                </div>
            </div>
            <div class="static_content">
                <div class="container">
                    <div class="logo">
                        <img src="{{ content_url('themes/classy/images/landing/logo.svg') }}" alt="Banke logo">
                    </div>
                    <div class="subtitle"> {!! get_field('first_screen_title') !!}</div>
                    <h1 class="caption"> {!! get_field('first_screen_caption') !!}</h1>
                    <a href="{{  get_field('first_screen_link')['url'] }}" target="_blank"> <i class="icon-down-arrow"></i> <span>Download PDF</span></a>
                </div>
            </div>
        </div>

        @if(have_rows("numbers"))

            <div class="numbers js-numbers">
                <div class="container">
                    <div class="wrapper">
                        @foreach(get_field('numbers') as $row)

                            <div class="item">
                                <div class="number" data-number="{{$row['number']}}">0</div>
                                <div class="text">{!!$row['text']!!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        @endif

        <div class="sections">
            @if(have_rows("sections"))

                @while(have_rows("sections"))
                    @php
                        the_row();
                    @endphp

                    @if(get_row_layout() == "text_image")

                        <div class="left">
                            <div class="outer_container">
                                <div class="container">
                                    <div class="wrapper">
                                        <div class="text">
                                            <h2 class="title">{!! get_sub_field('title') !!}</h2>
                                            {!! get_sub_field('text') !!}
                                        </div>
                                        <div class="image"
                                             title="{{ get_sub_field('image')['title'] }}"
                                             style="background-image: url({{ get_sub_field('image')['url'] }})">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif(get_row_layout() == "image_text")

                        <div class="right">
                            <div class="outer_container">
                                <div class="container">
                                    <div class="wrapper">
                                        <div class="image"
                                             title="{{ get_sub_field('image')['title'] }}"
                                             style="background-image: url({{ get_sub_field('image')['url'] }})">

                                        </div>
                                        <div class="text">
                                            <h2 class="title">{!! get_sub_field('title') !!}</h2>
                                            {!! get_sub_field('text') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif(get_row_layout() == "middle")

                        <div class="middle">
                            <div class="container">
                                <div class="wrapper">
                                    <div class="title">{!! get_sub_field('title') !!}</div>
                                    <div class="subtitle">{!! get_sub_field('subtitle') !!}</div>

                                    @if(!empty(get_sub_field('button')))
                                        <a href="{!! get_sub_field('button')['url'] !!}"
                                           class="button">  {!! get_sub_field('button')['title'] !!}</a>
                                    @endif

                                </div>
                            </div>
                        </div>

                    @endif
                @endwhile
            @endif

        </div>
        <div id="contacts">
        @include('partials.new-contact-us', [
            'form' => $post->getAcfByKey('contact_form'),
            'title' => $post->getAcfByKey('form_title'),
            'classes' => 'contact-us--light'
        ])
        </div>
    </div>

@stop