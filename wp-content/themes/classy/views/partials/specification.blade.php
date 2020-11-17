<div class="specification">
    <h2 class="specification__heading">
        {{ get_field('specification_title') }}
    </h2>
    @foreach($items as $key => $item)
        <div class="specification__wrapper">
            <div class="specification__image">
                <img src="{{$item['image']['url']}}" alt="{{ get_field('specification_title') }} - {{ $key + 1 }}">
            </div>

            <div class="specification__list">
                @if(!empty($item['gross_vehicle_weight']))
                    <div class="specification__elem">
                        <div class="specification__title">
                            Gross vehicle weight
                        </div>
                        <div class="specification__info">
                            {{ $item['gross_vehicle_weight'] }}
                        </div>
                    </div>
                @endif

                @if(!empty($item['wheel_arrangement']))
                    <div class="specification__elem">
                        <div class="specification__title">
                            Wheel arrangement
                        </div>
                        <div class="specification__info">
                            {{ $item['wheel_arrangement'] }}
                        </div>
                    </div>
                @endif

                @if(!empty($item['wheel_base']))
                    <div class="specification__elem">
                        <div class="specification__title">
                            Wheelbase
                        </div>
                        <div class="specification__info">
                            {{ $item['wheel_base'] }}
                        </div>
                    </div>
                @endif

                @if(!empty($item['system_weight_addition']))
                    <div class="specification__elem">
                        <div class="specification__title">
                            System weight addition
                        </div>
                        <div class="specification__info">
                            {{ $item['system_weight_addition'] }}
                        </div>
                    </div>
                @endif

                @if(!empty($item['front_weight_addition']))
                    <div class="specification__elem">
                        <div class="specification__title">
                            Front-axle weight addition
                        </div>
                        <div class="specification__info">
                            {{ $item['front_weight_addition'] }}
                        </div>
                    </div>
                @endif
                @if(!empty($item['rear_weight_addition']))
                    <div class="specification__elem">
                        <div class="specification__title">
                            Rear-axle weight addition
                        </div>
                        <div class="specification__info">
                            {{ $item['rear_weight_addition'] }}
                        </div>
                    </div>
                @endif
                @if(!empty($item['maximum_speed']))
                    <div class="specification__elem">
                        <div class="specification__title">
                            Maximum speed
                        </div>
                        <div class="specification__info">
                            {{ $item['maximum_speed'] }}
                        </div>
                    </div>
                @endif

                @if(!empty($item['maximum_gradeability']))
                    <div class="specification__elem">
                        <div class="specification__title">
                            Maximum gradeability
                        </div>
                        <div class="specification__info">
                            {{ $item['maximum_gradeability'] }}
                        </div>
                    </div>
                @endif

                @if(!empty($item['file_pdf']))

                    <div class="specification__button">
                        <a class="disable_preloader" href="{{ $item['file_pdf'] }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                 fill="none">
                                <path d="M15.4524 4.32991L11.3762 0.0943125C11.3182 0.0340625 11.2381 0 11.1545 0H5.07919C4.39928 0 3.84612 0.552938 3.84612 1.23256V5.53847H1.38403C0.875342 5.53847 0.461498 5.95219 0.461498 6.46075V11.0778C0.461498 11.5863 0.875342 12 1.38403 12H3.84612V14.7696C3.84612 15.448 4.39928 16 5.07919 16H14.3054C14.9853 16 15.5384 15.4483 15.5384 14.7703V4.54328C15.5384 4.46372 15.5076 4.38725 15.4524 4.32991ZM11.2307 0.830656L14.577 4.30769H11.2307V0.830656ZM1.38403 11.3846C1.21465 11.3846 1.0769 11.247 1.0769 11.0778V6.46075C1.0769 6.29153 1.21469 6.15384 1.38403 6.15384H9.69284C9.86222 6.15384 9.99996 6.29153 9.99996 6.46075V11.0778C9.99996 11.247 9.86218 11.3846 9.69284 11.3846H1.38403ZM14.923 14.7703C14.923 15.109 14.6459 15.3846 14.3053 15.3846H5.07919C4.73859 15.3846 4.4615 15.1087 4.4615 14.7696V12H9.69284C10.2015 12 10.6154 11.5863 10.6154 11.0778V6.46075C10.6154 5.95219 10.2015 5.53847 9.69284 5.53847H4.4615V1.23256C4.4615 0.892219 4.73859 0.615375 5.07919 0.615375H10.6153V4.61538C10.6153 4.78531 10.7531 4.92306 10.923 4.92306H14.923V14.7703Z"
                                      fill="white"/>
                                <path d="M4.13993 7.80922C4.03777 7.67641 3.91096 7.59016 3.75952 7.5505C3.66096 7.52407 3.44943 7.51085 3.1249 7.51085H2.26853V10.1539H2.80218V9.15688H3.15015C3.39174 9.15688 3.57624 9.14425 3.70365 9.119C3.7974 9.09856 3.88965 9.05681 3.9804 8.99369C4.07115 8.93059 4.14596 8.84375 4.20487 8.73319C4.26377 8.62263 4.29321 8.48619 4.29321 8.32394C4.29318 8.1136 4.24209 7.94203 4.13993 7.80922ZM3.6829 8.53669C3.64265 8.59559 3.58706 8.63884 3.51612 8.6665C3.44518 8.69416 3.30459 8.70797 3.09424 8.70797H2.80218V7.95797H3.05999C3.25231 7.95797 3.38031 7.96397 3.44399 7.976C3.53052 7.99163 3.60206 8.03069 3.65852 8.09319C3.71502 8.15569 3.74327 8.23503 3.74327 8.33116C3.74331 8.40928 3.72315 8.47778 3.6829 8.53669Z"
                                      fill="white"/>
                                <path d="M6.85868 8.23291C6.80099 8.06403 6.71683 7.92132 6.60627 7.80472C6.49571 7.68813 6.36286 7.607 6.20783 7.56132C6.09246 7.52766 5.92477 7.51085 5.70483 7.51085H4.72946V10.1539H5.73368C5.9308 10.1539 6.08824 10.1352 6.20602 10.098C6.36349 10.0475 6.48849 9.97719 6.58102 9.88703C6.70361 9.76803 6.79796 9.6124 6.86408 9.42009C6.91818 9.26262 6.94521 9.07512 6.94521 8.85759C6.94521 8.61 6.91636 8.40178 6.85868 8.23291ZM6.33943 9.31825C6.30336 9.43666 6.2568 9.52169 6.19971 9.57334C6.14261 9.62503 6.0708 9.66169 5.98427 9.68331C5.91817 9.70015 5.81058 9.70856 5.66155 9.70856H5.26311V7.95797H5.50289C5.72042 7.95797 5.86649 7.96638 5.94099 7.98322C6.04074 8.00485 6.12308 8.04631 6.18799 8.10763C6.25289 8.16894 6.30336 8.25425 6.33943 8.36363C6.37549 8.473 6.39352 8.62984 6.39352 8.83419C6.39352 9.0385 6.37549 9.19984 6.33943 9.31825Z"
                                      fill="white"/>
                                <path d="M9.21323 7.95797V7.51085H7.40133V10.1539H7.93499V9.03069H9.03836V8.58356H7.93499V7.95797H9.21323Z"
                                      fill="white"/>
                            </svg>

                            <button class="btn">Download Full specification</button>
                        </a>
                    </div>
                @endif
            </div>

        </div>
    @endforeach
</div>
