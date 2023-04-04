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

    @if(!empty(get_field('solution')))
    <div class="case__solution" style="background-image: url(/wp-content/themes/classy/images/case-solutions-bg.jpg)">
        <div class="container">
            <h2 class="case__solution__title">{!! get_field('solutions_title', 'option') !!}</h2>
            <div class="case__solution__text">{!! get_field('solution') !!}</div>
            <a href="{!! get_permalink(get_field('product')) !!}"
               class="case__solution__button">{!! get_field('case_studies_learn_more_button', 'option') !!}</a>
        </div>
    </div>
    @endif

    @if(get_field('specification_enabled'))
        <div class="case__specifications">
            <div class="case__specifications__container">
                <h2 class="case__solution__title">{!! get_field('main_specification_facts_title', 'option') !!}</h2>
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
                                <i class="icon-down-arrow"></i> <span>{!! get_field('case_study_specification', 'option') !!}</span> </a>
                        @else
                            <a class="case__download" href="#" style="pointer-events: none">
                                <i class="icon-down-arrow"></i> <span>{!! get_field('case_study_specification', 'option') !!}</span> </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty(get_field('product_post',$case_studies_item->ID)))
    <div class="case__product">
        <div class="case__specifications__container">
            <div class="wrapper">
                <div class="image">
                        <img src="{!! get_field('product')['url'];!!}" alt="case icon">
                </div>
                <div class="text">
                    <h2 class="case__solution__title">
                        {!!  get_field('product_post')->post_title !!}
                    </h2>
                    <div class="case__solution__text">{!!  get_field('case_studies_info', get_field('product_post')->ID) !!}</div>
                    <a href="{!! get_permalink( get_field('product_post')->ID ) !!}"
                       class="button button--primary disable_preloader">{!! get_field('case_studies_learn_more_button', 'option') !!}</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @include('partials.related-cases')
    @include('partials.new-contact-us', [
        'form' => get_field('contact_form', 'option'),
        'title' => get_field('contact_form_title', 'option'),
        'classes' => 'contact-us--light'
    ])

@stop