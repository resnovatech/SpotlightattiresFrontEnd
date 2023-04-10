<div class="header__bottom">
    <div class="container-fluid">
        <div class="header__bottom--inner position__relative d-none d-lg-flex justify-content-between align-items-center">
            <div class="header__menu">
                <nav class="header__menu--navigation">
                    <ul class="d-flex">
                        <li class="header__menu--items">
                            <a class="header__menu--link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="header__menu--items mega__menu--items">
                            <a class="header__menu--link" href="#">Shop
                                <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41" viewBox="0 0 12 7.41">
                                    <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                </svg>
                            </a>
                            <ul class="header__mega--menu d-flex">

                                @foreach($get_all_category as $all_get_all_category)

                                <?php

                     $sub_cat_list = DB::table('categories')
                     ->where('cat_name',$all_get_all_category->cat_name)
                     ->whereNotNull('sub_cat')
                     ->select('sub_cat')->groupby('sub_cat')->get();
                        ?>

                                <li class="header__mega--menu__li">
                                    <span class="header__mega--subtitle"><a href="{{ route('categoryProduct',$all_get_all_category->cat_name) }}">
                                        {{ $all_get_all_category->cat_name }}
                                    </a></span>
                                    <ul class="header__mega--sub__menu">
                                        @foreach($sub_cat_list as $all_sub_cat_list)
                                        <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="{{ route('categoryProduct',$all_sub_cat_list->sub_cat) }}">{{ $all_sub_cat_list->sub_cat }}</a></li>
@endforeach
                                    </ul>
                                </li>
                                @endforeach

                            </ul>
                        </li>
                        <li class="header__menu--items">
                            <a class="header__menu--link" href="{{ route('about_us_new') }}">About US </a>
                        </li>
                        <li class="header__menu--items">
                            <a class="header__menu--link" href="{{ route('blog_new') }}">Blog</a>
                        </li>
 <li class="header__menu--items style2">
                            <a class="header__menu--link" href="{{ route('offerAndEventProduct') }}">Offers & Events</a>
                        </li>

                       <!-- <li class="header__menu--items d-none d-xl-block">
                            <a class="header__menu--link" href="{{ route('animationCategoryProductList') }}">Anim Character </a>
                        </li> -->
                        <li class="header__menu--items">
                            <a class="header__menu--link" href="{{ route('contact_us_new') }}">Contact </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <p class="header__discount--text">
<!--<img class="header__discount--icon__img" src="{{ asset('/') }}public/front/assets/img/icon/lamp.png" alt="lamp-img">{{ $offer_title }}-->
</p>
        </div>
    </div>
</div>
