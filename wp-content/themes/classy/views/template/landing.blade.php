{{-- Template Name: Landing --}}

@extends('layout.empty')

@section('content')
    <div class="landing">
    <div class="first_screen" style="background-image: url({{ content_url('themes/classy/images/landing/landing_waves.jpg') }})">
        <div class="left" >

        </div>
        <div class="carousel">



                <div class="item"
                     style="background-image: url({{ content_url('themes/classy/images/landing/landing_main_image.jpg') }})">
                </div>


        </div>
        <div class="static_content">
            <div class="container">
                <div class="logo">
                    <img src="{{ content_url('themes/classy/images/logo.png') }}" alt="Banke logo">
                </div>
                <div class="subtitle"> Electrifying Heavy Vehicles</div>
                <div class="caption"> Say goodbye to inefficient and inflexible energy solutions and hello to the XXX, the smart choice for cost-effective and adaptable energy storage.
                </div>
            </div>
        </div>
    </div>
        @if(have_rows("numbers"))
        <div class="numbers">
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
                            <div class="container">
                                <div class="wrapper">
                                    <div class="text">
                                        <h2 class="title">{!! get_sub_field('title') !!}</h2>
                                        {!! get_sub_field('text') !!}
                                    </div>
                                    <div class="image">
                                        <img src="{{ get_sub_field('image')['url'] }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif(get_row_layout() == "image_text")
                        <div class="right">
                            <div class="container">
                                <div class="wrapper">
                                    <div class="image">
                                        <img src="{{ get_sub_field('image')['url'] }}"/>
                                    </div>
                                    <div class="text">
                                        <h2 class="title">{!! get_sub_field('title') !!}</h2>
                                        {!! get_sub_field('text') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif(get_row_layout() == "middle")
                        <div class="middle">
                            <div class="container">
                                <div class="wrapper">
                                    <div class="title">  {!! get_sub_field('title') !!}</div>
                                    <a href="{!! get_sub_field('button')['url'] !!}" class="button">  {!! get_sub_field('button')['title'] !!}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endwhile

            @endif
        </div>





        @include('partials.contact-us', [
        'form' => $post->getAcfByKey('contact_form'),
        'title' => $post->getAcfByKey('form_title'),
        'classes' => 'contact-us--light'
    ])
    </div>

@stop