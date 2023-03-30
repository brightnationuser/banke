@extends('layout.default')

@section('content')

    <input type="hidden" id="remove_btn_src" value="{{get_template_directory_uri()}}/images/icons/icon_close_blue.svg">
    <article class="case case-{{apply_filters('the_id', get_the_ID())}}">
        <h2 class="case__title">{!! get_field('case_study_title', 'option') !!}</h2>
        <h1 class="case__item__title">{!!  get_the_title() !!}</h1>
        @if(get_field('pdf')['url'] != "")
            <a class="case__download" href="{!! get_field('pdf')['url'] !!}" target="_blank"
               download="{!! get_field('pdf')['url'] !!}">
                <i class="icon-down-arrow"></i> <span>Download pdf</span> </a>
        @else
            <a class="case__download" href="#">
                <i class="icon-down-arrow"></i> <span>Download pdf</span> </a>
        @endif

        <div class="case__content">{!!  get_the_content() !!}</div>
    </article>
    <div class="case__solution" style="background-image: url(/wp-content/themes/classy/images/case-solutions-bg.jpg)">
        <div class="container">
            <h2 class="case__solution__title">Solution</h2>
            <div class="case__solution__text">{!! get_field('solution') !!}</div>
            <a href="{!! get_permalink( $id ) !!}"
               class="case__solution__button">{!! get_field('case_studies_learn_more_button', 'option') !!}</a>
        </div>
    </div>

    @if(get_field('specification_enabled'))
        <div class="case__specifications">
            <div class="case__specifications__container">
                <h2 class="case__solution__title">Main Specification Facts</h2>
                <div class="wrapper">
                    <div class="left">
                        <table>

                            @foreach(get_field('specifications') as $item)
                                <tr>
                                    <td>{!! $item['title'] !!}</td>
                                    <td>{!! $item['text'] !!}</td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                    <div class="right">
                        <div class="image">
                            <img src="/wp-content/themes/classy/images/case-icon.jpg" alt="case icon">
                        </div>
                        @if(get_field('file')['url'] != "")
                            <a class="case__download" href="{!! get_field('file')['url']  !!}" target="_blank"
                               download="{!! get_field('file')['url']  !!}">
                                <i class="icon-down-arrow"></i> <span>specification</span> </a>
                        @else
                            <a class="case__download" href="#" style="pointer-events: none">
                                <i class="icon-down-arrow"></i> <span>specification</span> </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="case__product">
        <div class="case__specifications__container">
            <div class="wrapper">
                <div class="image">

                    @if(get_field('product') == 115)
                        <img src="/wp-content/themes/classy/images/case-test-image.png" alt="case icon">
                    @elseif(get_field('product') == 2301)
                        <img src="/wp-content/themes/classy/images/case-test-image-2.png" alt="case icon">
                    @else
                        <img src="/wp-content/themes/classy/images/case-test-image-3.png" alt="case icon">
                    @endif

                </div>
                <div class="text">
                    <h2 class="case__solution__title">
                        {!!  get_the_title(get_field('product')) !!}
                    </h2>
                    <div class="case__solution__text">{!!  get_field('case_studies_info', get_field('product')) !!}</div>
                    <a href="{!! get_permalink( get_field('product') ) !!}"
                       class="button button--primary disable_preloader">{!! get_field('case_studies_learn_more_button', 'option') !!}</a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.related-cases')
    @include('partials.case-contact-us')

@stop