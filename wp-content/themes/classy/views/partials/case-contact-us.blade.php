<div class="contact-us-new" style="background-image: url(/wp-content/themes/classy/images/new-contacts-bg.jpg)">
    <div class="container">

            <h2>
                {!! get_field('contact_us', 'option') !!}
            </h2>



        <div class="contact-us__form aos-animation">
            <p> {!! get_field('new_contacts_description', 'option') !!}</p>
            <div class="contacts_list">
                <div class="item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13" fill="none">
                            <path d="M14.6667 0.5H1.33334C0.597969 0.5 0 1.09797 0 1.83334V11.1667C0 11.902 0.597969 12.5 1.33334 12.5H14.6667C15.402 12.5 16 11.902 16 11.1667V1.83334C16 1.09797 15.402 0.5 14.6667 0.5ZM1.33334 1.16666H14.6667C14.7032 1.16666 14.7347 1.18184 14.7696 1.1875L8.35416 6.39616C8.13734 6.53319 7.82747 6.51106 7.66959 6.41375L1.23016 1.18759C1.26513 1.18187 1.29675 1.16666 1.33334 1.16666ZM15.3333 11.1667C15.3333 11.5342 15.0342 11.8333 14.6667 11.8333H1.33334C0.965844 11.8333 0.666687 11.5342 0.666687 11.1667V1.83334C0.666687 1.75881 0.686594 1.69006 0.70925 1.62309L7.27866 6.95247C7.49513 7.09244 7.74481 7.16666 8 7.16666C8.24609 7.16666 8.48634 7.09797 8.69728 6.96744C8.71681 6.95734 8.73538 6.94531 8.75228 6.93131L15.2907 1.62294C15.3134 1.68997 15.3333 1.75875 15.3333 1.83334V11.1667H15.3333Z"
                                  fill="#4A4A49"/>
                        </svg>
                    </div>
                    <a href="mailto:{!! get_field('email', 'options') !!}" class="text">{!! get_field('email', 'options') !!}</a>
                </div>
                <div class="item">
                    <div class="icon"><i class="icon-phone"></i></div>
                    <a href="tel:{!! get_field('number', 'options') !!}" class="text">{!! get_field('number', 'options') !!}</a>
                </div>
            </div>
            <a href="{!! get_permalink( 24 ) !!}" class="button button--primary disable_preloader">{!! get_field('contact_us', 'option') !!}</a>
        </div>
    </div>
</div>