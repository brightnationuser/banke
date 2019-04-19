@extends('layout.default')

@section('content')

    @php
        $gallery = $post->getAcfByKey('acf_media');
        $items = array();

        $items_per_page = 8;
        $total_items = count($gallery);
        $size = 'full'; 
        $total_pages = ceil($total_items / $items_per_page);

        if(get_query_var('paged')){
            $current_page = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $current_page = get_query_var('page');
        } else{
            $current_page = 1;
        }
        $starting_point = (($current_page-1) * $items_per_page);

        if($gallery){
            $items = array_slice($gallery, $starting_point, $items_per_page);
        }

        $big = 99999;
        $pagination = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link( $big ))),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    @endphp
    
    @include('partials.tabs', ['parent_id' => wp_get_post_parent_id(get_the_ID())])

    <div class="media-wrapper">

        <div class="container">
            <div class="media-list">
                @foreach ($items as $key => $media)
                    @if($media['mime_type'] == 'video/mp4')
                        <a class="list__item" href="{{ $media['url'] }}" data-fancybox="gallery">
                            <div class="video-wrapper">
                                <video>
                                    <source src="{{ $media['url'] }}" type="video/mp4">
                                </video>
                            </div>
                        </a>
                    @else
                        <a class="list__item" href="{{ $media['url'] }}" data-fancybox="gallery">
                            <img src="{{ $media['sizes']['medium'] }}" />
                        </a>
                    @endif
                @endforeach
                <div class="list__item m_fake"></div>
                <div class="list__item m_fake"></div>
            </div>
        </div>

        <nav class="navigation pagination" role="navigation">
            <h2 class="screen-reader-text">Posts navigation</h2>
            <div class="nav-links">
                {!! $pagination !!}
            </div>
        </nav>
    
    </div>

@stop