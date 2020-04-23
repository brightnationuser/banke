@extends('layout.default')

@section('content')
    
    <div class="history">
        <div class="container">
            
            <div class="history__wrap">

                 <div class="history__content">
                     <h2 class="history__title animated fadeInDown">
                         About Banke
                     </h2>
                     <div class="history__text animated fadeInUp">
                         {!! $post->content() !!}
                     </div>
                 </div>

                <div class="history__sidebar sidebar animated fadeInRight">
                    <div class="sidebar__item sidebar__item--download">
                        <h3>Downloads</h3>
                        <a href="/wp-content/uploads/Årsrapport 2018 Banke ApS.PDF" class="disable_preloader" target="_blank" download>Annual report 2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="team">
        <div class="container">

            <h2>
                Our team
            </h2>

            <div class="team__members d-flex">
                @foreach($post->getAcfByKey('acf_team') as $member)

                    <div class="member aos-animation" data-aos="fade-up" data-aos-delay="{{ 200 * (1 + $loop->index) }}">
                        <div class="member__image" style="background-image: url('{{ $member['acf_team_image']['url'] }}')">
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
                                    <i class="icon-phone"></i> {{ $member['acf_team_phone'] }}
                                </div>
                            @endif

                            @if($member['acf_team_email'])
                                <div class="member__email">
                                    <i class="icon-email"></i> {{ $member['acf_team_email'] }}
                                </div>
                            @endif

                            <div class="member__text">
                                {{ $member['acf_team_text'] }}
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@stop
