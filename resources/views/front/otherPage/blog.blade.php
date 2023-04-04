@extends('front.master.master')

@section('title')

Blog

@endsection


@section('body')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    {{-- <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Blog</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Blog</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End breadcrumb section -->

    <!-- Start blog section -->
    <section class="blog__section section--padding">
        <div class="container">
            <div class="section__heading text-center mb-50">
                <h2 class="section__heading--maintitle">From The Blog</h2>
            </div>
            <div class="blog__section--inner">
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-sm-u-2 row-cols-1 mb--n30">

@foreach($blog_list as $all_blog_list)

<?php

                                     $ddd =$all_blog_list->date;
                                    ?>

                    <div class="col mb-30">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link" href="{{ route('blog_view',$all_blog_list->title) }}"><img class="blog__thumbnail--img" src="{{$url_name}}{{ $all_blog_list->image }}" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <span class="blog__content--meta">{{date('F d, Y', strtotime($ddd)) }}</span>
                                <h3 class="blog__content--title"><a href="{{ route('blog_view',$all_blog_list->title) }}">{{ $all_blog_list->title }}</a></h3>
                                <a class="blog__content--btn primary__btn" href="{{ route('blog_view',$all_blog_list->title) }}">Read more </a>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
                <div class="pagination__area bg__gray--color">

                </div>
            </div>
        </div>
    </section>
    <!-- End blog section -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3 section--padding pt-0">
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
                        <img src="{{ asset('/') }}public/front/assets/img/other/shipping3.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
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
</main>

@endsection
