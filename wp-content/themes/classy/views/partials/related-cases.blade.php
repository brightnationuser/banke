@php

    function max_title_length( $title ) {
        $max = 50;
        if( strlen( $title ) > $max ) {
            return substr( $title, 0, $max ). "&hellip;";
        } else {
            return $title;
        }
    }

@endphp


<section class="related related_cases">
    <div class="home-references">
        <h2 class="related__title">{{ get_field('related_case_title', 'options') }}</h2>
        <div class="container">


            <div class="references-slider owl-carousel js-references-slider">

                @php

                    global $post;

                    $framework = get_theme_framework();

                    $case_studies = $framework::get_posts([
                        'post_type' => 'case_studies',
                        'post__not_in' => array( $post->ID ),
                        'posts_per_page' => -1,
                    ]);

                    if (count($case_studies) < 4) {
                        $references_filling = $framework::get_posts([
                            'post_type' => 'page',
                            'post_parent' => 214,
                            'posts_per_page' => 4 - count($case_studies),
                        ]);
                        $case_studies = array_merge($case_studies, $references_filling);

                    }

                @endphp

                @foreach($case_studies as $case_study)

                    <div class="reference-slide">
                        <a href="{!! get_post_permalink($case_study->ID) !!}">

                            @if($case_study->post_type=="page")
                                <div class="reference-slide__image">
                                    <picture>
                                        <img src="{!! \Helpers\General::getFlyImage($case_study->getAcfByKey('acf_image'), [600, 400]); !!}"
                                             alt="{!! $case_study->post_title !!}"/>
                                    </picture>
                                </div>
                            @else
                                <div class="reference-slide__image">
                                    <picture>
                                        <img class="item__image"
                                             src="{{ get_the_post_thumbnail_url($case_study->ID,'medium_large') }}"
                                             alt="{{ get_the_title($case_study->ID) }}"/>
                                    </picture>

                                    @if(!empty(get_field('subtitle',$case_study->ID)))

                                        <div class="manufacturer">
                                            CLIENT: {!!  get_field('subtitle',$case_study->ID) !!}
                                        </div>

                                    @endif

                                </div>

                            @endif

                            <div class="reference-slide__title">
                                {!! max_title_length($case_study->post_title) !!}
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>

            <div class="custom-nav">
                <svg class="owl-prev" xmlns="http://www.w3.org/2000/svg" width="14" height="38" viewBox="0 0 14 38"
                     fill="none">
                    <g clip-path="url(#clip0_414_540)">
                        <path d="M0.5 0.5L13.5 19L0.5 37.5" stroke="#9AAFC1" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_414_540">
                            <rect width="14" height="38" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>

                <svg class="owl-next" xmlns="http://www.w3.org/2000/svg" width="14" height="38" viewBox="0 0 14 38"
                     fill="none">
                    <g clip-path="url(#clip0_414_540)">
                        <path d="M0.5 0.5L13.5 19L0.5 37.5" stroke="#9AAFC1" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_414_540">
                            <rect width="14" height="38" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>

        </div>
    </div>
</section>

