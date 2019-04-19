@extends('layout.default')

@section('content')
    
    <div class="history">
        <div class="container">

            <h2>
                History
            </h2>
            
            <div class="history_img">
                <div class="img_container">
                    <img src="/wp-content/themes/classy/images/pages/about/history.jpg">
                </div>
            </div>

            <div class="history_text">
                {!! $post->content() !!}
            </div>

        </div>
    </div>

    <div class="team">
        <div class="container">
        
            <h2>
                Our team
            </h2>

            <div class="team__members owl-carousel">
                @foreach($post->getAcfByKey('acf_team') as $member)

                    <div class="member">
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