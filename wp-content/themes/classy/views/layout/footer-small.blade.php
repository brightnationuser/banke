<footer class="footer">
    <div class="footer__top">
        <div class="container">

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
            </div>
        </div>
    </div>

    <div class="container footer__bottom">
        <div class="footer__copyright">
            © Banke {{ date('Y') }}
        </div>
        <div class="footer__adress">
            {!! get_field('address', 'options') !!} <a
                    href="tel:{!! get_field('number', 'options') !!}">{!! get_field('number', 'options') !!}</a>
            <span> | </span>
            <a href="mailto:{!! get_field('email', 'options') !!}">{!! get_field('email', 'options') !!}</a>
        </div>
        <div class="footer__madeby">
            made by <a href="https://dudka.agency" target="_blank">Dudka.Agency</a>
        </div>


    </div>
</footer>

<div class="preloader-container">
    <div class="cssload-whirlpool"></div>
</div>
