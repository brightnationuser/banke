<!DOCTYPE html>
<html lang="{{ get_locale()}}">

    @include('layout.head')

    <body {{ body_class(array($body_additional, 'm_ready')) }}>

        {!! get_field('acf_body_code', 'option') !!}

        {{ get_header('main') }}

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
