<!DOCTYPE html>
<html>
    <head>

        <meta charset="{{ bloginfo( 'charset' ) }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

        <link rel="pingback" href="{{ bloginfo('pingback_url') }}" />
        <link rel="alternate" type="application/rss+xml" title="{{ bloginfo('name') }} RSS Feed" href="{{ bloginfo('rss2_url') }}" />

        {{--FAVICON START--}}
        {{--<link rel="shortcut icon" href="{{ CLASSY_THEME_DIR }}assets/favicon.ico" />--}}
        {{--FAVICON END--}}

        <script type="text/javascript">
            {{--var hostname = "<?php echo constant('WP_SITEURL') ?>";--}}
            {{--var ajaxurl = "<?php echo constant('WP_SITEURL') ?>/wp-admin/admin-ajax.php";--}}
        </script>

        {{ wp_head() }}

        <?php
            global $post;
            $post = new \Classy\Models\Post($post);

            $acf_og_image = $post->getAcfByKey('acf_og_image');
            $acf_og_title = $post->getAcfByKey('acf_og_title');
            $acf_og_description = $post->getAcfByKey('acf_og_description');
            if(!$acf_og_description && $post->post_content != '') $acf_og_description = esc_attr(substr(strip_tags($post->post_content), 0, 200));

            $acf_date = \Helpers\General::getFormattedDate($post->getAcfByKey('acf_date'), 'dS M');
            $acf_event_type = ucfirst($post->getAcfByKey('acf_event_type'));
            $acf_additional_meta = ucfirst($post->getAcfByKey('acf_og_additional_meta'));

            $title = wp_title(false, false, 'right');

            if($acf_og_title) $title = $acf_og_title;
            if($acf_event_type) {
                $title = $title.' | '.$acf_date.' | '.$acf_event_type;
            }
        ?>

        @if($acf_og_image)
            <meta property="og:image" content="{{ $acf_og_image['url'] }}"/>
            <meta property="og:image:type" content="{{ $acf_og_image['mime_type'] }}" />
            <meta property="og:image:width" content="{{ $acf_og_image['width'] }}" />
            <meta property="og:image:height" content="{{ $acf_og_image['height'] }}" />
        @else
            <meta property="og:image" content="{{ $post->getAcfImage()->src('large') }}"/>
            <meta property="og:image:width" content="500" />
            <meta property="og:image:height" content="400" />
        @endif

        <meta property="og:title" content="{!! $title !!}"/>
        <title>{!! $title !!}</title>

        <meta property="og:type" content="article" />

        @if($acf_og_description)
            <meta name="description" content="{{ $acf_og_description }}">
            <meta property="og:description" content="{{ $acf_og_description }}" />
        @endif

        @if($acf_additional_meta){!! $acf_additional_meta !!}@endif

        {!! get_field('acf_header_code', 'option') !!}

        <link rel="stylesheet" href="{{ \Helpers\General::asset_hash('/wp-content/css/app.css') }}">
    </head>

    <body {{ body_class($body_additional) }}>

        {!! get_field('acf_body_code', 'option') !!}

        {{ get_header() }}

        <div class="content">
            @yield('content')
        </div>

        {{ get_footer() }}

        {{ wp_footer() }}

    </body>
</html>
