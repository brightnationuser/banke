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
                <div class="social linkedin">
                    <a href="{!! get_field('linkedin', 'option')['link'] !!}" class="d-flex disable_preloader" target="_blank" >
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
{{--                        <span>{!! get_field('linkedin', 'option')['text'] !!}</span>--}}
                    </a>
                </div>
                <div class="social youtube">
                    <a href="{!! get_field('youtube', 'option')['link'] !!}" class="d-flex disable_preloader" target="_blank" >
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="4" fill="white" fill-opacity="0.9"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2484 10.0102C16.2484 10.0102 16.2484 12.0383 15.9912 13.0162C15.847 13.5515 15.4249 13.9735 14.8896 14.1176C13.9117 14.375 9.99997 14.375 9.99997 14.375C9.99997 14.375 6.09845 14.375 5.11029 14.1074C4.57501 13.9633 4.15295 13.5411 4.00876 13.0058C3.75134 12.0383 3.75134 10 3.75134 10C3.75134 10 3.75134 7.97211 4.00876 6.99417C4.1528 6.45889 4.58524 6.02646 5.11029 5.88242C6.08823 5.625 9.99997 5.625 9.99997 5.625C9.99997 5.625 13.9117 5.625 14.8896 5.89264C15.4249 6.03668 15.847 6.45889 15.9912 6.99417C16.2588 7.97211 16.2484 10.0102 16.2484 10.0102ZM12.0073 10L8.75439 11.8735V8.12653L12.0073 10Z" fill="#003462"/>
                        </svg>
                    </a>
                </div>
                <div class="social twitter">
                    <a href="{!! get_field('twitter', 'option')['link'] !!}" class="d-flex disable_preloader" target="_blank" >
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="4" fill="white" fill-opacity="0.9"/>
                            <path d="M14.5659 7.79694C14.5703 7.89536 14.5724 7.99423 14.5724 8.09357C14.5724 11.1266 12.2638 14.624 8.04184 14.6242C6.74561 14.6242 5.5394 14.2442 4.52362 13.5931C4.70322 13.6143 4.88602 13.6249 5.07111 13.6249C6.14655 13.6249 7.13623 13.2581 7.92191 12.6424C6.91711 12.6237 6.06995 11.9601 5.77759 11.0481C5.91751 11.075 6.0614 11.0896 6.20895 11.0896C6.41846 11.0896 6.6214 11.0614 6.81427 11.0088C5.76401 10.7985 4.97284 9.8703 4.97284 8.75885C4.97284 8.74847 4.97284 8.73917 4.97314 8.72955C5.28244 8.90152 5.63614 9.00497 6.01273 9.01657C5.39642 8.60535 4.9913 7.90237 4.9913 7.10602C4.9913 6.68549 5.10498 6.2915 5.30212 5.9523C6.43402 7.34116 8.12561 8.25455 10.0333 8.35052C9.9939 8.18237 9.9736 8.0072 9.9736 7.82715C9.9736 6.56006 11.0016 5.53207 12.2691 5.53207C12.9294 5.53207 13.5257 5.81116 13.9445 6.25732C14.4675 6.15417 14.9585 5.96313 15.4021 5.70023C15.2304 6.23596 14.8666 6.68549 14.3927 6.96976C14.857 6.91422 15.2995 6.79108 15.7108 6.60828C15.4036 7.06863 15.014 7.47299 14.5659 7.79694Z" fill="#003462"/>
                        </svg>
                    </a>
                </div>
                <div class="social xing">
                    <a href="{!! get_field('xing', 'option')['link'] !!}" class="d-flex disable_preloader" target="_blank" >
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="4" fill="white" fill-opacity="0.9"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 12.674L6.83708 9.53141L5.45956 7.00996H7.79119L9.16941 9.53141L7.3322 12.674H5ZM13.6931 16H11.219L8.85116 11.6875L12.5265 5H15L11.3247 11.6875L13.6931 16Z" fill="#003462"/>
                        </svg>
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