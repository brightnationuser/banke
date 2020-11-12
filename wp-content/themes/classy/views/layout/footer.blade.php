<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="footer__menu">

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

            <div class="footer__socials">
                <div class="d-flex">
                    <a href="{!! get_field('linkedin', 'option')['link'] !!}" class="social linkedin disable_preloader" target="_blank">
                        <i class="icon-linkedin"></i>
                    </a>
                    <a href="{!! get_field('youtube', 'option')['link'] !!}" class="social youtube disable_preloader" target="_blank">
                        <i class="icon-youtube"></i>
                    </a>
                    <a href="{!! get_field('twitter', 'option')['link'] !!}" class="social twitter disable_preloader" target="_blank">
                        <i class="icon-twitter"></i>
                    </a>
                    <a href="{!! get_field('xing', 'option')['link'] !!}" class="social xing disable_preloader" target="_blank">
                        <i class="icon-xing"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container footer__bottom">

        <div class="footer__adress">
            Ormstoft 5 | 6400 Sønderborg | Denmark | <a href="tel:+4577771616">+45 7777 16 16</a> | <a href="mailto:marketing@banke.pro">marketing@banke.pro</a>
        </div>

        <div class="footer__copyright">
            © Banke {{ date('Y') }}
        </div>

    </div>
</footer>

<div class="preloader-container">
    <div class="cssload-whirlpool"></div>
</div>