@extends('layout.default')

@section('content')

    <div class="page-tabs">
        @foreach ($post->getAcfByKey('acf_tabs') as $key => $tab)
            <div class="page-tabs__item {{ $key == 0 ? 'm_active' : '' }}" data-id="{{ $key }}">
                {{ $tab['title'] }}
            </div>
        @endforeach
    </div>

    <div class="tab tab-concept m_active" data-id="0">

        <h2>
            {{ $post->getAcfByKey('acf_title_main') }}
        </h2>

        <div class="container">
            @include('partials.epto-slider')
        </div>

        <div class="container">
            <article class="content-text m_2">
                <div class="text-column">
                    {!! $post->getAcfByKey('acf_description') !!}
                </div>
                <div class="text-column">
                    {!! $post->getAcfByKey('acf_description_2') !!}
                </div>
            </article>
        </div>
        

        <div class="concept__description">
            <div class="container">
                <h2>
                    {{ $post->getAcfByKey('acf_title_concept') }}
                </h2>
                <div class="description__wrapper">
                    <img src="/wp-content/themes/classy/images/pages/epto-systems/epto.png">
                    <article class="content-text m_1">
                        <div class="text-column">
                            {!! $post->getAcfByKey('acf_concept_description') !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <div class="consept__principles">
            <h2>
                {{ $post->getAcfByKey('acf_title_principles') }}
            </h2>
            <div class="benefits m_3">
                <div class="container">
                    @foreach($post->getAcfByKey('acf_benefits') as $key => $item)
                        <div class="benefit">
                            <div class="benefit__image">
                                @if($key == 0) <img src="/wp-content/themes/classy/images/pages/epto-systems/planet.svg"> @endif
                                @if($key == 1) <img src="/wp-content/themes/classy/images/pages/epto-systems/solar_panel.svg"> @endif
                                @if($key == 2) <img src="/wp-content/themes/classy/images/pages/epto-systems/crane.svg"> @endif
                            </div>

                            <div class="benefit__title">
                                {{ $item['title'] }}
                            </div>

                            <div class="benefit__caption">
                                {{ $item['text'] }}
                            </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>

    </div>

    <div class="tab tab-products" data-id="1">
    </div>

    <div class="tab tab-references" data-id="2">
    </div>

    <div class="tab tab-media" data-id="3">
    </div>
@stop