@if (is_array($datetime['custom_time']))
    @foreach($datetime['custom_time'] as $acf_event_time)
        <div class="event-datetime">
            <span class="datetime__date">{{ Helpers\General::getFormattedDate($acf_event_time['acf_date'], 'd M Y') }}</span>
            @if($acf_event_time['acf_time_interval'])
                <span class="datetime__time">{{ $acf_event_time['acf_time_interval'] }} {{ $datetime['timezone'] }}</span>
            @endif
        </div>
    @endforeach
@elseif($datetime['date'])
    <div class="event-datetime {{ $modifier }}">
        <span class="datetime__date">{{ $datetime['date'] }}</span>
        @if($datetime['time'])
            <span class="datetime__time">{{ $datetime['time'] }} {{ $datetime['timezone'] }}</span>
        @endif
    </div>
@endif