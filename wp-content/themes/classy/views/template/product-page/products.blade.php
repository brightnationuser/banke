@php
    $acf_products = $post->getAcfByKey('acf_products')
@endphp

@unless(empty($acf_products))
    <section class="products">
        <div class="container">
            @php
                $acf_products = array_chunk($acf_products, 4)
            @endphp

            @foreach ($acf_products as $row)
                <div class="products__list d-flex text-trim-add-parent-class js-block-toggle-global-wrapper">
                    @foreach($row as $product)
                        <div class="product-card aos-animation js-block-toggle-parent" data-aos-delay="{{ 200 * (1 + $loop->index) }}">
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

                            @php
                                $toggle_links = array_chunk($product['links'], 3);
                                $show_links = array_splice($toggle_links, 0, 1)[0]
                            @endphp

                            <div class="product-card__links">
                                <div class="product-card__links-trigger d-flex js-block-toggle-trigger">
                                    <span>{{ get_field('account_titles', 'option')['specifications'] }}</span>

                                    @unless(empty($toggle_links))
                                        <i class="icon-arrow-down"></i>
                                    @endunless
                                </div>
                                <ul class="product-card__links-list d-flex">
                                    @foreach ($show_links as $link)
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
                                @unless(empty($toggle_links))
                                    @foreach($toggle_links as $item)
                                        <ul class="product-card__links-list product-card__links-list--toggling d-flex js-block-toggle-block" style="display:flex;">
                                            @foreach ($item as $link)
                                                <li class="product-card__link product-card__link--toggle d-flex">
                                                    <div class="icon">
                                                        <img src="/wp-content/themes/classy/images/pages/epto-systems/pdf.svg"
                                                             alt="icon">
                                                    </div>

                                                    <a href="{{ $link['link_url'] }}" class="link disable_preloader"
                                                       download>{{ $link['link_text'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                @endunless
                            </div>

                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
@endunless
