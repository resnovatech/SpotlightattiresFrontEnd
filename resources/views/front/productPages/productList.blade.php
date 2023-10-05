@extends('front.master.master')

@section('title')
{{ $cat_name }}
@endsection


@section('body')
<style>





input:checked + label {
    border: solid 1px red;
    color: #F00;
}

input.checkbox{
    display: none;
}

/* new stuff */
.check {
    visibility: hidden;
}

input:checked + label .check {
    visibility: visible;
}

input.checkbox:checked + label:before {
    content: "";
}
</style>
<main class="main__content_wrapper">

      <!-- Start breadcrumb section -->
      <section class="breadcrumb__section breadcrumb__bg" style="background: url('{{ $url_name }}{{ $get_all_system_informationb}}');">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Spotlight Attires</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="#">Home</a>
                            </li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start shop section -->
     <!-- Start offcanvas filter sidebar -->
 <div class="offcanvas__filter--sidebar widget__area">
    <button type="button" class="offcanvas__filter--close" data-offcanvas>
        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg> <span class="offcanvas__filter--close__text">Close</span>
    </button>
    <div class="offcanvas__filter--sidebar__inner">
        <div class="single__widget widget__bg">
            <h2 class="widget__title h3">Categories</h2>
            <ul class="widget__categories--menu">
                   @foreach($main_category as $all_main_category)
                                
                                <li class="widget__categories--menu__list">
                                    <a href="{{route('categoryProduct',$all_main_category->cat_name)}}" >
                                    <label class="widget__categories--menu__label d-flex align-items-center">
<img class="widget__categories--menu__img"
                                             src="{{ $url_name }}{{ $all_main_category->icon }}" alt="categories-img">

                                                                          <span class="widget__categories--menu__text">{{$all_main_category->cat_name}}</span></a>

                                                                        </label>

                                 
</a>
                                </li>

                                @endforeach
            </ul>
        </div>
        <!--<div class="single__widget widget__bg">-->
        <!--    <h2 class="widget__title h3">Size</h2>-->
        <!--    <ul class="widget__form--check">-->
        <!--        @foreach($size_atttribute as $key=>$all_size_atttribute)-->
        <!--                        <li class="widget__form--check__list">-->
        <!--                            <label class="widget__form--check__label" for="size_value{{ $key+1 }}">{{ $all_size_atttribute->name_list }}</label>-->
        <!--                            <input class="widget__form--check__input" name="size[]" id="size_value{{ $key+1 }}" value="{{ $all_size_atttribute->name_list }}" type="checkbox">-->
        <!--                            <span class="widget__form--checkmark"></span>-->
        <!--                        </li>-->
        <!--                        @endforeach-->
        <!--    </ul>-->
        <!--</div>-->
        <!--<div class="single__widget price__filter widget__bg">-->
        <!--    <h2 class="widget__title h3">Filter By Price</h2>-->

        <!--                        <div class="price__filter--form__inner mb-15 d-flex align-items-center">-->
        <!--                            <div class="price__filter--group">-->
        <!--                                <label class="price__filter--label" for="Filter-Price-GTE2">From</label>-->
        <!--                                <div class="price__filter--input border-radius-5 d-flex align-items-center">-->
        <!--                                    <span class="price__filter--currency">৳</span>-->
        <!--                                    <label>-->
        <!--                                        <input class="price__filter--input__field border-0"-->
        <!--                                               type="number" name="from" id="min_price" placeholder="0" min="0"-->
        <!--                                               >-->
        <!--                                    </label>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="price__divider">-->
        <!--                                <span>-</span>-->
        <!--                            </div>-->
        <!--                            <div class="price__filter--group">-->
        <!--                                <label class="price__filter--label" for="Filter-Price-LTE2">To</label>-->
        <!--                                <div class="price__filter--input border-radius-5 d-flex align-items-center">-->
        <!--                                    <span class="price__filter--currency">৳</span>-->
        <!--                                    <label>-->
        <!--                                        <input class="price__filter--input__field border-0"-->
        <!--                                               name="to" type="number" id="max_price" min="0"-->
        <!--                                               placeholder="250" >-->
        <!--                                    </label>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--</div>-->
        <!--<div class="single__widget widget__bg">-->
        <!--    <h2 class="widget__title h3">Color</h2>-->
        <!--    <ul class="widget__tagcloud">-->


        <!--        @foreach($color_atttribute as $key=>$all_color_atttribute)-->
        <!--        <li class="widget__tagcloud--list">-->

        <!--        <input class="checkbox" id="color_value{{ $key+1 }}" type="checkbox" name="color[]" value="{{ $all_color_atttribute->name_list}}" name="lists" />-->
        <!--        <label for="color_value{{ $key+1 }}" class="widget__tagcloud--link"><span class="check">✓</span>{{ $all_color_atttribute->name_list}}</label>-->

        <!--        <li>-->
        <!--       @endforeach-->


        <!--    </ul>-->
        <!--</div>-->
    </div>
</div>
<!-- End offcanvas filter sidebar -->
    <section class="shop__section section--padding">
        <div class="container-fluid">
            <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
                <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas>
                    <svg class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/>
                        <circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="28"/>
                        <circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="28"/>
                        <circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="28"/>
                    </svg>
                 
                </button>
                <div class="product__view--mode d-flex align-items-center">
                    {{-- <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                        <label class="product__view--label">Sort By :</label>
                        <div class="select shop__header--select">
                            <select class="product__view--select">
                                <option selected value="1">Sort by latest</option>
                                <option value="2">Sort by popularity</option>
                               <option value="3">Sort by newness</option>
                                <option value="4">Sort by rating</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                {{-- <p class="product__showing--count">Showing 21 results</p> --}}
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                        <form class="price__filter--form" action="{{ route('search_filter_data') }}" method="get" enctype="multipart/form-data">

                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Categories</h2>
                            <ul class="widget__categories--menu">

<a href="{{url('shop')}}" >
                                <li class="widget__categories--menu__list">
                                    <label class="widget__categories--menu__label d-flex align-items-center">
<img class="widget__categories--menu__img"
                                             src="https://adminpanel.spotlightattires.com/public/uploads/soccer-jersey.png" alt="categories-img">

                                                                          <span class="widget__categories--menu__text">All</span></a>

                                                                        </label>

                                 

                                </li>
</a>
                        

                                @foreach($main_category as $all_main_category)
                                
                                <li class="widget__categories--menu__list">
                                    <a href="{{route('categoryProduct',$all_main_category->cat_name)}}" >
                                    <label class="widget__categories--menu__label d-flex align-items-center">
<img class="widget__categories--menu__img"
                                             src="{{ $url_name }}{{ $all_main_category->icon }}" alt="categories-img">

                                                                          <span class="widget__categories--menu__text">{{$all_main_category->cat_name}}</span></a>

                                                                        </label>

                                 
</a>
                                </li>

                                @endforeach
                               
                                
                            </ul>
                        </div>
                        <!--<div class="single__widget widget__bg">-->
                        <!--    <h2 class="widget__title h3">Size</h2>-->
                        <!--    <ul class="widget__form--check">-->
                        <!--        @foreach($size_atttribute as $key=>$all_size_atttribute)-->
                        <!--        <li class="widget__form--check__list">-->
                        <!--            <label class="widget__form--check__label" for="size_value{{ $key+1 }}">{{ $all_size_atttribute->name_list }}</label>-->
                        <!--            <input class="widget__form--check__input" name="size[]" id="size_value{{ $key+1 }}" value="{{ $all_size_atttribute->name_list }}" type="checkbox">-->
                        <!--            <span class="widget__form--checkmark"></span>-->
                        <!--        </li>-->
                        <!--        @endforeach-->
                        <!--    </ul>-->
                        <!--</div>-->
                        <!--<div class="single__widget price__filter widget__bg">-->
                        <!--    <h2 class="widget__title h3">Filter By Price</h2>-->

                        <!--        <div class="price__filter--form__inner mb-15 d-flex align-items-center">-->
                        <!--            <div class="price__filter--group">-->
                        <!--                <label class="price__filter--label" for="Filter-Price-GTE2">From</label>-->
                        <!--                <div class="price__filter--input border-radius-5 d-flex align-items-center">-->
                        <!--                    <span class="price__filter--currency">৳</span>-->
                        <!--                    <label>-->
                        <!--                        <input class="price__filter--input__field border-0"-->
                        <!--                               type="number" name="from" id="min_price" placeholder="0" min="0"-->
                        <!--                               >-->
                        <!--                    </label>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="price__divider">-->
                        <!--                <span>-</span>-->
                        <!--            </div>-->
                        <!--            <div class="price__filter--group">-->
                        <!--                <label class="price__filter--label" for="Filter-Price-LTE2">To</label>-->
                        <!--                <div class="price__filter--input border-radius-5 d-flex align-items-center">-->
                        <!--                    <span class="price__filter--currency">৳</span>-->
                        <!--                    <label>-->
                        <!--                        <input class="price__filter--input__field border-0"-->
                        <!--                               name="to" type="number" id="max_price" min="0"-->
                        <!--                               placeholder="250" >-->
                        <!--                    </label>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->


                        <!--</div>-->
                        <!--<div class="single__widget widget__bg">-->
                        <!--    <h2 class="widget__title h3">Color</h2>-->
                        <!--    <ul class="widget__tagcloud">-->


                        <!--        @foreach($color_atttribute as $key=>$all_color_atttribute)-->
                        <!--        <li class="widget__tagcloud--list">-->

                        <!--        <input class="checkbox" id="color_value{{ $key+1 }}" type="checkbox" name="color[]" value="{{ $all_color_atttribute->name_list}}" name="lists" />-->
                        <!--        <label for="color_value{{ $key+1 }}" class="widget__tagcloud--link"><span class="check">✓</span>{{ $all_color_atttribute->name_list}}</label>-->

                        <!--        <li>-->
                        <!--       @endforeach-->


                        <!--    </ul>-->
                        <!--</div>-->
                       
                    </form>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="shop__header bg__gray--color mb-30">
                        <div class="d-flex justify-content-start">
                            <!--<div class="filter-text">-->
                            <!--    <p>Filtered By:</p>-->
                            <!--</div>-->

                            <!--<div class="filter-box">-->
                            <!--    <div class="d-flex">-->
                            <!--        <span class="pe-2" id="f_list">{{ $cat_name }}</span>                                </div>-->
                            <!--</div>-->
                            {{--<div class="filter-box">
                                <div class="d-flex">
                                    <span class="pe-2">Denim Jacket</span>
                                    <a href=""><img src="assets/img/icon/pngwing.com.png" alt=""></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="shop__product--wrapper"  id="main_content_table_filter">
                        <div class="product__section--inner product__grid--inner">
                            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30">

                               @foreach($main_product as $all_feature_product_list)

                                        <div class="col mb-30">
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
                                                    <h3 class="product__items--content__title h4"><a href="{{ route('productDetail',$all_feature_product_list->slug) }}">{{ $all_feature_product_list->product_name }}</a></h3>
                                                    <div class="product__items--price">
                                                        <span class="current__price">৳ {{ $all_feature_product_list->selling_price - $all_feature_product_list->discount  }}</span>
 @if($all_feature_product_list->discount == 0)
                                        
                                        @else
                                        <span class="price__divided"></span>
                                        <span class="old__price">{{$all_feature_product_list->selling_price}}</span>
                                        @endif
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
<div class="d-flex justify-content-center custom_pagination_count">
     {!! $main_product->links() !!}
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shop section -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3 section--padding pt-0">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{ asset('/') }}public/shipping1.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{ asset('/') }}public/shipping2.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{ asset('/') }}public/shipping3.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{ asset('/') }}public/shipping4.png" alt="">
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

@section('script')

<script>
    $(document).ready(function () {




//catch category from filter
$('input[id^="category_name"]').on('change', function (event) {



    //category

    var category_name = $('input[id^="category_name"]:checked').map(function(_, el) {
        return $(el).val();
    }).get();

    //category

    //color value
    var color_value = $('input[id^="color_value"]:checked').map(function(_, el) {
        return $(el).val();
    }).get();
    //end color value

    //size value

    var size_value = $('input[id^="size_value"]:checked').map(function(_, el) {
        return $(el).val();
    }).get();
    //end size value


    //price section




  var price_list_mainmin = $('#min_price').val();


var price_list_mainmax = $('#max_price').val();


    //end price section

   // alert(category_name);

let text = category_name.toString();
let text1 = color_value.toString();
let text2 = size_value.toString();

$('#f_list').html(text + text1 + text2  );


    $.ajax({
    url: "{{ route('shop_page_filter') }}",
    method: 'GET',
    data: {category_name:category_name,color_value:color_value,size_value:size_value,price_list_mainmin:price_list_mainmin,price_list_mainmax:price_list_mainmax},
    success: function(data) {
      $("#main_content_table_filter").html('');
      $("#main_content_table_filter").html(data);
    }
    });

});
//end category from filter




//catch color from filter
$('input[id^="color_value"]').on('change', function (event) {

//category

var category_name = $('input[id^="category_name"]:checked').map(function(_, el) {
        return $(el).val();
    }).get();

//category

//color value
var color_value = $('input[id^="color_value"]:checked').map(function(_, el) {
    return $(el).val();
}).get();
//end color value

//size value

var size_value = $('input[id^="size_value"]:checked').map(function(_, el) {
    return $(el).val();
}).get();
//end size value


//price section


  var price_list_mainmin = $('#min_price').val();
  var price_list_mainmax = $('#max_price').val();


//end price section

let text = category_name.toString();
let text1 = color_value.toString();
let text2 = size_value.toString();

$('#f_list').html(text + text1 + text2  );


$.ajax({
url: "{{ route('shop_page_filter') }}",
method: 'GET',
data: {category_name:category_name,color_value:color_value,size_value:size_value,price_list_mainmin:price_list_mainmin,price_list_mainmax:price_list_mainmax},
success: function(data) {
  $("#main_content_table_filter").html('');
  $("#main_content_table_filter").html(data);
}
});

});
//end color from filter

//catch size from filter
$('input[id^="size_value"]').on('change', function (event) {

//category

var category_name = $('input[id^="category_name"]:checked').map(function(_, el) {
        return $(el).val();
    }).get();

//category

//color value
var color_value = $('input[id^="color_value"]:checked').map(function(_, el) {
    return $(el).val();
}).get();
//end color value

//size value

var size_value = $('input[id^="size_value"]:checked').map(function(_, el) {
    return $(el).val();
}).get();
//end size value


//price section


  var price_list_mainmin = $('#min_price').val();
  var price_list_mainmax = $('#max_price').val();


//end price section

let text = category_name.toString();
let text1 = color_value.toString();
let text2 = size_value.toString();

$('#f_list').html(text + text1 + text2  );


$.ajax({
url: "{{ route('shop_page_filter') }}",
method: 'GET',
data: {category_name:category_name,color_value:color_value,size_value:size_value,price_list_mainmin:price_list_mainmin,price_list_mainmax:price_list_mainmax},
success: function(data) {
  $("#main_content_table_filter").html('');
  $("#main_content_table_filter").html(data);
}
});

});
//end size from filter




//minmum size
$('#max_price').on('keyup', function () {

    //category

var category_name = $('input[id^="category_name"]:checked').map(function(_, el) {
        return $(el).val();
    }).get();

//category

//color value
var color_value = $('input[id^="color_value"]:checked').map(function(_, el) {
    return $(el).val();
}).get();
//end color value

//size value

var size_value = $('input[id^="size_value"]:checked').map(function(_, el) {
    return $(el).val();
}).get();
//end size value


//price section

  var price_list_mainmin = $('#min_price').val();
  var price_list_mainmax = $(this).val();


//end price section



$.ajax({
url: "{{ route('shop_page_filter') }}",
method: 'GET',
data: {category_name:category_name,color_value:color_value,size_value:size_value,price_list_mainmin:price_list_mainmin,price_list_mainmax:price_list_mainmax},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data);
}
});

});
//maximum size

$('#min_price').on('keyup', function () {

    //category

var category_name = $('input[id^="category_name"]:checked').map(function(_, el) {
        return $(el).val();
    }).get();

//category

//color value
var color_value = $('input[id^="color_value"]:checked').map(function(_, el) {
    return $(el).val();
}).get();
//end color value

//size value

var size_value = $('input[id^="size_value"]:checked').map(function(_, el) {
    return $(el).val();
}).get();
//end size value


//price section


  var price_list_mainmin = $(this).val();
  var price_list_mainmax = $('#max_price').val();


//end price section



$.ajax({
url: "{{ route('shop_page_filter') }}",
method: 'GET',
data: {category_name:category_name,color_value:color_value,size_value:size_value,price_list_mainmin:price_list_mainmin,price_list_mainmax:price_list_mainmax},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data);
}
});

});


//price filter from select tag

//end price filter from selct tag

    });
</script>

@endsection
