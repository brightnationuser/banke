<header class="header">
    <div class="container">
        <a href="https://banke.pro" class="header__logo">
            <img src="{{ content_url('themes/classy/images/logo.png') }}">
        </a>

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

        <div class="header__lng">
            <div class="lng-w">
                <a href="/">en</a>
                <i class="icon-arrow-down"></i>

                <div class="lng-dropdown">
                    <a href="https://banke.pro/de/">de</a>
                </div>
            </div>
        </div>
    </div>
</header>