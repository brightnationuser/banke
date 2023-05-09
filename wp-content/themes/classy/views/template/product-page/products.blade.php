@if($products)
    <section class="products-list-section">
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
                                @if($read_more)
                                    <div class="product-list-card__link-holder">
                                        <a class="product-list-card__link"
                                           href="{{get_permalink($product->ID) }}">{{ $read_more }}</a>
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
