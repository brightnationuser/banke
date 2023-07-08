<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="footer__menu">
                <div class="left">
                    {{
                         wp_nav_menu([
                            'menu' => 'Footer',
                            'container' => FALSE,
                            'container_id' => FALSE,
                            'menu_class' => 'menu__nav',
                            'depth' => 2,
                            'walker' => new \Helpers\Excerpt_Walker
                        ])
                    }}
                </div>

                <div class="right">
                    {{
                         wp_nav_menu([
                            'menu' => 'Footer right part',
                            'container' => FALSE,
                            'container_id' => FALSE,
                            'menu_class' => 'menu__nav',
                            'depth' => 1,
                            'walker' => new \Helpers\Excerpt_Walker
                        ])
                    }}
                </div>
            </div>

            <div class="footer__socials">
                <div class="footer__logo">
                    <a href="/">
                        <img src="{{ content_url('themes/classy/images/logo.png') }}" alt="Banke logo">
                    </a>
                </div>
                <div class="footer__socials-socials">
                    <a href="{!! get_field('linkedin', 'option')['link'] !!}" class="social linkedin disable_preloader"
                       target="_blank">
                        <i class="icon-linkedin"></i>
                    </a>
                    <a href="{!! get_field('youtube', 'option')['link'] !!}" class="social youtube disable_preloader"
                       target="_blank">
                        <i class="icon-youtube"></i>
                    </a>
                    <a href="{!! get_field('facebook', 'option')['link'] !!}" class="social facebook disable_preloader"
                       target="_blank">
                        <i class="icon-facebook"></i>
                    </a>

                    {{--                    <a href="{!! get_field('twitter', 'option')['link'] !!}" class="social twitter disable_preloader" target="_blank">--}}
                    {{--                        <i class="icon-twitter"></i>--}}
                    {{--                    </a>--}}
                    {{--                    <a href="{!! get_field('xing', 'option')['link'] !!}" class="social xing disable_preloader" target="_blank">--}}
                    {{--                        <i class="icon-xing"></i>--}}
                    {{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="container footer__bottom">
        <div class="footer__copyright">
            © Banke {{ date('Y') }}
        </div>
        <div class="footer__adress">
            <span class="footer__address-address">{!! get_field('address', 'options') !!}</span>
            <a class="footer__address-phone"
               href="tel:{!! get_field('number', 'options') !!}">{!! get_field('number', 'options') !!}</a>
            <span class="footer__address-spacer"> | </span>
            <a class="footer__address-email"
               href="mailto:{!! get_field('email', 'options') !!}">{!! get_field('email', 'options') !!}</a>
        </div>
        <div class="footer__madeby">
            made by <a href="https://dudka.agency">Dudka.Agency</a>
        </div>


    </div>
</footer>

<div class="preloader-container">
    <div class="cssload-whirlpool"></div>
</div>

<div id="vueModalsPortalDestination">
</div>
