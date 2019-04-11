@extends('layout.default')

@section('content')

<div class="p-events">

  @if (isset($posts))

    <div class="event-type-switcher">
      <a href="?type=event" class="switcher__button {{ ($type == 'event') ? 'm_active' : '' }}">Events</a>
      <a href="?type=webinar" class="switcher__button {{ ($type == 'webinar') ? 'm_active' : '' }}">Webinars</a>
      <a href="/events" class="switcher__button {{ ($type == false) ? 'm_active' : '' }}">All</a>
    </div>

    @if($banner_post)
      @include('partials.banner', [
        'image_src' => $banner_post->getAcfImage()->src('large'),
        'type' => $banner_post->getAcfByKey('acf_event_type'),
        'title' => $banner_post->title(),
        'datetime' => [
          'date' => $banner_post->getDate(),
          'time' => $banner_post->getTime(),
          'timezone' => $banner_post->getTimeZone(),
        ],
        'button' => [
          'text' => 'Sign up',
          'modifier' => 'm_banner'
        ],
        'link' => $banner_post->permalink()
      ])
    @endif

    <div class="cards">
      @each('events.partials.event-card', $posts, 'post')
    </div>

    <h2>
      Past {{ ($type == 'webinar') ? 'webinars' : 'events' }}
    </h2>

    <div class="cards m_past">
      @each('events.partials.event-card', $past_posts, 'post')
    </div>

  @else

    <div>No events</div>

  @endif

</div>

@stop