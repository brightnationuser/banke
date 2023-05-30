@if($products)
    <section id="specifications" class="products-list-section products-list-section--product-template">
        <div class="container">
            @if($products_title)
                <div class="products-list-section__title">{{$products_title}}</div>
            @endif
            <div class="products-list">
                @foreach($products as $product)
                    <div class="products-list__item">
                        <div class="product-list-card">
                            <div class="product-list-card__content">
                                {!! wp_get_attachment_image(get_post_thumbnail_id($product), 'full', false, array('class' => 'product-list-card__image')) !!}
                                <div class="product-list-card__title">{{$product->post_title}}</div>
                                <div class="product-list-card__description">{{ get_field('short_description', $product->ID) }}</div>
                                @php
                                    $specifications = $product->getAcfByKey('product_specifications');
                                @endphp

                                @if(!empty($specifications))
                                    @if($specifications_title)
                                        <div class="product-list-card__specifications-title">{{$specifications_title}}</div>
                                    @endif                                    <div class="product-list-card__specifications">
                                        @foreach($specifications as $key => $specification)
                                            <a class="product-list-card__specification-link"
                                               href="{{ get_permalink($product->ID) . (count($specifications) > 1) ? '#tab-' . $key : '' }}">{{$specification['name']}}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
