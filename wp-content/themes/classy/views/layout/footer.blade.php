<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="footer__menu">

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

            <div class="footer__socials">
                <div class="social linkedin">
                    <a href="https://linkedin.com/company/banke" class="d-flex disable_preloader" target="_blank" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <rect width="20" height="20" rx="4" fill="white" fill-opacity="0.9"/>
                            <g clip-path="url(#clip0)">
                                <path d="M15.9971 16V15.9995H16.0001V11.5985C16.0001 9.44549 15.5366 7.78699 13.0196 7.78699C11.8096 7.78699 10.9976 8.45099 10.6661 9.08049H10.6311V7.98799H8.24463V15.9995H10.7296V12.0325C10.7296 10.988 10.9276 9.97799 12.2211 9.97799C13.4956 9.97799 13.5146 11.17 13.5146 12.0995V16H15.9971Z" fill="#003462"/>
                                <path d="M4.19775 7.98853H6.68575V16H4.19775V7.98853Z" fill="#003462"/>
                                <path d="M5.441 4C4.6455 4 4 4.6455 4 5.441C4 6.2365 4.6455 6.8955 5.441 6.8955C6.2365 6.8955 6.882 6.2365 6.882 5.441C6.8815 4.6455 6.236 4 5.441 4V4Z" fill="#003462"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect x="4" y="4" width="12" height="12" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span>linkedin.com/company/banke</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container footer__bottom">

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