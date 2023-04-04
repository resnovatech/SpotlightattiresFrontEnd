<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>{{ $product_information->product_name }}</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta property="og:url"           content="{{ route('productDetail',['id'=>$product_information->slug]) }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{ $product_information->product_name}}" />
  <meta property="og:description"   content="{{ $product_information->product_detail}}"  />
  <meta property="og:image"         content="{{$url_name}}{{ $product_information->front_image}}" />
  <link rel="shortcut icon" type="image/x-icon" href="{{$url_name}}{{ $icon }}">

   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="{{ asset('/') }}public/front/assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}public/front/assets/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <link rel="stylesheet" href="{{ asset('/') }}public/front/assets/css/vendor/bootstrap.min.css">

  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="{{ asset('/') }}public/front/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" integrity="sha512-RgUjDpwjEDzAb7nkShizCCJ+QTSLIiJO1ldtuxzs0UIBRH4QpOjUU9w47AF9ZlviqV/dOFGWF6o7l3lttEFb6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <style>


    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
    }
    .rate:not(:checked) > input {
    position:absolute;
    display: none;
    }
    .rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
    }
    .rate:not(:checked) > label:before {
    content: '★ ';
    }
    .rate > input:checked ~ label {
    color: #fe7c00;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
    color: #fe7c00;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
    color: #fe7c00;
    }
    .rating-container .form-control:hover, .rating-container .form-control:focus{
    background: #fff;
    border: 1px solid #ced4da;
    }
    .rating-container textarea:focus, .rating-container input:focus {
    color: #000;
    }
</style>

</head>

<body>

    <!-- Start preloader -->
    @include('front.include.load')
    <!-- End preloader -->

   <!-- Start header area -->
<header class="header__section">
    <!-- Top Header -->
    @include('front.include.header')
    <!-- End Top Header -->
    <!-- Main Header -->

    @include('front.include.main_header')
    <!-- End Main Header -->
    <!-- Bottom Header -->

    @include('front.include.header_bottom')
    <!-- End Bottom Header -->

    <!-- Start Offcanvas header menu -->

    @include('front.include.offcanvas_header_menu_sidebar')
    <!-- End Offcanvas header menu -->

    <!-- Start Offcanvas stikcy toolbar -->


    @include('front.include.offcanvas_sticky_mobile_header')
    <!-- End Offcanvas stikcy toolbar -->

    <!-- Start offCanvas minicart -->


    @include('front.include.offcanvas_minicart_sidebar')


    <!-- End offCanvas minicart -->

    <!-- Start serch box area -->


    @include('front.include.predictivemobile_serach_box')
    <!-- End serch box area -->
</header>
<!-- End header area -->

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        {{-- <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Product Details</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Product Details</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End breadcrumb section -->

        <!-- Start product details section -->
        <section class="product__details--section section--padding">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="product__details--media">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ $url_name }}{{ $product_information->front_image }}"><img class="product__media--preview__items--img" src="{{ $url_name }}{{ $product_information->front_image }}" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="{{ $url_name }}{{ $product_information->front_image }}" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ $url_name }}{{ $product_information->back_image }}"><img class="product__media--preview__items--img" src="{{ $url_name }}{{ $product_information->back_image }}" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="{{ $url_name }}{{ $product_information->back_image }}" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach($feature_image_all as $all_feature_image_all)
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ $url_name }}{{ $all_feature_image_all->filename }}"><img class="product__media--preview__items--img" src="{{ $url_name }}{{ $all_feature_image_all->filename }}" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="{{ $url_name }}{{ $all_feature_image_all->filename }}" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="{{ $url_name }}{{ $product_information->front_image}}" alt="product-nav-img">
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="{{ $url_name }}{{ $product_information->back_image}}" alt="product-nav-img">
                                        </div>
                                    </div>
                                    @foreach($feature_image_all as $all_feature_image_all)
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="{{ $url_name }}{{ $all_feature_image_all->filename }}" alt="product-nav-img">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product__details--info">
                            <form action="{{ route('add_to_card_from_single_product_view') }}" method="post">
                                @csrf
                                <h2 class="product__details--info__title mb-15">{{ $product_information->product_name }}</h2>
                                <div class="product__details--info__price mb-10">
                                    <input type="hidden" value="{{ $product_information->selling_price }}" name="s_price"/>
<input type="hidden" value="{{ $product_information->id }}" name="m_id"/>
                                    <span class="current__price">৳ {{ $product_information->selling_price }}</span>
                                    {{-- <span class="price__divided"></span>
                                    <span class="old__price">$178</span> --}}
                                </div>
                                <div class="product__details--info__rating d-flex align-items-center mb-15">
                                    <ul class="rating d-flex justify-content-center">
                                      
                                    <?php  
                                        
                                        
                                        $users_review = DB::table('reviews')->where('product_name',$product_information->slug)->where('status','Yes')->latest()->avg('total_star');
                                        
                                        //dd($users_review);
                                        
                                        ?>
                                        @if(empty($users_review))
                                        
                                                                                @for ($i = 1 ; $i <= 4 ; $i++)
<li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
@endfor
                                        
                                        @else
                                        
                                        @for ($i = 1 ; $i <= $users_review ; $i++)
<li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
@endfor
@endif
                              
                                    </ul>
                                    <span class="product__items--rating__count--number">(
                                    
                                    @if($total_review_list_count == 0 )
                                    
                                    2
                                    
                                    @else
                                    
                                    {{$total_review_list_count}}
                                    
                                    @endif
                                    )</span>
                                </div>
                                <p class="product__details--info__desc mb-15">  {!! Str::limit($product_information->product_detail, 50) !!}</p>
                                <div class="product__variant">
                                    <div class="product__variant--list mb-10">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">Color :</legend>
                                            @foreach($assaign_color_all as $key=>$all_assaign_color_all)

                                            <?php

                                            $color_code =  DB::table('attribute_details')->where('name_list',$all_assaign_color_all->color_id)->value('name_code');

                                            ?>

@if(($key+1) == 1)

                                            <input id="color-red{{ $key+1 }}" value="{{ $all_assaign_color_all->color_id }}" name="color" type="radio" checked>
                                            <label class="variant__color--value red" for="color-red{{ $key+1 }}" style="background-color: {{ $color_code }}"></label>
                                            @else
                                            <input id="color-red{{ $key+1 }}" value="{{ $all_assaign_color_all->color_id }}" name="color" type="radio" >
                                            <label class="variant__color--value red" for="color-red{{ $key+1 }}" style="background-color: {{ $color_code }}"></label>
                                            @endif
@endforeach

                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <fieldset class="variant__input--fieldset weight">
                                            <legend class="product__variant--title mb-8">Size :</legend>

                                            @foreach($assaign_size_all as $key=>$all_assaign_size_all)

                                            @if(($key+1) == 1)
                                            <input id="weight{{ $key+1 }}" name="weight" type="radio" value="{{ $all_assaign_size_all->size_name }}" checked>
                                            <label class="variant__size--value red" for="weight{{ $key+1 }}">{{ $all_assaign_size_all->size_name }}</label>
                                            @else

                                            <input id="weight{{ $key+1 }}" name="weight" type="radio" value="{{ $all_assaign_size_all->size_name }}" >
                                            <label class="variant__size--value red" for="weight{{ $key+1 }}">{{ $all_assaign_size_all->size_name }}</label>

                                            @endif
                                            @endforeach

                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity " aria-label="quantity value" id="mi" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" name="quantity" class="quantity__number quickview__value--number" value="1" id="gv" />
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity " aria-label="quantity value" id="pl" value="Increase Value">+</button>
                                        </div>
                                         <?php  
                                   

                        $total_quantityM = DB::table('product_colors')
                        ->where('product_name',$product_information->id)->count();
                                        
                                        
                                        ?>
                                           @if( $total_quantityM >= 1)
                                        <button class="quickview__cart--btn primary__btn" value="add_to_cart" name="b_value" type="submit">Add To Cart</button>
                                        @else
                                             <button class="quickview__cart--btn primary__btn" value="add_to_cart" name="b_value" disabled>Stock Out</button>
                                        @endif
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <a class="variant__wishlist--icon mb-15" href="{{ route('wishListProductAdd',$product_information->id ) }}" title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                            Add to Wishlist
                                        </a>
                                         @if( $total_quantityM >= 1)
                                        <button class="variant__buy--now__btn primary__btn" value="buy_it_now" name="b_value" type="submit">Buy it now</button>
                                        @else
                                        <button class="variant__buy--now__btn primary__btn" value="buy_it_now" name="b_value" disabled>Buy it now</button>
                                        @endif
                                    </div>
                                    <div class="product__details--info__meta">
                                        <p class="product__details--info__meta--list"><strong>Sku:</strong>  <span>{{ $product_information->sku_product }}</span> </p>
                                        <p class="product__details--info__meta--list"><strong>Type:</strong>  <span>{{ $product_information->cat_name }}</span> </p>
                                    </div>
                                </div>
                                <div class="quickview__social d-flex align-items-center mb-15">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://twitter.com/intent/tweet?url={{urlencode(url()->current()) }}">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                                {{-- <div class="guarantee__safe--checkout">
                                    <h5 class="guarantee__safe--checkout__title">Guaranteed Safe Checkout</h5>
                                    <img class="guarantee__safe--checkout__img" src="{{ asset('/') }}public/front/assets/img/other/safe-checkout.png" alt="Payment Image">
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product details section -->

        <!-- Start product details tab section -->
        <section class="product__details--tab__section section--padding">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <ul class="product__details--tab d-flex mb-30">
                            <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">Additional Info</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#reviews">Description</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#information">Reviews</li>

                        </ul>
                        <div class="product__details--tab__inner border-radius-10">
                            <div class="tab_content">
                                <div id="description" class="tab_pane active show">
                                    <div class="product__tab--content">
                                        <div class="product__tab--content__step mb-30">
                                            {{-- <h2 class="product__tab--content__title h4 mb-10">Nam provident sequi</h2> --}}
                                            <p class="product__tab--content__desc"><style>

                                                th, td {
                                                  padding-top: 10px;
                                                  padding-bottom: 10px;
                                                  padding-left: 10px;
                                                  padding-right: 10px;
                                                }
                                                </style>
                                            <table style="padding: 2px;">
                                                <tr>
                                                    <th>
                                                        Size
                                                    </th>
                                                    <th>
                                                        Length
                                                    </th>

                                                    <th>
                                                        Width
                                                    </th>

                                                    <th>
                                                        Shoulder
                                                    </th>

                                                    <th>
                                                        Sleeve
                                                    </th>
                                                </tr>

                                                @foreach($total_quantity as $all_total_quantity)

                                                <tr style="text-align:center;">
                                                    <td>

                                                        {{$all_total_quantity->size_name}}

                                                        </td>
                                                    <td>

                                                        {{$all_total_quantity->lenght}}

                                                        </td>
                                                    <td>

                                                        {{$all_total_quantity->width}}

                                                        </td>
                                                    <td>

                                                        @if($all_total_quantity->shoulder == 0)


                                                        @else
                                                        {{$all_total_quantity->shoulder}}
                                                        @endif

                                                        </td>
                                                    <td>

                                                         @if($all_total_quantity->chest == 0)


                                                        @else

                                                        {{$all_total_quantity->chest}}

                                                        @endif

                                                        </td>

                                                </tr>
                                                @endforeach

                                            </table></p>
                                        </div>

                                    </div>
                                </div>
                                <div id="reviews" class="tab_pane">
                                    <div class="product__tab--conten">
                                        <div class="product__tab--content__step mb-30">
                                            {{-- <h2 class="product__tab--content__title h4 mb-10">Nam provident sequi</h2> --}}
                                            <p class="product__tab--content__desc"> {!!$product_information->product_detail !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="information" class="tab_pane">

<div class="row mb-4">
                                    <div class="col-xl-12 col-lg-12 mb-4">
                                        <div class="review-form-wrapper">
                                            <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your Review
                                            </h3>
                                            <p class="mb-3">@include('flash_message')</p>
                                            <form action="{{ route('post_review') }}" method="POST" class="review-form">
@csrf
                                                <input type="hidden"  name="product_name" value="{{ $product_information->slug }}" />

                                                <textarea cols="30" rows="6" placeholder="Write Your Review Here..."
                                                    class="form-control" id="review" name="review"></textarea>
                                                <div class="row gutter-md">
                                                    <div class="col-sm-12">
                                                        <div class="rate">
                                                           <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                           <label for="star5" title="text">5 stars</label>
                                                           <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                           <label for="star4" title="text">4 stars</label>
                                                           <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                           <label for="star3" title="text">3 stars</label>
                                                           <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                           <label for="star2" title="text">2 stars</label>
                                                           <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                           <label for="star1" title="text">1 star</label>
                                                        </div>
                                                     </div>
                                                    {{-- <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Your Name"
                                                            id="author">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Your Email"
                                                            id="email_1">
                                                    </div> --}}
                                                </div>
                                                {{-- <div class="form-group">
                                                    <input type="checkbox" class="custom-checkbox" id="save-checkbox">
                                                    <label for="save-checkbox">Save my name, email, and website in this
                                                        browser for the next time I comment.</label>
                                                </div> --}}
                                                <button type="submit" class="btn btn-dark">Submit Review</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a href="#show-all" class="nav-link active">All Reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="show-all">
                                            <ul class="comments list-style-none">
                                                @foreach($total_review_list as $all_reiew_list)
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        {{-- <figure class="comment-avatar">
                                                            <img src="assets/images/agents/1-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure> --}}
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">
                                                                    <?php
                                                                    $user_name = DB::table('users')->where('id',$all_reiew_list->user_id )->value('name');

                                                                                                        ?>
                                                                                                    {{ $user_name}}
                                                                </a>
                                                                <span class="comment-date">{{ $all_reiew_list->created_at->format('d.m.Y') }} at {{ $all_reiew_list->create_time }}</span>
                                                            </h4>
                                                            <p>{{ $all_reiew_list->des }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product details tab section -->

       <!-- Start product section -->
        <section class="product__section product__section--style3 section--padding">
            <div class="container product3__section--container">
                <div class="section__heading text-center mb-50">
                    <h2 class="section__heading--maintitle">You may also like</h2>
                </div>
                <div class="product__section--inner product__swiper--column4__activation swiper">
                    <div class="swiper-wrapper">
                        @foreach($catch_product_name_first as $all_feature_product_list)

                        <?php
                        $feature_image_one =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','desc')->value('filename');
                        $feature_image_two =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','asc')->value('filename');

                           ?>

                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="{{ route('productDetail',$all_feature_product_list->slug) }}">
                                        <img class="product__items--img product__primary--img" src="{{ $url_name }}{{ $all_feature_product_list->front_image }}" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="{{ $url_name }}{{ $all_feature_product_list->back_image }}" alt="product-img">
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">{{ $all_feature_product_list->cat_name }}</span>
                                    <h4 class="product__items--content__title"><a href="{{ route('productDetail',$all_feature_product_list->slug) }}">{{ $all_feature_product_list->product_name }}</a></h4>
                                    <div class="product__items--price">
                                        <span class="current__price">৳ {{ $all_feature_product_list->selling_price }}</span>
                                        {{-- <span class="price__divided"></span>
                                        <span class="old__price">$68</span> --}}
                                    </div>

                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" id="add_to_cart_m{{ $all_feature_product_list->id }}">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text"  > + Add to cart</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="{{ route('wishListProductAdd',$all_feature_product_list->id ) }}">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        {{-- <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">
                                            <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li> --}}


                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!-- End product section -->

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

    <!-- Start footer section -->
    <!-- Start footer section -->

@include('front.include.footer')
<!-- End footer section -->
    <!-- End footer section -->

    <!-- Quickview Wrapper -->

    <!-- Quickview Wrapper End -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

  <!-- All Script JS Plugins here  -->
  <script src="{{ asset('/') }}public/front/assets/js/vendor/popper.js" defer="defer"></script>
  <script src="{{ asset('/') }}public/front/assets/js/vendor/bootstrap.min.js" defer="defer"></script>
  <script src="{{ asset('/') }}public/front/assets/js/plugins/swiper-bundle.min.js"></script>
  <script src="{{ asset('/') }}public/front/assets/js/plugins/glightbox.min.js"></script>

  <!-- Customscript js -->
  <script src="{{ asset('/') }}public/front/assets/js/script.js"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script>

$("#mi").click(function(){



var get_value_first = parseInt($('#gv').val());

if(isNaN(get_value_first)){



    var get_value2 = parseInt($('#gv').val(1));

    var get_value = 1;

}

else{


    if(get_value_first == 0){
        var get_value2 = parseInt($('#gv').val(0));
        var get_value = parseInt(0);
    }else{
        var get_value2 = parseInt($('#gv').val(get_value_first-1));
        var get_value = parseInt(get_value_first-1);

    }


    // var get_value = parseInt(get_value_first-1);

}
// alert(get_value);


});
////

$("#pl").click(function(){

// alert(22);

var get_value_first = parseInt($('#gv').val());

if(isNaN(get_value_first)){



    var get_value2 = parseInt($('#gv').val(1));

    var get_value = 1;

}

else{
    var get_value2 = parseInt($('#gv').val(get_value_first+1));

    var get_value = parseInt(get_value_first+1);

}


});
</script>
    <script>
    $(function() {
         $('#MainSearchNew').hide();
    $("#product_name").keyup(function(){
        var category_name = $('#category_name').val();
        var product_name = $(this).val();
        var product_name_length = $(this).val().length;
        //alert(product_name_length);

         $.ajax({
        url: "{{ route('search_product_ajax') }}",
        method: 'GET',
        data: {category_name:category_name,product_name:product_name},
        success: function(data) {
            
            if(product_name_length == 0){
                $('#MainSearchNew').hide();
            }else{
               $('#MainSearchNew').show();
            }
  
           // console.log(data);
                $('#search_area').html('');
               $('#search_area').html(data);
        }
        });

    });
});

</script>

<script>
    $(document).ready(function(){



        ////add to cart multiple
        $("[id^=add_to_cart_m]").click(function(){

            var currentId  = $(this).attr('id');
            var after_string_slice_id = currentId.slice(13);

            //alert(after_string_slice_id);


            $.ajax({
url: "{{ route('add_to_card_all_product') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

$("#main_sidebar").html('');
$('#main_sidebar').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Added To Cart!');

}

});

//////////


$.ajax({
url: "{{ route('add_to_cart_count_new') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

    $("#main_cart_count1").html('');
$('#main_cart_count1').html(data);


    $("#main_cart_count2").html('');
$('#main_cart_count2').html(data);

$("#main_cart_count3").html('');
$('#main_cart_count3').html(data);



}

});

    });
        ///end add to cart multiple



        $("#single_page_cart_value").click(function(){


            alert('22')


        });


        $("#quick_view_add_to_card").click(function(){


            // var id_for_pass = $('#product_id_quickview').val();

            // alert(id_for_pass);


        });

        ///new cart code
        $("[id^=cart_button]").click(function(){


            var currentId  = $(this).attr('id');
            var after_string_slice_id = currentId.slice(11);

            //alert(after_string_slice_id);


            $.ajax({
url: "",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

$("#cart_main_table").html('');
$('#cart_main_table').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Added To Cart!');

}

});

//////////


$.ajax({
url: "",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

    $("#main_cart_count1").html('');
$('#main_cart_count1').html(data);


    $("#main_cart_count2").html('');
$('#main_cart_count2').html(data);

$("#main_cart_count3").html('');
$('#main_cart_count3').html(data);



}

});




        });

        ///end new cart code
      $("[id^=qq_view]").click(function(){
         var pname = $(this).attr('data-namep');
         var pprice = $(this).attr('data-pricep');
        var pdetail = $(this).attr('data-detailp');
        // var pid = $(this).attr('data-pid');

       var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(7);

       //alert(id_for_pass);

    //    $('#product_name').html('');
    //    $('#product_price').html('');
    //    $('#product_detail').html('');

       $('#product_name').html(pname);
        $('#product_price').html('৳'+' '+ pprice);
        $('#product_detail').html('');


        $('#product_id_quickview').val(id_for_pass);








       // $('#mm1[href=""]').attr('href',url_main);
       // $('#mm2[src=""]').attr('src',url_main);

        //$('#mm3[href=""]').attr('href',url_main);







        //alert(url_main);

        $.ajax({
        url: "{{ route('quick_view_data') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });


        $.ajax({
        url: "{{ route('quick_view_data1') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table1").html('');
          $("#main_content_table1").html(data);
        }
        });



        $.ajax({
        url: "{{ route('quick_view_data2') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table2").html('');
          $("#main_content_table2").html(data);
        }
        });


        $.ajax({
        url: "{{ route('quick_view_data3') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table3").html('');
          $("#main_content_table3").html(data);
        }
        });


      });
    });
    </script>

  <script>
   $(function() {
        $('#MainSearchMobile').hide();
    $("#search_product_in_mobile").keyup(function(){
        var search_product_in_mobile = $('#search_product_in_mobile').val();
        
        
        var search_product_in_mobile_length = $('#search_product_in_mobile').val().length;

        //alert(email);

         $.ajax({
        url: "{{ route('mobile_search_product') }}",
        method: 'GET',
        data: {search_product_in_mobile:search_product_in_mobile},
        success: function(data) {
if(search_product_in_mobile_length == 0){
                $('#MainSearchMobile').hide();
            }else{
               $('#MainSearchMobile').show();
            }

               $('#search_area_new').html('');
               $('#search_area_new').html(data);
        }
        });

    });
});

</script>

  <script>
    $(document).ready(function(){
          $("[id^=increase_data_from_side_bar]").click(function(){
              
              
                var currentId  = $(this).attr('id');
                var after_string_slice_id = currentId.slice(27);
                
                 var previous_cart_quantity  = parseInt($('#main_cart_count1').html());
                 
                 var get_main_value = parseInt(previous_cart_quantity+1);
                 
                 var main_quantity = $('#sidebarQuantity'+after_string_slice_id).val()
                 
                 var final_quantity = parseInt(main_quantity+1);
                
                //alert(main_quantity);
                
                $('#main_cart_count1').html(get_main_value);
                $('#main_cart_count2').html(get_main_value);
               $('#main_cart_count3').html(get_main_value);
               
                  $.ajax({
url: "{{ route('add_to_card_all_product') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

$("#main_sidebar").html('');
$('#main_sidebar').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Added To Cart!');

}

});

               
               
               
              
          });
          
          ///////
          
           $("[id^=dcrease_data_from_side_bar]").click(function(){
              
              
                var currentId  = $(this).attr('id');
                var after_string_slice_id = currentId.slice(26);
                
                //alert(after_string_slice_id);
                
                  var previous_cart_quantity  = parseInt($('#main_cart_count1').html());
                 
                 var get_main_value = parseInt(previous_cart_quantity-1);
                
           
                 
                 
                
               var main_quantity = $('#sidebarQuantity'+after_string_slice_id).val()
                 
                 var final_quantity = parseInt(main_quantity-1);
                 
                // alert(final_quantity);
                
            $('#main_cart_count1').html(get_main_value);
            $('#main_cart_count2').html(get_main_value);
            $('#main_cart_count3').html(get_main_value);
            
            if(final_quantity == 0){
                
                               $.ajax({
url: "{{ route('delete_from_sidebar_new') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

$("#main_sidebar").html('');
$('#main_sidebar').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Delete From Cart!');

}

});
                
            }else{
                               $.ajax({
url: "{{ route('dcrease_data_from_side_bar') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id,'final_quantity':final_quantity
},
success: function (data) {

$("#main_sidebar").html('');
$('#main_sidebar').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Remove From Cart!');

}

});
                
            }
              
              
          });
  
    });
    </script>
</body>
</html>
