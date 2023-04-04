@extends('front.master.master')

@section('title')

Wish List

@endsection


@section('body')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    {{-- <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Wishlist</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Wishlist</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End breadcrumb section -->

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container">
            <div class="cart__section--inner">
                <form action="#">
                    <h2 class="cart__title mb-40">Wishlist</h2>
                    <div class="cart__table">
                        <table class="cart__table--inner">
                            <thead class="cart__table--header">
                                <tr class="cart__table--header__items">
                                    <th class="cart__table--header__list">Product</th>
                                    <th class="cart__table--header__list">Price</th>
                                    <th class="cart__table--header__list text-center">STOCK STATUS</th>
                                    <th class="cart__table--header__list text-right">ADD TO CART</th>
                                </tr>
                            </thead>
                            <tbody class="cart__table--body">

                                @foreach($main_product as $all_feature_product_list)
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="cart__product d-flex align-items-center">
                                            <a class="cart__remove--btn" href="{{ route('deleteWishList',$all_feature_product_list->id) }}" aria-label="search button" type="button">
                                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                            </a>
                                            <div class="cart__thumbnail">
                                                <a href="{{ route('productDetail',$all_feature_product_list->slug) }}"><img class="border-radius-5" src="{{ $url_name }}{{ $all_feature_product_list->front_image }}" alt="cart-product"></a>
                                            </div>
                                            <div class="cart__content">
                                                <h4 class="cart__content--title"><a href="{{ route('productDetail',$all_feature_product_list->slug) }}">{{ $all_feature_product_list->product_name }}</a></h4>
                                                {{-- <span class="cart__content--variant">COLOR: Blue</span>
                                                <span class="cart__content--variant">WEIGHT: 2 Kg</span> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">৳ {{ $all_feature_product_list->selling_price }}</span>
                                    </td>
                                    <td class="cart__table--body__list text-center">
                                        <span class="in__stock text__secondary">in stock</span>
                                    </td>
                                    <td class="cart__table--body__list text-right">
                                        <a class="wishlist__cart--btn primary__btn" id="add_to_cart_m{{ $all_feature_product_list->id }}">Add To Cart</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="continue__shopping d-flex justify-content-between">
                            <a class="continue__shopping--link" href="{{ route('index') }}">Continue shopping</a>
                            <a class="continue__shopping--clear" href="{{ route('index') }}">View All Products</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- cart section end -->







</main>

@endsection


@section('script')


@endsection
