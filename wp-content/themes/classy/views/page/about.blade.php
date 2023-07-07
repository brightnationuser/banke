@extends('layout.default')

@section('content')

    <div class="history">
        <div class="container">

            <div class="history__wrap">

                <div class="history__content">
                    @if(!empty(get_field('about_title')))
                        <h1 class="history__title animated fadeInDown h2">
                            {{ get_field('about_title') }}
                        </h1>
                    @endif
                    <div class="history__text animated fadeInUp">
                        {!! $post->content() !!}
                    </div>
                </div>

                <div class="history__sidebar sidebar animated fadeInRight">
                    <div class="sidebar__item sidebar__item--download">
                        <img src="/wp-content/themes/classy/images/about_us.jpg" alt="{{ get_bloginfo( 'name' ) }}">
                        <div class="info">
                            @if(!empty(get_field('downloads_title')))
                                <h3>{{ get_field('downloads_title') }}</h3>
                            @endif

                            <div class="wrapper">
                                @foreach(get_field('downloads') as $download)
                                    <div>
                                        <a href="{!! $download['link'] !!}" class="disable_preloader" target="_blank"
                                           download>{!! $download['text'] !!}</a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="team">
        <div class="container">
            @if(!empty(get_field('our_team_title')))
                <h2>
                    {{ get_field('our_team_title') }}
                </h2>
            @endif

            <div class="team__members d-flex">
                @foreach($post->getAcfByKey('acf_team') as $member)

                    <div class="member aos-animation" data-aos="fade-up"
                         data-aos-delay="{{ 200 * (1 + $loop->index) }}">
                        <div class="member__image"
                             style="background-image: url('{{ $member['acf_team_image']['url'] }}')">
                        </div>

                        <div class="member__content">
                            <div class="member__name">
                                {{ $member['acf_team_name'] }}
                            </div>

                            <div class="member__post">
                                {{ $member['acf_team_post'] }}
                            </div>

                            @if($member['acf_team_phone'])
                                <div class="member__phone">
                                    <i class="icon-phone"></i>
                                    <a href="tel:{{ str_replace(' ', '', $member['acf_team_phone']) }}">{{ $member['acf_team_phone'] }}</a>
                                </div>
                            @endif

                            @if($member['acf_team_email'])
                                <div class="member__email">
                                    <i class="icon-email"></i>
                                    <a href="mailto:{{ $member['acf_team_email'] }}">{{ $member['acf_team_email'] }}</a>
                                </div>
                            @endif

                            @if($member['acf_team_text'])
                                <div class="member__text">
                                    {{ $member['acf_team_text'] }}
                                </div>
                            @endif
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    @include('partials.new-contact-us', [
    'form' => get_field('contact_form',"option"),
    'title' => get_field('contact_form_title',"option"),
    'classes' => 'contact-us--light contact-us--blue-bg'
])

@stop
