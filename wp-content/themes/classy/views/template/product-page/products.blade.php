@php
    $acf_products = $post->getAcfByKey('acf_products')
@endphp

@unless(empty($acf_products))
    <section class="products">
        <div class="container">
            <div class="products__list d-flex text-trim-add-parent-class">
                @foreach ($acf_products as $product)
                    <div class="product-card aos-animation" data-aos-delay="{{ 200 * (1 + $loop->index) }}">
                        <div class="product-card__image">
                            <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}">
                        </div>
                        <div class="product-card__content">
                            <div class="product-card__title">{{ $product['title'] }}</div>
                            <div class="product-card__text js-trim-text"
                                 data-text-length="{{ empty($product['trim']) ? '147' : $product['trim'] }}"
                                 data-text-open="{!! strtolower(get_field('read_more', 'option')) !!}"
                                 data-text-close="{{ !empty(get_field('less')) ? get_field('less') : 'less' }}"
                            >
                                    <span class="js-text">
                                        {{ $product['text'] }}
                                    </span>

                                <div class="read-more-wrap">
                                    <div class="read-more-btn">
                                        {{ strtolower(get_field('read_more', 'option')) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="product-card__links d-flex">
                            @foreach ($product['links'] as $link)
                                <li class="product-card__link d-flex">
                                    <div class="icon">
                                        <img src="/wp-content/themes/classy/images/pages/epto-systems/pdf.svg"
                                             alt="icon">
                                    </div>
                                    <a href="{{ $link['link_url'] }}" class="link disable_preloader"
                                       download>{{ $link['link_text'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endunless
