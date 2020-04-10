<footer class="footer">
    <div class="container">

{{--        <div class="footer__top">
            <div class="header__menu">

                <button class="hamburger hamburger--3dxy" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
                </button>

                {{
                     wp_nav_menu([
                        'menu' => 2,
                        'container' => FALSE,
                        'container_id' => FALSE,
                        'menu_class' => 'menu__nav',
                        'depth' => 2,
                        'walker' => new \Helpers\Excerpt_Walker
                    ])
                }}

            </div>
        </div>--}}

        <div class="footer__adress">
            Ormstoft 5 | 6400 Sønderborg | Denmark | +45 7777 1616 | <a href="mailto:marketing@banke.pro">marketing@banke.pro</a>
        </div>

        <div class="footer__copyright">
            © Banke {{ date('Y') }}
        </div>

    </div>
</footer>

<div class="preloader-container">
    <div class="cssload-whirlpool"></div>
</div>