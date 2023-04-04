@extends('front.master.master')

@section('title')

About Us

@endsection


@section('body')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    {{-- <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">About Us</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">About Us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End breadcrumb section -->

    <!-- Start about section -->
    <section class="about__section section--padding mb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__thumb d-flex">
                        <div class="about__thumb--items">
                            <img class="about__thumb--img border-radius-5 display-block" src="http://localhost/2023/moin_new_feb_14/{{ $about_us_first->image }}" alt="about-thumb">
                        </div>
                        <div class="about__thumb--items position__relative">
                            <img class="about__thumb--img border-radius-5 display-block" src="http://localhost/2023/moin_new_feb_14/{{ $about_us_second->image }}" alt="about-thumb">
                            <div class="banner__bideo--play about__thumb--play">
                                <a class="banner__bideo--play__icon about__thumb--play__icon glightbox" href="{{ $about_us_second->des }}" data-gallery="video">
                                    <svg id="play" xmlns="http://www.w3.org/2000/svg" width="40.302" height="40.302" viewBox="0 0 46.302 46.302">
                                        <g id="Group_193" data-name="Group 193" transform="translate(0 0)">
                                        <path id="Path_116" data-name="Path 116" d="M39.521,6.781a23.151,23.151,0,0,0-32.74,32.74,23.151,23.151,0,0,0,32.74-32.74ZM23.151,44.457A21.306,21.306,0,1,1,44.457,23.151,21.33,21.33,0,0,1,23.151,44.457Z" fill="currentColor"/>
                                        <g id="Group_188" data-name="Group 188" transform="translate(15.588 11.19)">
                                            <g id="Group_187" data-name="Group 187">
                                            <path id="Path_117" data-name="Path 117" d="M190.3,133.213l-13.256-8.964a3,3,0,0,0-4.674,2.482v17.929a2.994,2.994,0,0,0,4.674,2.481l13.256-8.964a3,3,0,0,0,0-4.963Zm-1.033,3.435-13.256,8.964a1.151,1.151,0,0,1-1.8-.953V126.73a1.134,1.134,0,0,1,.611-1.017,1.134,1.134,0,0,1,1.185.063l13.256,8.964a1.151,1.151,0,0,1,0,1.907Z" transform="translate(-172.366 -123.734)" fill="currentColor"/>
                                            </g>
                                        </g>
                                        <g id="Group_190" data-name="Group 190" transform="translate(28.593 5.401)">
                                            <g id="Group_189" data-name="Group 189">
                                            <path id="Path_118" data-name="Path 118" d="M328.31,70.492a18.965,18.965,0,0,0-10.886-10.708.922.922,0,1,0-.653,1.725,17.117,17.117,0,0,1,9.825,9.664.922.922,0,1,0,1.714-.682Z" transform="translate(-316.174 -59.724)" fill="currentColor"/>
                                            </g>
                                        </g>
                                        <g id="Group_192" data-name="Group 192" transform="translate(22.228 4.243)">
                                            <g id="Group_191" data-name="Group 191">
                                            <path id="Path_119" data-name="Path 119" d="M249.922,47.187a19.08,19.08,0,0,0-3.2-.27.922.922,0,0,0,0,1.845,17.245,17.245,0,0,1,2.889.243.922.922,0,1,0,.31-1.818Z" transform="translate(-245.801 -46.917)" fill="currentColor"/>
                                            </g>
                                        </g>
                                        </g>
                                    </svg>
                                    <span class="visually-hidden">Video Play</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
                        <span class="about__content--subtitle text__secondary mb-20">{{ $about_us_first->main_title }}</span>
                        <h2 class="about__content--maintitle mb-25">{{ $about_us_first->title_one }}</h2>
                        <p class="about__content--desc mb-20">{{ $about_us_first->title_one_des }}</p>

                        <div class="about__author position__relative d-flex align-items-center">
                            <div class="about__author--left">
                                <h4 class="about__author--name">{{ $about_us_first->title_two }}</h4>
                                <span class="about__author--rank">{{ $about_us_first->title_three }} </span>
                            </div>
                            {{-- <img class="about__author--signature display-block" src="assets/img/icon/signature.png" alt="signature"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about section -->







    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3 section--padding">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{ asset('/') }}public/front/assets/img/other/shipping1.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{ asset('/') }}public/front/assets/img/other/shipping2.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping3.png" alt="">
                    </div>
                    <div class="{{ asset('/') }}public/front/shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{ asset('/') }}public/front/assets/img/other/shipping4.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Support</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

    <!-- Start brand logo section -->
    <div class="brand__logo--section bg__secondary section--padding">
        <div class="container-fluid">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="brand__logo--section__inner d-flex justify-content-center align-items-center">

@foreach($brand_list_all as $all_brand_list_all)
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block" src="{{ asset('/') }}{{ $all_brand_list_all->image }}" alt="brand logo">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End brand logo section -->
</main>
@endsection
