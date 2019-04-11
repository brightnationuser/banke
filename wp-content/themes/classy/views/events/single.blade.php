@extends('layout.default')

@section('content')

    @if ($post)

        @if($post->getAcfByKey('acf_hide_header_image'))
            <h1>{!! $post->title() !!}</h1>
        @else
            @include('partials.banner', [
                 'image_src' => $post->getAcfImage()->src('large'),
                 'type' => $post->getAcfByKey('acf_event_type'),
                 'title' => $post->title(),
                 'datetime' => [
                   'date' => $post->getDate(),
                   'time' => $post->getTime(),
                   'timezone' => $post->getTimeZone(),
                   'custom_time' => $post->getAcfByKey('acf_event_time'),
                 ],
                 'extra_tip' => $post->getAcfByKey('acf_banner_extra_tip')
               ])
        @endif

        @include('partials.tags', ['post' => $post])

        <article class="resource">

            <div class="resource__text wp-content">

                @if($post->getAcfByKey('acf_event_address'))
                    <div class="text__address">
                        <div class="icon-location"></div>
                        <span>{{ $post->getAcfByKey('acf_event_address') }}</span>
                    </div>
                @endif

                @if($post->getAcfByKey('acf_event_speakers') || $post->getAcfByKey('acf_custom_event_speakers'))
                    <h2>Speakers</h2>
                @endif

                @if($post->getAcfByKey('acf_event_speakers') || $post->getAcfByKey('acf_custom_event_speakers'))
                    <div class="event-users">

                        @if($post->getAcfByKey('acf_custom_event_speakers'))
                            @foreach($post->getAcfByKey('acf_custom_event_speakers') as $speaker)

                                @php
                                    $avatar = $speaker['acf_event_speaker_avatar'];
                                    $name = $speaker['acf_event_speaker_full_name'];
                                    $role = $speaker['acf_event_speaker_role'];
                                    $desc = $speaker['acf_event_speaker_bio'];
                                    $role_length = strlen($role);
                                    $desc_length = strlen($desc);
                                @endphp

                                @include ('events.partials.user', [
                                    'avatar' => $avatar,
                                    'name' => $name,
                                    'role' => $role,
                                    'role_length' => $role_length,
                                    'desc' => $desc,
                                    'desc_length' => $desc_length
                                ])

                            @endforeach
                        @endif

                        @if($post->getAcfByKey('acf_event_speakers'))
                            @foreach($post->getAcfByKey('acf_event_speakers') as $user)

                                @php
                                    $avatar = get_wp_user_avatar_src($user->ID);
                                    $name = $user->display_name;
                                    $role = get_field('acf_user_position', 'user_'.$user->ID);
                                    $role_length = strlen($role);
                                    if(isset(get_user_meta( $user->ID )['description'][0])) {
                                        $desc = get_user_meta( $user->ID )['description'][0];
                                        $desc_length = strlen($desc);
                                    }
                                @endphp

                                @include ('events.partials.user', [
                                    'avatar' => $avatar,
                                    'name' => $name,
                                    'role' => $role,
                                    'role_length' => $role_length,
                                    'desc' => $desc,
                                    'desc_length' => $desc_length
                                ])
                            @endforeach
                        @endif

                        <div class="user m_fake"></div>
                        <div class="user m_fake"></div>
                        <div class="user m_fake"></div>
                    </div>
                @endif

                @if ($post->getAcfByKey('acf_agendas'))
                    <div class="resource__agenda">
                        <h2>Agenda</h2>
                        @foreach ($post->getAcfByKey('acf_agendas') as $agenda)
                            <div class="agenda">
                                <div class="agenda__header">
                                    {{ $agenda['acf_agenda_date'] }}
                                </div>
                                <div class="agenda__content">
                                    @foreach ($agenda['acf_agenda_rows'] as $row)
                                        <div class="content__row">
                                            <div class="row__time">{{ $row['acf_agenda_row_time'] }}</div>
                                            <div class="row__title">{{ $row['acf_agenda_row_title'] }}</div>
                                            <div class="row__description">{{ $row['acf_agenda_row_description'] }}</div>
                                            <div class="row__room {{ empty($row['acf_agenda_row_room']) ? 'm_hidden' : '' }}">{{ $row['acf_agenda_row_room'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="event-description">
                    @php
                        $event_description = \Helpers\General::getContentWithAcf($post);
                    @endphp
                    {!! $event_description !!}
                </div>
            </div>

            <div class="resource__action">

                @if ($post->isUpcoming())

                    @include('partials.buttons', ['post' => $post])

                    <div class="action__links">
                        @if ($post->getAcfByKey('acf_event_speakers') || $post->getAcfByKey('acf_custom_event_speakers'))
                            <a href="#" class="links__item" data-id="event-users">Speakers</a>
                        @endif
                        @if ($post->getAcfByKey('acf_agendas'))
                            <a href="#" class="links__item" data-id="resource__agenda">Agenda</a>
                        @endif
                        @if ($event_description)
                            <a href="#" class="links__item" data-id="event-description">Description</a>
                        @endif
                        @if ($post->getAcfByKey('acf_sponsors'))
                            <a href="#" class="links__item" data-id="sponsors">Sponsors</a>
                        @endif
                    </div>
                @endif

                @include('partials.partners', ['page' => $post])

                @include('partials.a2a')

            </div>

        </article>

        @if($post->getAcfByKey('acf_sponsors'))
            <div class="sponsors">
                <h2>Brought to you by these sponsors</h2>
                <div class="sponsors__items">
                    @foreach($post->getAcfByKey('acf_sponsors') as $sponsor)
                        <a class="sponsors__sponsor" href="{{ $sponsor['acf_sponsor_link'] }}">
                            <img src="{{ wp_get_attachment_image_src($sponsor['acf_sponsor_img'], 'medium')[0] }}">
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($post->isUpcoming())
            <div class="event-join">

                <div class="event-join__action">

                    @if ($post->getAcfByKey('acf_show_action_buttons'))
                        @foreach($post->getAcfByKey('acf_action_buttons') as $key => $button)
                            @if ($key == 0)
                                <div class="button_container">
                                    @include ('partials.button', [
                                        'link' => empty($button['acf_action_button_link']) ? '#' : $button['acf_action_button_link'],
                                        'text' => $button['acf_action_button_text'],
                                        'modifier' => 'right-button m_bg',
                                    ])
                                </div>
                            @endif
                        @endforeach
                    @endif

                    {{--@include ('partials.button', [--}}
                      {{--'link' => empty($post->getAcfByKey('acf_link')) ? '#' : $post->getAcfByKey('acf_link'),--}}
                      {{--'text' => 'Join',--}}
                      {{--'modifier' => empty($post->getAcfByKey('acf_link')) ? 'm_bg popmake-join-event' : 'm_bg'--}}
                    {{--])--}}

                    <div class="action__join-date">
                        @if (!$post->getAcfByKey('acf_under_join_button_text'))
                            Registration is available
                            until {{ \Helpers\General::getFormattedDate($post->getAcfByKey('acf_date'), 'dS M') }}
                        @else
                            {{ $post->getAcfByKey('acf_under_join_button_text') }}
                        @endif
                    </div>
                </div>

            </div>
        @endif

        <div class="featured m_events">
            <h2 class="featured__title">Other events</h2>
            <div class="featured__carousel owl-carousel">
                @each('events.partials.event-card', $featured_posts, 'post')
            </div>
        </div>
    @endif

@stop