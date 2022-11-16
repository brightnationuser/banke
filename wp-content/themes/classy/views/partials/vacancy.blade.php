@php
    $acf_group = get_field('vacancies_group', $post->ID);
@endphp

<div class="vacancies-card">
    <a href="{{get_permalink($post->ID)}}" class="vacancies-card__link"></a>
    <div class="vacancies-card__body">
        @if($acf_group['vacancy_closed'])
            <p class="vacancies-card__block">Closed</p>
        @endif

        <a href="{{get_permalink($post->ID)}}" class="vacancies-card__title {{$acf_group['vacancy_closed'] ? 'closed' : ''}}">{{$post->post_title}}</a>

        @if($acf_group['vacancy_time'] || $acf_group['for_who'])
            <div class="vacancies-card__row">
                @if($acf_group['vacancy_time'])
                    <p class="time">{{$acf_group['vacancy_time']}}</p>
                @endif

                @if($acf_group['for_who'])
                    <p class="who">{{$acf_group['for_who']}}</p>
                @endif
            </div>
        @endif

        <div class="vacancies-card__descr">{!! preg_replace('/^(.{1,130}\w)\W.*$/u', '$1...', $acf_group['mini_description'])!!}</div>
    </div>

    <div class="vacancies-card__footer">
        <span>{{get_the_date('d.m.Y', $post->ID)}}</span>

        <a href="{{get_permalink($post->ID)}}">Read More</a>
    </div>
</div>