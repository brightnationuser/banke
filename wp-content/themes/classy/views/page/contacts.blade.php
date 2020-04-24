@extends('layout.default')

@section('content')
  <section class="contacts">
    <div class="container">
      <div class="contacts__wrap d-flex">
        <div class="contacts__columns d-flex">
          <div class="contacts__left">
            @foreach($post->getAcfByKey('contact_info_left') as $row)
              <div class="contact animated fadeInUp" style="animation-delay: {{ 200 * (1 + $loop->index) }}">
                <h3 class="contact__title">{!! $row['title'] !!}</h3>
                @if(!empty($row['text']))
                  <div class="contact__text">{!! $row['text'] !!}</div>
                @endif
                @if(!empty($row['phone']))
                  <div class="contact__info">
                    <a class="disable_preloader" href="tel:{!! $row['phone'] !!}">
                      <i class="icon-phone"></i>
                      <span>{!! $row['phone'] !!}</span>
                    </a>
                  </div>
                @endif
                @if(!empty($row['email']))
                  <div class="contact__info">
                    <a class="disable_preloader" href="mailto:{{$row ['email'] }}">
                      <i class="icon-email"></i>
                      <span>{!! $row['email'] !!}</span>
                    </a>
                  </div>
                @endif
                @if(!empty($row['work_time']))
                  <div class="contact__info">
                    <i class="icon-clock"></i>
                    <span>{!! $row['work_time'] !!}</span>
                  </div>
                @endif
              </div>
            @endforeach
          </div>
          <div class="contacts__right">
            @foreach($post->getAcfByKey('contact_info_right') as $row)
              <div class="contact animated fadeInUp" style="animation-delay: {{ 200 * (1 + $loop->index) * (1 + count($post->getAcfByKey('contact_info_left'))) }}ms">
                <h3 class="contact__title">{!! $row['title'] !!}</h3>
                @if(!empty($row['text']))
                  <div class="contact__text">{!! $row['text'] !!}</div>
                @endif
                @if(!empty($row['phone']))
                  <div class="contact__info">
                    <a class="disable_preloader" href="tel:{!! $row['phone'] !!}">
                      <i class="icon-phone"></i>
                      <span>{!! $row['phone'] !!}</span>
                    </a>
                  </div>
                @endif
                @if(!empty($row['email']))
                  <div class="contact__info">
                    <a class="disable_preloader" href="mailto:{{$row ['email'] }}">
                      <i class="icon-email"></i>
                      <span>{!! $row['email'] !!}</span>
                    </a>
                  </div>
                @endif
                @if(!empty($row['work_time']))
                  <div class="contact__info">
                    <i class="icon-clock"></i>
                    <span>{!! $row['work_time'] !!}</span>
                  </div>
                @endif
              </div>
            @endforeach
          </div>
        </div>
        <div class="contacts__sidebar sidebar animated fadeInRight">
          <div class="sidebar__item sidebar__item--social">
            <h3>Follow Us</h3>
            <a href="https://linkedin.com/company/banke" class="disable_preloader" target="_blank">
              <i class="icon-linkedin"></i>
              <span>linkedin.com/company/banke/</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>


  @include('partials.contact-us', [
      'form' => $post->getAcfByKey('contact_form'),
      'title' => $post->getAcfByKey('contact_title'),
      'classes' => 'contact-us--light contact-us--blue-bg'
  ])
@stop