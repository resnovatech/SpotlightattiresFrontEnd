<section class="hero__slider--section">
    <div class="hero__slider--inner hero__slider--activation swiper">
        <div class="hero__slider--wrapper swiper-wrapper">


            @foreach($banner_first_lists as $key=>$all_banner_first_lists)
            <div class="swiper-slide ">
                @if(($key+1) == 1)

                <div class="hero__slider--items home1__slider--bg" style="background:url('{{ $url_name }}{{ $all_banner_first_lists->image }}');background-repeat: no-repeat;
                    background-size: 100% 100%;">

@elseif(($key+1) == 2)
<div class="hero__slider--items home1__slider--bg two" style="background:url('{{ $url_name }}{{ $all_banner_first_lists->image }}');background-repeat: no-repeat;
    background-size: 100% 100%;">

@else
<div class="hero__slider--items home1__slider--bg three" style="background:url('{{ $url_name }}{{ $all_banner_first_lists->image }}');background-repeat: no-repeat;
    background-size: 100% 100%;">
@endif
                    <div class="container-fluid">
                        <div class="hero__slider--items__inner">
                            <div class="row row-cols-1">
                                <div class="col">
                                    <div class="slider__content">
                                        <p class="slider__content--desc desc1 mb-15"><img class="slider__text--shape__icon" src="{{asset('/')}}public/front/assets/img/icon/text-shape-icon.png" alt="text-shape-icon">{{ $all_banner_first_lists->first_title }}</p>
                                        <h2 class="slider__content--maintitle h1">{{ $all_banner_first_lists->second_title }}<br>
                                            {{ $all_banner_first_lists->four_title }}</h2>
                                        <p class="slider__content--desc desc2 d-sm-2-none mb-40">{{ $all_banner_first_lists->third_title }}</p>
                                        <a class="slider__btn primary__btn" href="{{ route('animationCategory',$all_banner_first_lists->button_link) }}">{{ $all_banner_first_lists->button_name }}
                                            <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endforeach


        </div>
        <div class="swiper__nav--btn swiper-button-next"></div>
        <div class="swiper__nav--btn swiper-button-prev"></div>
    </div>
</section>
