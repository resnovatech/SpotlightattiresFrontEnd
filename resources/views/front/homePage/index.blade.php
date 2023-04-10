@extends('front.master.master')

@section('title')
Spotlight Attires
@endsection

@section('body')
  <!-- Start slider section -->
  @include('front.include.banner')
  <!-- End slider section -->

  <!-- Start banner section -->
  <section class="banner__section section--padding">
      <div class="container-fluid">
          <div class="row mb--n28">
              <div class="col-lg-5 col-md-order mb-28">
                  <div class="banner__items">
                      <a class="banner__items--thumbnail position__relative" href="{{ route('categoryProduct',$banner_second_list_one->button_link) }}">
                          <img class="banner__items--thumbnail__img" src="{{$url_name}}{{ $banner_second_list_one->image }}" alt="banner-img">
                          <div class="banner__items--content">
                              <span class="banner__items--content__subtitle">{{ $banner_second_list_one->first_title }}</span>
                              <h2 class="banner__items--content__title h3">{{ $banner_second_list_one->second_title }}</h2>
                              <span class="banner__items--content__link">{{ $banner_second_list_one->button_name}}
                                      <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                          <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                      </svg>
                                  </span>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-7 mb-28">
                  <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-1">
                      <div class="col mb-28">
                          <div class="banner__items">
                              <a class="banner__items--thumbnail position__relative" href="{{ route('categoryProduct',$banner_second_list_two->button_link) }}"><img class="banner__items--thumbnail__img" src="{{$url_name}}{{ $banner_second_list_two->image }}" alt="banner-img">
                                  <div class="banner__items--content">
                                      <span class="banner__items--content__subtitle text__secondary">{{ $banner_second_list_two->first_title }}</span>
                                      <h2 class="banner__items--content__title h3">{{ $banner_second_list_two->second_title }}</h2>
                                      <span class="banner__items--content__link">{{ $banner_second_list_one->button_name}}
                                              <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                  <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                              </svg>
                                          </span>
                                  </div>
                              </a>
                          </div>
                      </div>
                      <div class="col mb-28">
                          <div class="banner__items">
                              <a class="banner__items--thumbnail position__relative" href="{{ route('categoryProduct',$banner_second_list_three->button_link) }}"><img class="banner__items--thumbnail__img" src="{{$url_name}}{{ $banner_second_list_three->image }}" alt="banner-img">
                                  <div class="banner__items--content">
                                      <span class="banner__items--content__subtitle">{{ $banner_second_list_three->first_title }}</span>
                                      <h2 class="banner__items--content__title h3">{{ $banner_second_list_three->second_title }}</h2>
                                      <span class="banner__items--content__link">{{ $banner_second_list_one->button_name}}
                                              <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                  <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                              </svg>
                                          </span>
                                  </div>
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="banner__items">
                      <a class="banner__items--thumbnail position__relative" href="{{ route('categoryProduct',$banner_second_list_four->button_link) }}"><img class="banner__items--thumbnail__img banner__img--max__height" src="{{$url_name}}{{ $banner_second_list_four->image }}" alt="banner-img">
                          <div class="banner__items--content">
                              <span class="banner__items--content__subtitle">{{ $banner_second_list_four->first_title }}</span>
                              <h2 class="banner__items--content__title h3">{{ $banner_second_list_four->second_title }}</h2>
                              <span class="banner__items--content__link">{{ $banner_second_list_one->button_name}}
                                      <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                          <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                      </svg>
                                  </span>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End banner section -->

  <!-- Start product section -->
  <section class="product__section section--padding pt-0">
      <div class="container-fluid">
          <div class="section__heading text-center mb-35">
              <h2 class="section__heading--maintitle">New Products</h2>
          </div>
          <ul class="product__tab--one product__tab--primary__btn d-flex justify-content-center mb-50">
              <li class="product__tab--primary__btn__list active" data-toggle="tab" data-target="#featured">All Product </li>
              <li class="product__tab--primary__btn__list" data-toggle="tab" data-target="#trending">New Product</li>
              <li class="product__tab--primary__btn__list" data-toggle="tab" data-target="#newarrival">Trending Product</li>
          </ul>
          <div class="tab_content">
              <div id="featured" class="tab_pane active show">
                  <div class="product__section--inner">
                      <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">

                        <?php

$get_product_name = DB::table('assaign_categories')->where('cat_name','trending')->select('product_name')->get();

$convert_name_title = $get_product_name->implode("product_name", " ");


$separated_data_title = explode(" ", $convert_name_title);


$feature_product_list = DB::table('main_products')->latest()->limit('10')->get();
    ?>





@foreach($feature_product_list as $all_feature_product_list)


<?php
$feature_image_one =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','desc')->value('filename');
$feature_image_two =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','asc')->value('filename');

?>

                        <div class="col mb-30">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="{{ route('productDetail',$all_feature_product_list->slug) }}">
                                        <img class="product__items--img product__primary--img" src="{{$url_name}}{{ $all_feature_product_list->front_image }}" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="{{$url_name}}{{ $all_feature_product_list->back_image  }}" alt="product-img">
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">{{ $all_feature_product_list->cat_name }}</span>
                                    <h3 class="product__items--content__title h4"><a href="{{ route('productDetail',$all_feature_product_list->slug) }}">{{ $all_feature_product_list->product_name }}</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">৳ {{ $all_feature_product_list->selling_price - $all_feature_product_list->discount}}</span>
                                        {{-- <span class="price__divided"></span>
                                        <span class="old__price">$78</span> --}}
                                    </div>
                                    <ul class="rating product__rating d-flex">
                                        
                                        
                                        <?php  
                                        
                                        
                                        $users_review = DB::table('reviews')->where('product_name',$all_feature_product_list->slug)->where('status','Yes')->latest()->avg('total_star');
                                        
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
                                        
                                        @for ($i = 1  ;$i <= $users_review ; $i++)
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
                                    <ul class="product__items--action d-flex">
                                        
                                        <?php  
                                   

                        $total_quantityM = DB::table('product_colors')
                        ->where('product_name',$all_feature_product_list->id)->sum('quantity');
                                       
                                        
                                        ?>
                                         @if( $total_quantityM >= 1)
                                                                 <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">

                                            <a class="product__items--action__btn add__to--cart" data-open="modal1">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text"> + Add to cart</span>
                                            </a>
                                        </li>                                       
 @else
                                        <li class="product__items--action__list">
                                           
                                            <a class="product__items--action__btn">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">Stock Out</span>
                                            </a>
                                        </li>
                                        @endif
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="{{ route('wishListProductAdd',$all_feature_product_list->id ) }}">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">
                                            <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                      </div>
                  </div>
              </div>
              <div id="trending" class="tab_pane">
                  <div class="product__section--inner">
                      <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                        <?php


                        $get_product_name = DB::table('assaign_categories')->where('cat_name','new_product')->select('product_name')->get();

                        $convert_name_title = $get_product_name->implode("product_name", " ");


                        $separated_data_title = explode(" ", $convert_name_title);


                                                    $feature_product_list1 = DB::table('main_products')
                                                    ->whereIn('slug',$separated_data_title)->latest()->limit('10')->get();
                                                        ?>
                                                        @foreach($feature_product_list1 as $all_feature_product_list)


                                                        <?php
                                                     $feature_image_one =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','desc')->value('filename');
                                                     $feature_image_two =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','asc')->value('filename');

                                                        ?>

                                                                                <div class="col mb-30">
                                                                                    <div class="product__items ">
                                                                                        <div class="product__items--thumbnail">
                                                                                            <a class="product__items--link" href="{{ route('productDetail',$all_feature_product_list->slug) }}">
                                                                                                <img class="product__items--img product__primary--img" src="{{$url_name}}{{ $all_feature_product_list->front_image }}" alt="product-img">
                                                                                                <img class="product__items--img product__secondary--img" src="{{$url_name}}{{ $all_feature_product_list->back_image }}" alt="product-img">
                                                                                            </a>
                                                                                            <div class="product__badge">
                                                                                                <span class="product__badge--items sale">Sale</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product__items--content">
                                                                                            <span class="product__items--content__subtitle">{{ $all_feature_product_list->cat_name }}</span>
                                                                                            <h3 class="product__items--content__title h4"><a href="{{ route('productDetail',$all_feature_product_list->slug) }}">{{ $all_feature_product_list->product_name }}</a></h3>
                                                                                            <div class="product__items--price">
                                                                                                <span class="current__price">৳ {{ $all_feature_product_list->selling_price - $all_feature_product_list->discount }}</span>
                                                                                                {{-- <span class="price__divided"></span>
                                                                                                <span class="old__price">$78</span> --}}
                                                                                            </div>
                                                                                            <ul class="rating product__rating d-flex">
                                                                                                  <?php  
                                        
                                        
                                        $users_review = DB::table('reviews')->where('product_name',$all_feature_product_list->slug)->where('status','Yes')->latest()->avg('total_star');
                                        
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
                                                                                            <ul class="product__items--action d-flex">
                                                                                                  <?php  
                                   

                        $total_quantityM = DB::table('product_colors')
                        ->where('product_name',$all_feature_product_list->id)->sum('quantity');
                                        
                                        
                                        ?>
                                         @if( $total_quantityM >= 1)
                                                                 <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">

                                            <a class="product__items--action__btn add__to--cart" data-open="modal1">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text"> + Add to cart</span>
                                            </a>
                                        </li>                                        
@else
                                        <li class="product__items--action__list">
                                           
                                            <a class="product__items--action__btn">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">Stock Out</span>
                                            </a>
                                        </li>
                                        @endif
                                                                                                <li class="product__items--action__list">
                                                                                                    <a class="product__items--action__btn" href="{{ route('wishListProductAdd',$all_feature_product_list->id ) }}">
                                                                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                                                                                                        <span class="visually-hidden">Wishlist</span>
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">
                                                                                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                                                        <span class="visually-hidden">Quick View</span>
                                                                                                    </a>
                                                                                                </li>

                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                      </div>
                  </div>
              </div>
              <div id="newarrival" class="tab_pane">
                  <div class="product__section--inner">
                      <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                        <?php

                        $get_product_name = DB::table('assaign_categories')->where('cat_name','trending')->select('product_name')->get();

                        $convert_name_title = $get_product_name->implode("product_name", " ");


                        $separated_data_title = explode(" ", $convert_name_title);


                                                    $feature_product_list2 = DB::table('main_products')
                                                    ->whereIn('slug',$separated_data_title)->latest()->limit('10')->get();
                                                        ?>
                                                        @foreach($feature_product_list2 as $all_feature_product_list)


                                                        <?php
                                                     $feature_image_one =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','desc')->value('filename');
                                                     $feature_image_two =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','asc')->value('filename');

                                                        ?>

                                                                                <div class="col mb-30">
                                                                                    <div class="product__items ">
                                                                                        <div class="product__items--thumbnail">
                                                                                            <a class="product__items--link" href="{{ route('productDetail',$all_feature_product_list->slug) }}">
                                                                                                <img class="product__items--img product__primary--img" src="{{$url_name}}{{ $all_feature_product_list->front_image  }}" alt="product-img">
                                                                                                <img class="product__items--img product__secondary--img" src="{{$url_name}}{{ $all_feature_product_list->back_image  }}" alt="product-img">
                                                                                            </a>
                                                                                            <div class="product__badge">
                                                                                                <span class="product__badge--items sale">Sale</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product__items--content">
                                                                                            <span class="product__items--content__subtitle">{{ $all_feature_product_list->cat_name }}</span>
                                                                                            <h3 class="product__items--content__title h4"><a href="{{ route('productDetail',$all_feature_product_list->slug) }}">{{ $all_feature_product_list->product_name }}</a></h3>
                                                                                            <div class="product__items--price">
                                                                                                <span class="current__price">৳ {{ $all_feature_product_list->selling_price - $all_feature_product_list->discount }}</span>
                                                                                                {{-- <span class="price__divided"></span>
                                                                                                <span class="old__price">$78</span> --}}
                                                                                            </div>
                                                                                            <ul class="rating product__rating d-flex">
                                                                                                 <?php  
                                        
                                        
                                        $users_review = DB::table('reviews')->where('product_name',$all_feature_product_list->slug)->where('status','Yes')->latest()->avg('total_star');
                                        
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
                                                                                            <ul class="product__items--action d-flex">
                                                                                                  <?php  
                                   

                        $total_quantityM = DB::table('product_colors')
                        ->where('product_name',$all_feature_product_list->id)->sum('quantity');
                                        
                                        
                                        ?>
                                         @if( $total_quantityM >= 1)
                                                                 <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">

                                            <a class="product__items--action__btn add__to--cart" data-open="modal1">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text"> + Add to cart</span>
                                            </a>
                                        </li>                                        
@else
                                        <li class="product__items--action__list">
                                           
                                            <a class="product__items--action__btn">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">Stock Out</span>
                                            </a>
                                        </li>
                                        @endif
                                                                                                <li class="product__items--action__list">
                                                                                                    <a class="product__items--action__btn" href="{{ route('wishListProductAdd',$all_feature_product_list->id ) }}">
                                                                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                                                                                                        <span class="visually-hidden">Wishlist</span>
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">
                                                                                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                                                        <span class="visually-hidden">Quick View</span>
                                                                                                    </a>
                                                                                                </li>

                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End product section -->

  <!-- Start deals banner section -->
  <section class="deals__banner--section section--padding pt-0">
      <div class="container-fluid">
          <div class="deals__banner--inner banner__bg" style="background: url('{{ $url_name }}{{ $banner_second_list_five->image }}');
          background-repeat: no-repeat;
          background-attachment: scroll;
          background-position: center center;
          background-size: cover;">
              <div class="row row-cols-1 align-items-center">
                  <div class="col">
                      <div class="deals__banner--content position__relative">
                          <span class="deals__banner--content__subtitle text__secondary">{{ $banner_second_list_five->first_title }}</span>
                          <h2 class="deals__banner--content__maintitle">{{ $banner_second_list_five->second_title }}</h2>
                          {{-- <p class="deals__banner--content__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, <br> sed do eiusmod tempor incididunt ut labore </p>
                          <div class="deals__banner--countdown d-flex" data-countdown="Sep 30, 2022 00:00:00"></div> --}}
                          <a class="primary__btn" href="{{ route('categoryProduct',$banner_second_list_five->button_link) }}">{{ $banner_second_list_five->button_name }}
                              <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                  <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                              </svg>
                          </a>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End deals banner section -->

  <!-- Start product section -->
  <section class="product__section section--padding pt-0">
      <div class="container-fluid">
          <div class="section__heading text-center mb-50">
              <h2 class="section__heading--maintitle">Our Best Seller</h2>
          </div>
          <div class="product__section--inner product__swiper--activation swiper">
              <div class="swiper-wrapper">

                <?php

                $get_product_name = DB::table('assaign_categories')->where('cat_name','trending')->select('product_name')->get();

                $convert_name_title = $get_product_name->implode("product_name", " ");


                $separated_data_title = explode(" ", $convert_name_title);


                                            $feature_product_list233 = DB::table('main_products')
                                            ->whereIn('slug',$separated_data_title)->latest()->limit('10')->get();
                                                ?>
                                                @foreach($feature_product_list233 as $all_feature_product_list)


                                                <?php
                                             $feature_image_one =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','desc')->value('filename');
                                             $feature_image_two =DB::table('feature_product_images')->where('product_name',$all_feature_product_list->id)->orderBy('id','asc')->value('filename');

                                                ?>
                  <div class="swiper-slide">
                      <div class="product__items ">
                          <div class="product__items--thumbnail">
                              <a class="product__items--link" href="{{ route('productDetail',$all_feature_product_list->slug) }}">
                                  <img class="product__items--img product__primary--img" src="{{$url_name}}{{ $all_feature_product_list->front_image  }}" alt="product-img">
                                  <img class="product__items--img product__secondary--img" src="{{$url_name}}{{ $all_feature_product_list->back_image  }}" alt="product-img">
                              </a>
                              <div class="product__badge">
                                  <span class="product__badge--items sale">Sale</span>
                              </div>
                          </div>
                          <div class="product__items--content">
                              <span class="product__items--content__subtitle">{{ $all_feature_product_list->cat_name }}</span>
                              <h3 class="product__items--content__title h4"><a href="{{ route('productDetail',$all_feature_product_list->slug) }}">{{ $all_feature_product_list->product_name }}</a></h3>
                              <div class="product__items--price">
                                  <span class="current__price">৳ {{ $all_feature_product_list->selling_price - $all_feature_product_list->discount}}</span>
                                  {{-- <span class="price__divided"></span>
                                  <span class="old__price">$78</span> --}}
                              </div>
                              <ul class="rating product__rating d-flex">
                                    <?php  
                                        
                                        
                                        $users_review = DB::table('reviews')->where('product_name',$all_feature_product_list->slug)->where('status','Yes')->latest()->avg('total_star');
                                        
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
                              <ul class="product__items--action d-flex">
                                     <?php  
                                   

                        $total_quantityM = DB::table('product_colors')
                        ->where('product_name',$all_feature_product_list->id)->sum('quantity');
                                        
                                        
                                        ?>
                                         @if( $total_quantityM >= 1)
                                                                 <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">

                                            <a class="product__items--action__btn add__to--cart" data-open="modal1">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text"> + Add to cart</span>
                                            </a>
                                        </li>                                       
 @else
                                        <li class="product__items--action__list">
                                           
                                            <a class="product__items--action__btn">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                      <g>
                                                        <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                        <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                        <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                      </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">Stock Out</span>
                                            </a>
                                        </li>
                                        @endif
                                  <li class="product__items--action__list">
                                      <a class="product__items--action__btn" href="{{ route('wishListProductAdd',$all_feature_product_list->id ) }}">
                                          <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                                          <span class="visually-hidden">Wishlist</span>
                                      </a>
                                  </li>
                                  <li class="product__items--action__list" data-detailp = "{{ $all_feature_product_list->product_detail }}" data-pricep = "{{ $all_feature_product_list->selling_price }}" data-namep = "{{ $all_feature_product_list->product_name }}" id="qq_view{{ $all_feature_product_list->id }}">
                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>

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

  <!-- Start banner section -->
  <section class="banner__section section--padding pt-0">
      <div class="container-fluid">
          <div class="row row-cols-md-2 row-cols-1 mb--n28">

            @foreach($banner_second_list_six as $all_banner_second_list_six)
              <div class="col mb-28">
                  <div class="banner__items position__relative">
                      <a class="banner__items--thumbnail " href="{{ route('categoryProduct',$all_banner_second_list_six->button_link) }}"><img class="banner__items--thumbnail__img banner__img--max__height" src="{{$url_name}}{{ $all_banner_second_list_six->image }}" alt="banner-img">
                          <div class="banner__items--content">
                              <span class="banner__items--content__subtitle d-none d-lg-block">{{ $all_banner_second_list_six->first_title }}</span>
                              <h2 class="banner__items--content__title h3">{{ $all_banner_second_list_six->second_title }}</h2>
                              <span class="banner__items--content__link"><u>{{ $all_banner_second_list_six->button_name }}</u></span>
                          </div>
                      </a>
                  </div>
              </div>
              @endforeach

          </div>
      </div>
  </section>
  <!-- End banner section -->

  <!-- Start Anim Charecter product section -->
  <!--<section class="new__product--section section--padding pt-0">-->
  <!--    <div class="container-fluid">-->
  <!--        <div class="row">-->
  <!--            <div class="col-lg-4 col-md-5">-->
  <!--                <div class="product__collection--content">-->
  <!--                    <h2 class="product__collection--content__title">Anim<br>-->
  <!--                        Character</h2>-->
  <!--                <p class="product__collection--content__desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro aut accusamus eum accusantium maxime nam repudiandae?</p>-->
  <!--                    <a class="product__collection--content__btn primary__btn btn__style3" href="{{ route('animationCategoryProductList') }}">View More</a>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--            <div class="col-lg-8 col-md-7">-->
  <!--                <div class="new__product--sidebar position__relative">-->
  <!--                    <div class=" product__swiper--column3 swiper">-->
  <!--                        <div class="swiper-wrapper">-->

  <!--                          @foreach($animation_cat_lists as $all_animation_cat_lists)-->
  <!--                            <div class="swiper-slide">-->
  <!--                                <div class="new__product--items">-->
  <!--                                    <div class="new__product--thumbnail">-->
  <!--                                        <a class="new__product--thumbnail__link" href="{{ route('animationCategory',$all_animation_cat_lists->slug) }}">-->
  <!--                                            <img class="new__product--thumbnail__img" src="{{$url_name}}{{ $all_animation_cat_lists->image }}" alt="product-img">-->
  <!--                                        </a>-->
  <!--                                    </div>-->
  <!--                                    <div class="new__product--content">-->
  <!--                                        <h3 class="new__product--content__title"><a href="{{ route('animationCategory',$all_animation_cat_lists->slug) }}">{{ $all_animation_cat_lists->name }}</a></h3>-->
  <!--                                    </div>-->
  <!--                                </div>-->
  <!--                            </div>-->
  <!--                            @endforeach-->

  <!--                        </div>-->
  <!--                    </div>-->
  <!--                    <div class="swiper__nav--btn style3 swiper-button-next"></div>-->
  <!--                    <div class="swiper__nav--btn style3 swiper-button-prev"></div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--    </div>-->
  <!--</section>-->
  <!-- End Anim Charecter product section -->

  <!-- Start testimonial section -->
  <section class="testimonial__section section--padding pt-0">
      <div class="container-fluid">
          <div class="section__heading text-center mb-40">
              <h2 class="section__heading--maintitle">Our Clients Say</h2>
          </div>
          <div class="testimonial__section--inner testimonial__swiper--activation swiper">
              <div class="swiper-wrapper">

                <?php
  $review_list = DB::table('reviews')->where('status','Yes')->latest()->limit(8)->get();

 ?>
@foreach($review_list as $all_review_list)

 <?php
                                                                    $user_name = DB::table('users')->where('id',$all_review_list->user_id )->value('name');

                                                                                                        ?>
                                                                                                    

                  <div class="swiper-slide">
                      <div class="testimonial__items text-center">
                          <div class="testimonial__items--thumbnail">
                              <img class="testimonial__items--thumbnail__img border-radius-50" src="{{asset('/')}}public/front/assets/img/other/testimonial-thumb1.png" alt="testimonial-img">
                          </div>
                          <div class="testimonial__items--content">
                              <h3 class="testimonial__items--title">{{ $user_name}}</h3>
                              <!--<span class="testimonial__items--subtitle">fashion</span>-->
                              <p class="testimonial__items--desc">{{ $all_review_list->des }}</p>
                              <ul class="rating testimonial__rating d-flex justify-content-center">
                                   <?php  
                                        
                                        
                                        $users_review = DB::table('reviews')->where('user_id',$all_review_list->user_id)->where('status','Yes')->latest()->avg('total_star');
                                        
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
                          </div>
                      </div>
                  </div>
@endforeach
              </div>
              <div class="testimonial__pagination swiper-pagination"></div>
          </div>
      </div>
  </section>
  <!-- End testimonial section -->

  <!-- Start banner section -->
  <section class="banner__section section--padding pt-0">
      <div class="container-fluid">
          <div class="row row-cols-1">
              <div class="col">
                  <div class="banner__section--inner position__relative">
                      <a class="banner__items--thumbnail display-block" href="{{ route('categoryProduct',$banner_second_list_seven->button_link) }}"><img class="banner__items--thumbnail__img banner__img--height__md display-block" src="{{$url_name}}{{ $banner_second_list_seven->image }}" alt="banner-img">
                          <div class="banner__content--style2">
                              <h2 class="banner__content--style2__title text-white">{{ $banner_second_list_seven->first_title }}</h2>
                              <p class="banner__content--style2__desc">{{ $banner_second_list_seven->second_title }}</p>
                              <span class="primary__btn">{{ $banner_second_list_seven->button_name }}
                                      <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                      <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                      </svg>
                                  </span>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End banner section -->
  <?php
  $blog_list = DB::table('blogs')->latest()->limit(4)->get();

 ?>
  <!-- Start blog section -->
  <section class="blog__section section--padding pt-0">
      <div class="container-fluid">
          <div class="section__heading text-center mb-40">
              <h2 class="section__heading--maintitle">From The Blog</h2>
          </div>
          <div class="blog__section--inner blog__swiper--activation swiper">
              <div class="swiper-wrapper">
                @foreach($blog_list as $all_blog_list)

                  <div class="swiper-slide">
                      <div class="blog__items">
                          <div class="blog__thumbnail">
                              <a class="blog__thumbnail--link" href="{{ route('blog_view',$all_blog_list->title) }}"><img class="blog__thumbnail--img" src="{{ $url_name }}{{ $all_blog_list->image }}" alt="blog-img"></a>
                          </div> <?php

                          $ddd =$all_blog_list->date;
                         ?>
                          <div class="blog__content">
                              <span class="blog__content--meta">{{date('F d, Y', strtotime($ddd)) }}</span>
                              <h3 class="blog__content--title"><a href="{{ route('blog_view',$all_blog_list->title) }}">{{ $all_blog_list->title }}</a></h3>
                              <a class="blog__content--btn primary__btn" href="{{ route('blog_view',$all_blog_list->title) }}">Read more </a>
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
  <!-- End blog section -->
@endsection
