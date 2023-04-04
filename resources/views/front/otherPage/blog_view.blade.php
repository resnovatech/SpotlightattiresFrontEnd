@extends('front.master.master')

@section('title')

{{ $blog_list->title }}

@endsection


@section('body')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Blog Details</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Blog Details</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <?php

    $ddd =$blog_list->date;
   ?>
    <!-- Start blog details section -->
    <section class="blog__details--section section--padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="blog__details--wrapper">
                        <div class="entry__blog">
                            <div class="blog__post--header mb-30">
                                <h2 class="post__header--title mb-15">{{ $blog_list->title }}</h2>
                                <p class="blog__post--meta">Posted by : {{ $blog_list->written_by }} / On : {{date('F d, Y', strtotime($ddd)) }} / In : <a class="blog__post--meta__link" href="#">{{ $blog_list->cat_name }}</a></p>
                            </div>
                            <div class="blog__thumbnail mb-30">
                                <img class="blog__thumbnail--img border-radius-10" src="{{$url_name}}{{ $blog_list->image }}" alt="blog-img">
                            </div>
                            <div class="blog__details--content">
                                {!! $blog_list->des !!}
                            </div>
                        </div>

                        <div class="related__post--area">
                            <div class="section__heading text-center mb-30">
                                <h2 class="section__heading--maintitle">Related Articles</h2>
                            </div>
                            <div class="row row-cols-md-2 row-cols-sm-2 row-cols-sm-u-2 row-cols-1 mb--n28">

@foreach($blog_list_second as $all_blog_list_second)
                                <div class="col mb-28">
                                    <div class="related__post--items">
                                        <div class="related__post--thumb border-radius-10 mb-15">
                                            <a class="display-block" href="{{ route('blog_view',$all_blog_list_second->title) }}"><img class="related__post--img display-block border-radius-10" src="{{$url_name}}{{ $all_blog_list_second->image }}" alt="related-post"></a>
                                        </div>

                                        <?php

                                        $ddd12 =$all_blog_list_second->date;
                                       ?>
                                        <div class="related__post--text">
                                            <h3 class="related__post--title"><a class="related__post--title__link" href="{{ route('blog_view',$all_blog_list_second->title) }}">{{ $all_blog_list_second->title }}</a></h3>
                                            <span class="related__post--deta">{{date('F d, Y', strtotime($ddd12)) }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="blog__sidebar--widget left widget__area">
                        <div class="single__widget widget__search widget__bg">
                            <h2 class="widget__title h3">Search</h2>
                            <form class="widget__search--form" action="{{ route('search_blog') }}" method="get">
                                <label>
                                    <input class="widget__search--form__input" name="search" placeholder="Search..." type="text">
                                </label>
                                <button class="widget__search--form__btn" aria-label="search button" type="submit">
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                </button>
                            </form>
                        </div>
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Categories</h2>
                            <ul class="widget__categories--menu">

                                @foreach($blog_category_list as $all_blog_category_list)
                                <li class="widget__categories--menu__list">
                                    <a href="{{ route('blog_list',$all_blog_category_list->name) }}">
                                    <label class="widget__categories--menu__label d-flex align-items-center">

                                        <span class="widget__categories--menu__text">{{ $all_blog_category_list->name }}</span>

                                    </label>
                                </a>

                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="single__widget widget__bg">
                           <h2 class="widget__title h3">Post Article</h2>
                            <div class="product__grid--inner">

                                @foreach($blog_list_first as $all_blog_list_first)
                                <div class="product__items product__items--grid d-flex align-items-center">
                                    <div class="product__items--grid__thumbnail position__relative">
                                        <a class="product__items--link" href="{{ route('blog_view',$all_blog_list_first->title) }}">
                                            <img class="product__grid--items__img product__primary--img" src="{{$url_name}}{{ $all_blog_list_first->image }}" alt="product-img">
                                            <img class="product__grid--items__img product__secondary--img" src="{{$url_name}}{{ $all_blog_list_first->image }}" alt="product-img">
                                        </a>
                                    </div>

                                    <?php

                                    $ddd1 =$all_blog_list_first->date;
                                   ?>
                                    <div class="product__items--grid__content">
                                        <h3 class="product__items--content__title h4"><a href="{{ route('blog_view',$all_blog_list_first->title) }}">{{ $all_blog_list_first->title }}</a></h3>
                                        <span class="meta__deta">{{date('F d, Y', strtotime($ddd1)) }}</span>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog details section -->

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
