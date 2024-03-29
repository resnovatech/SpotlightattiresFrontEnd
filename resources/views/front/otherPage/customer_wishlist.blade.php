@extends('front.master.master')

@section('title')

Customer Dasboard

@endsection


@section('body')
<style>
    /*profile css*/
.profile_welcome_box {
    background-color: var(--secondary-color);
    padding: 20px 30px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.profile_welcome_box_left h3 {
    font-size: 16px;
    color: #c6c6c6;
    padding-top: 6px;
}

.profile_welcome_box_left h3 span {
    font-size: 22px;
    font-weight: bold;
    color: #ffffff;
    padding-top: 6px;
}

.profile_welcome_box_left p {
    font-size: 16px;
    color: #c6c6c6;
}

.profile_welcome_box_left p span {
    font-size: 18px;
    color: #ffffff;
    font-weight: bold;
}

.profile_welcome_box_right
{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.profile_welcome_box_right h5 {
    font-size: 18px;
    color: #ffffff;
}

.profile_welcome_box_right p {
    color: #000000;
    padding: 4px 0;
    background-color: #ffffff;
    border-radius: 6px;
    font-size: 22px;
    width: 150px;
    font-weight: bold;
    text-align: center;
}

/*box design*/

.stretch-card {
    justify-content: center;
    border-radius: 15px;
}

.grid-margin, .purchase-popup {
    margin-bottom: 2.5rem;
}

.bg-gradient-danger {

    background: linear-gradient(to right, #ffbf96, #fe7096) !important;
}

.bg-gradient-info {
    background: linear-gradient(to right, #90caf9, #047edf 99%) !important;
}

.bg-gradient-success {
    background: linear-gradient(to right, #84d9d2, #07cdae) !important;
}

.card.card-img-holder {
    position: relative;
    border-radius: 5px;
}

.card.card-img-holder .card-img-absolute {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
}

.profile_stat_text_box {
    padding: 20px 10px;
}
</style>
<main class="main__content_wrapper">

        {{-- <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">My Account</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End breadcrumb section -->

        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
               <?php
                        $client_type_new = DB::table('clients')->where('user_id',Auth::user()->id)->value('c_type');

                        ?>






                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">My Profile</h2>
                        <ul class="account__menu">
                              <li class="account__menu--list {{ Route::is('customer_dashboard')  ? 'active' : '' }}"><a href="{{route('customer_dashboard')}}">Dashboard</a></li>
                             <li class="account__menu--list {{ Route::is('customer_profile')  ? 'active' : '' }}"><a href="{{route('customer_profile')}}">Profile</a></li>
                            
                            <li class="account__menu--list {{ Route::is('customer_address')  ? 'active' : '' }}"><a href="{{route('customer_address')}}">Address</a></li>
                             <li class="account__menu--list {{ Route::is('customer_order')  ? 'active' : '' }}"><a href="{{route('customer_order')}}">Order</a></li>
                            
                             <li class="account__menu--list {{ Route::is('customer_wishlist')  ? 'active' : '' }}"><a href="{{route('customer_wishlist')}}">Wishlist</a></li>
                             
                            <li class="account__menu--list {{ Route::is('customer_password')  ? 'active' : '' }}"><a href="{{route('customer_password')}}">Password</a></li>

                            <li class="account__menu--list"><a href="{{ route('signout') }}">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        @include('flash_message')
                        <div class="account__content">
                            
                              <div class="profile_welcome_box">
                            <div class="row">
                                <div class="col-lg-7 col-sm-12 profile_welcome_box_left">
                                    <h3>Hello <span>{{ Auth::user()->name }}</span></h3>
                                    <p>Welcome to <span>Spotlight Attires</span>. Thanks For Shopping</p>
                                </div>
                                <div class="col-lg-5 col-sm-12 profile_welcome_box_right">
                                    <h5>Customer type </h5>
                                    @if($client_type_new == 'Normal')
                <p >{{$client_type_new}} </p>
                @elseif($client_type_new == 'Silver')
                
                <p >{{$client_type_new}} </p>
                @else
                <p >{{$client_type_new}} </p>
                @endif
                                </div>
                            </div>
                        </div>
                        
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
                       
                    </div>
                </form>
            </div>
        </div>
    </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->

        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3 section--padding pt-0">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{asset('/')}}public/shipping1.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{asset('/')}}public/shipping2.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{asset('/')}}public/shipping3.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{asset('/')}}public/shipping4.png" alt="">
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
