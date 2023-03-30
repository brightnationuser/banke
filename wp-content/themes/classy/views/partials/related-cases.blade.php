<section class="related">
    <div class="container">
        <h2 class="related__title">{{ get_field('related_case_title', 'options') }}</h2>

        <div class="related__content">
            <div class="related__slider js-related-slider owl-carousel">
                @php
                    $framework = get_theme_framework();

                    $case_studies = $framework::get_posts([
                        'post_type' => 'case_studies',
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

                @foreach($case_studies as $key => $item)
                    <div class="carousel__item">
                        <div class="item">
                            <a href="{{ get_permalink($item->ID)  }}" class="item">
                                <img class="item__image"
                                     src="{{ get_the_post_thumbnail_url($case_study->ID,'medium_large') }}"
                                     alt="{{ get_the_title($case_study->ID) }}"/>
                                <div class="item__content">
                                    <h3 class="item__title">
                                        {!!  get_field('subtitle',$item->ID) !!}
                                    </h3>
                                    <h3 class="item__title">
                                        {!! strlen(get_the_title($item->ID)) > 150 ? substr(get_the_title($item->ID), 0, 150) . '...' : get_the_title($item->ID) !!}
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

