@php
    $acf_group = get_field('vacancies_group');
    $acf_options = get_field('vacancies', 'options');

    $email = $acf_group['email'] ? $acf_group['email'] : $acf_options['email'];
    $phone = $acf_group['phone'] ? $acf_group['phone'] : $acf_options['phone_link'];
@endphp

@extends('layout.default')

@section('content')
    <input type="hidden" id="remove_btn_src" value="{{get_template_directory_uri()}}/images/icons/icon_close_blue.svg">

    <article class="case case-{{apply_filters('the_id', get_the_ID())}}">

            <h2 class="case__title">Case Study</h2>
            <h1 class="case__item__title">{!!  get_the_title() !!}</h1>
            <a class="case__download" href="http://banke/wp-content/uploads/2020/04/Banke-Service-Training-Certificate.jpg" target="_blank"
               download="http://banke/wp-content/uploads/2020/04/Banke-Service-Training-Certificate.jpg">
                <i class="icon-down-arrow"></i> Download Certificate </a>


            <div class="case__content">{!!  get_the_content() !!}</div>




    </article>
    <div class="case__solution" style="background-image: url(/wp-content/themes/classy/images/case-solutions-bg.jpg)">
        <div class="container">
            <h2 class="case__solution__title">Solution</h2>
            <p class="case__solution__text">Banke ApS has developed and built a solution that is both highly compact and
                has a component architecture that allows individual cells to be exchanged in the unlikely event that one
                fails. This enables rapid servicing of the unit and maximizes up-time for the unit.</p>
            <a href="#" class="case__solution__button">Learn more about the product</a>
        </div>
    </div>
    <div class="case__specifications">
        <div class="case__specifications__container">
            <h2 class="case__solution__title">Main Specification Facts</h2>
            <div class="wrapper">
                <div class="left">
                    <table>
                        <tr>
                            <td>Lorem ipsum.</td>
                            <td>Distinctio, dolore.</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum.</td>
                            <td>Minus, officia.</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum.</td>
                            <td>Accusamus, modi.</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum.</td>
                            <td>Error, illum.</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum.</td>
                            <td>Accusantium, eos.</td>
                        </tr>
                    </table>
                </div>
                <div class="right">
                    <div class="image">
                        <img src="/wp-content/themes/classy/images/case-icon.jpg" alt="case icon">
                    </div>
                    <a class="case__download" href="http://banke/wp-content/uploads/2020/04/Banke-Service-Training-Certificate.jpg" target="_blank"
                       download="http://banke/wp-content/uploads/2020/04/Banke-Service-Training-Certificate.jpg">
                        <i class="icon-down-arrow"></i> Download PDF </a>
                </div>
            </div>
        </div>
    </div>
    <div class="case__product">
        <div class="case__specifications__container">
        <div class="wrapper">
            <div class="image">
                <img src="/wp-content/themes/classy/images/case-test-image.png" alt="case icon">
            </div>
            <div class="text">
                <h2 class="case__solution__title">Main Specification Facts</h2>
                <p class="case__solution__text">Banke ApS has developed and built a solution that is both highly compact and
                    has a component architecture that allows individual cells to be exchanged in the unlikely event that one
                    fails. This enables rapid servicing of the unit and maximizes up-time for the unit.</p>
                <div class="button button--primary disable_preloader">Learn more about the product</div>
            </div>
        </div>
        </div>
    </div>
    @include('partials.related-cases')
    @include('partials.case-contact-us')
@stop