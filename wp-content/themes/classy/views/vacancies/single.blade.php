@php
    $acf_group = get_field('vacancies_group');
    $acf_options = get_field('vacancies', 'options');

    $email = $acf_group['email'] ? $acf_group['email'] : $acf_options['email'];
    $phone = $acf_group['phone'] ? $acf_group['phone'] : $acf_options['phone_link'];
@endphp

@extends('layout.default')

@section('content')
    <input type="hidden" id="remove_btn_src" value="{{get_template_directory_uri()}}/images/icons/icon_close_blue.svg">

    <article class="vacancy vacancy-{{$page->ID}}">
        <div class="container">
            <h1 class="vacancy__title {{$acf_group['vacancy_closed'] ? 'closed' : ''}}">{{$page->post_title}}</h1>

            <div class="vacancy__top">
                @if($acf_group['vacancy_closed'])
                    <p class="box">Vacancy Closed</p>
                @endif

                @if($acf_group['vacancy_time'])
                    <p class="time {{$acf_group['vacancy_closed'] ? 'closed' : ''}}">{{$acf_group['vacancy_time']}}</p>
                @endif

                @if($acf_group['for_who'])
                    <p class="who {{$acf_group['vacancy_closed'] ? 'closed' : ''}}">{{$acf_group['for_who']}}</p>
                @endif

                <p class="date {{$acf_group['vacancy_closed'] ? 'closed' : ''}}">{{get_the_date('d.m.Y', $page->ID)}}</p>
            </div>

            @if(get_the_post_thumbnail())
                <div class="vacancy__img">
                    {!! get_the_post_thumbnail() !!}
                </div>
            @endif

            <div class="vacancy__content">{!! apply_filters('the_content', get_the_content()) !!}</div>

            <div class="vacancy__bottom">
                @if(!$acf_group['vacancy_closed'])
                    @if($acf_group['our_team_link'])
                        <a href="{{$acf_group['our_team_link']}}" class="vacancy__btn">Join Our Team</a>
                    @else
                        <a data-fancybox href="#our_team_form" class="vacancy__btn">Join Our Team</a>
                    @endif
                @endif

                <a href="mailto:{{$email}}" class="vacancy__link email {{$acf_group['vacancy_closed'] ? 'closed' : ''}}">{{$email}}</a>

                <a class="vacancy__link phone">{{$phone}}</a>
            </div>
        </div>
    </article>

    @if(!$acf_group['our_team_link'] && !$acf_group['vacancy_closed'])
        <div id="our_team_form" class="modal-team" style="display: none;">
{{--            {!! do_shortcode('[contact-form-7 id="2493" title="Join Our Team EN"]') !!}--}}
{{--            {!! do_shortcode('[contact-form-7 id="2487" title="Join Our Team EN"]') !!}--}}
            {!! do_shortcode('[contact-form-7 id="2572" title="Join Our Team EN"]') !!}

            <div class="modal-thank">
                <img width="55" src="{{get_template_directory_uri()}}/images/icons/icon_email_big.svg" alt="email sent">

                <h3 class="modal-thank__title">Your job application has been sent successfully</h3>

                <p class="modal-thank__descr">We will contact you soon</p>
            </div>
        </div>
    @endif
@stop