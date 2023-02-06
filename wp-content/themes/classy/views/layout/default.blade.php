@php
global $wp,$sitepress;
$default_language = $sitepress->get_default_language();
$languages = apply_filters('wpml_active_languages', NULL, 'skip_missing=0&orderby=id&order=desc') ?: array(
    array(
        'active' => 1,
        'url' => home_url($wp->request),
        'language_code' => $default_language
    )
);

if((strripos($_SERVER['HTTP_ACCEPT_LANGUAGE'],"de")!==false || strripos($_SERVER['HTTP_ACCEPT_LANGUAGE'],"de_DE")!==false) && strripos($_SERVER["REQUEST_URI"],"/de/") === false && !isset($_COOKIE['language_checked']) ){
    setcookie('language_checked',true);
    header('Location: '.$languages['de']['url']);
}
@endphp
<!DOCTYPE html>
<html>
    <head>

        <meta charset="{{ bloginfo( 'charset' ) }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="pingback" href="{{ bloginfo('pingback_url') }}" />
        <link rel="alternate" type="application/rss+xml" title="{{ bloginfo('name') }} RSS Feed" href="{{ bloginfo('rss2_url') }}" />

        {{--FAVICON START--}}
        {{--<link rel="shortcut icon" href="{{ CLASSY_THEME_DIR }}assets/favicon.ico" />--}}
        {{--FAVICON END--}}

        <script type="text/javascript">
            var icl_lang = '{{ICL_LANGUAGE_CODE}}';
        </script>

        <!-- <script type="text/javascript">
            var hostname = "<?php // echo constant('WP_SITEURL') ?>";
            var ajaxurl = "<?php // echo constant('WP_SITEURL') ?>/wp-admin/admin-ajax.php";
        </script> -->

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

            if(empty($title)) {
                $title = $post->post_title;
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
{{--            <meta name="description" content="{{ $acf_og_description }}">--}}
            <meta property="og:description" content="{{ $acf_og_description }}" />
        @endif

        @if($acf_additional_meta){!! $acf_additional_meta !!}@endif

        {!! get_field('acf_header_code', 'option') !!}

        <?php /* <link rel="stylesheet" href="{{ \Helpers\General::asset_hash('/wp-content/css/app.css') }}"> */ ?>

        <!-- Google Tag Manager -->
        <script>

            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
          })(window,document,'script','dataLayer','GTM-MVNHP8D');
        </script>
        <!-- End Google Tag Manager -->
    </head>

    <body {{ body_class(array($body_additional, 'm_ready')) }}>

        {!! get_field('acf_body_code', 'option') !!}

        {{ get_header() }}

        <div class="content">
            @yield('content')
        </div>

        {{ get_footer() }}

        @php($cookieconsent = get_field('acf_cookieconsent', 'option'))

        <script>
            window.trans = {
                cookieconsent_message: '{!! $cookieconsent['message'] !!}',
                cookieconsent_dismiss: '{!! $cookieconsent['dismiss'] !!}',
                cookieconsent_allow: '{!! $cookieconsent['allow'] !!}',
                cookieconsent_link: '{!! $cookieconsent['link'] !!}',
                cookieconsent_href: '{!! $cookieconsent['href'] !!}',
            };
        </script>

        <!-- Mouseflow Tracking Code -->
        <script type="text/javascript">
            window._mfq = window._mfq || [];
            (function() {
                var mf = document.createElement("script");
                mf.type = "text/javascript"; mf.defer = true;
                mf.src = "//cdn.mouseflow.com/projects/d724304f-84a2-4fb4-8f96-e4780815de13.js";
                document.getElementsByTagName("head")[0].appendChild(mf);
            })();
        </script>
        <!-- End Mouseflow Tracking Code -->

        {{ wp_footer() }}
        @if(defined("WP_ENVIRONMENT_TYPE") && constant("WP_ENVIRONMENT_TYPE") === 'development')
        <script src="http://localhost:35729/livereload.js"></script>
        @endif
    </body>
</html>
