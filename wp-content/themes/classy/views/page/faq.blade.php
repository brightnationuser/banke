@extends('layout.default')

@section('content')
    <div class="container">
        <h1 class="h2 h2--left h2--mt-0">{!! $post->getAcfByKey('title') !!}</h1>
    </div>
    <div class="container">

        @foreach(array_chunk($post->getAcfByKey('acf_section'), round(count($post->getAcfByKey('acf_section'))/2)) as $chunk)
            <div class="col">
                @foreach($chunk as $key => $section)

                    <div class="questions__section">
                        <div class="questions__section-title">
                            {{ $section['acf_section_title'] }}
                        </div>

                        @if($section['acf_section_items'])
                            <div class="questions__items">
                                @foreach($section['acf_section_items'] as $question)
                                    <div class="questions__item">
                                        <div class="item__q">
                                            {{ $question['acf_section_items_question'] }}
                                        </div>

                                        <div class="item__a">
                                            {{ $question['acf_section_items_answer'] }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                @endforeach
            </div>
        @endforeach
    </div>
@stop