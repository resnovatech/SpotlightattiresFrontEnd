@extends('front.master.master')

@section('title')

Checkout

@endsection


@section('body')
      <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        {{-- <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Check out</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Check out</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


        <?php

$get_all_address = DB::table('delivary_addresses')
->where('user_id',Auth::user()->id)->value('first_name');





        ?>

<form action="{{route('final_confirm')}}" method="post">
    @csrf
           <!-- Start checkout page area -->
    <div class="checkout__page--area">
        <div class="container">
            <div class="checkout__page--inner d-flex">
                <div class="main checkout__mian">
                    <header class="main__header checkout__mian--header mb-30">

                        <details class="order__summary--mobile__version">
                            <summary class="order__summary--toggle border-radius-5">
                                <span class="order__summary--toggle__inner">
                                    <span class="order__summary--toggle__icon">
                                        <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span class="order__summary--toggle__text show">
                                        <span>Show order summary</span>
                                        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                                    </span>
                                    <span class="order__summary--final__price">৳  {{ \Cart::getTotal() }}</span>
                                </span>
                            </summary>
                            <div class="order__summary--section">
                                <div class="cart__table checkout__product--table">
                                    <table class="summary__table">
                                        <tbody class="summary__table--body">
<?php
  $cartCollection1 = \Cart::getContent();

    ?>

    @foreach($cartCollection1 as $item)

                                            <tr class=" summary__table--items">
                                                <td class=" summary__table--list">
                                                    <div class="product__image two  d-flex align-items-center">
                                                        <div class="product__thumbnail border-radius-5">
                                                            <a href="#"><img class="border-radius-5" src="{{ $url_name }}{{$item->attributes->image }}" alt="cart-product"></a>
                                                            <span class="product__thumbnail--quantity">{{ $item->quantity }}</span>
                                                        </div>
                                                        <div class="product__description">
                                                            <h3 class="product__description--name h4"><a href="#"> {{ $item->name }}</a></h3>
                                                            @if($item->attributes->color == 0)

                                                            @else
                                                            <span class="product__description--variant">Color: {{ $item->attributes->color }}</span>
                                                            @endif

                                                            @if($item->attributes->size == 0)

                                                            @else
                                                            <span class="product__description--variant">COLOR: {{ $item->attributes->size }}</span>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </td>
                                                <td class=" summary__table--list">
                                                    <span class="cart__price">৳ {{ $item->price }}</span>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <div class="checkout__total">
                                    <table class="checkout__total--table">
                                        <tbody class="checkout__total--body">
                                            <tr class="checkout__total--items">
                                                <td class="checkout__total--title text-left">Total </td>
                                                <td class="checkout__total--amount text-right">৳  {{ \Cart::getTotal() }}</td>
                                            </tr>
                                            <tr class="checkout__total--items">
                                                <td class="checkout__total--title text-left">Shipping</td>
                                                <td class="checkout__total--calculated__text text-right">


                                                    @foreach($shipping_details as $key=>$all_ship)
                                                    <input type="radio" class="" id="html{{ $key+1 }}" name="ship_price_c" value="{{ $all_ship->price }}" required>
                                                   <label for="html{{ $key+1 }}">{{ $all_ship->title }} : ৳ {{ $all_ship->price }}</label><br>
                                                   @endforeach

                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </details>
                        <nav>
                            <ol class="breadcrumb checkout__breadcrumb d-flex">
                                <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                                    <a class="breadcrumb__link" href="{{ route('cart') }}">Cart</a>
                                    <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path></svg>
                                </li>

                                <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                    <span class="breadcrumb__text current">Information</span>
                                    <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path></svg>
                                </li>

                                    <li class="breadcrumb__item breadcrumb__item--blank">
                                    <span class="breadcrumb__text">Success</span>
                                </li>
                            </ol>
                            </nav>
                    </header>

                    <!--new code -->

                    @if(empty($get_all_address))
                    <main class="main__content_wrapper">

                            <div class="checkout__content--step section__contact--information">
                                <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                    <h2 class="section__header--title h3">Contact information</h2>

                                </div>
                                <div class="customer__information">
                                    <div class="checkout__email--phone mb-12">
                                       <label>
                                            <input class="checkout__input--field border-radius-5" placeholder="Email or mobile phone mumber" name="ephone" value="{{ Auth::user()->phone }}"  type="text" required>
                                       </label>
                                    </div>

                                </div>
                            </div>
                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h3 class="section__header--title">Shipping address</h3>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-12 mb-12">
                                            <div class="checkout__input--list ">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" name="first_name" value="{{ Auth::user()->name }}"   type="text" required>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address1" name="address"  type="text" required>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Thana/Upozila" name="town"  type="text" required>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="District" name="district"  type="text" required>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Post Code" name="post_code"  type="text" required>
                                                </label>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>


                    </main>
                    @else

                    <?php

                    $get_all_address12 = DB::table('delivary_addresses')
                    ->where('user_id',Auth::user()->id)->first();





                            ?>
                    <main class="main__content_wrapper">

                            <div class="checkout__content--step section__contact--information">
                                <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                    <h2 class="section__header--title h3">Contact information</h2>

                                </div>
                                <div class="customer__information">
                                    <div class="checkout__email--phone mb-12">
                                       <label>
                                            <input class="checkout__input--field border-radius-5" placeholder="Email or mobile phone mumber" name="ephone" value="{{ $get_all_address12->phone }}"  type="text">
                                       </label>
                                    </div>

                                </div>
                            </div>
                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h3 class="section__header--title">Shipping address</h3>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-12 mb-12">
                                            <div class="checkout__input--list ">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" name="first_name" value="{{ $get_all_address12->first_name }}"  type="text">
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address1" name="address" value="{{ $get_all_address12->address }}"  type="text">
                                                </label>
                                            </div>
                                        </div>



                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Thana/Upozila" name="town" value="{{ $get_all_address12->town }}"   type="text" required>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="District" value="{{ $get_all_address12->district }}"  name="district"  type="text" required>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Post Code" value="{{ $get_all_address12->post_code }}"  name="post_code"  type="text" required>
                                                </label>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>


                    </main>


                    @endif
                    <div class="checkout__content--step__footer d-flex align-items-center">

                        <input type="submit" style="margin-bottom: 25px;" class="continue__shipping--btn primary__btn border-radius-5" value="Checkout" />

                        <a style="margin-bottom: 25px;margin-left:5px;" class="continue__shipping--btn primary__btn border-radius-5" href="{{ route('index') }}">Continue To Shopping</a>
                        <a style="margin-bottom: 25px;" class="previous__link--content" href="{{ route('cart') }}">Return to cart</a>
                    </div>
                    <!--end code -->

                </div>
                <aside class="checkout__sidebar sidebar">
                    <div class="cart__table checkout__product--table">
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">

                                @foreach($cartCollection1 as $item)
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two  d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a href="#"><img class="border-radius-5" src="{{ $url_name }}{{$item->attributes->image }}" alt="cart-product"></a>
                                                <span class="product__thumbnail--quantity">{{ $item->quantity }}</span>
                                            </div>
                                            <div class="product__description">
                                                <h3 class="product__description--name h4"><a href="#">{{ $item->name }}</a></h3>
                                                <span class="product__description--variant">COLOR: Blue</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">৳ {{ $item->price }}</span>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="checkout__total">
                        <table class="checkout__total--table">
                            <tbody class="checkout__total--body">
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Total </td>
                                    <td class="checkout__total--amount text-right">৳  {{ \Cart::getTotal() }}</td>
                                </tr>
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Shipping</td>
                                    <td class="checkout__total--calculated__text text-right">
                                        @foreach($shipping_details as $key=>$all_ship)
                                        <input type="radio" class="" id="html{{ $key+1 }}" name="ship_price_c" value="{{ $all_ship->price }}" required>
                                       <label for="html{{ $key+1 }}">{{ $all_ship->title }} : ৳ {{ $all_ship->price }}</label><br>
                                       @endforeach










                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- End checkout page area -->





</form>
        </main

@endsection
