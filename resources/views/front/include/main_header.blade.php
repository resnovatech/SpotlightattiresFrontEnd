<div class="main__header header__sticky">
    <div class="container-fluid">
        <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
            <div class="offcanvas__header--menu__open ">
                <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                    <span class="visually-hidden">Menu Open</span>
                </a>
            </div>
            <div class="main__logo">
                <h1 class="main__logo--title">
                    <a class="main__logo--link" href="{{route('index')}}"><img class="main__logo--img" src="{{$url_name}}{{ $logo }}" alt="logo-img"></a>
                </h1>
            </div>
            <div class="header__search--widget header__sticky--none d-none d-lg-block">
                
                <div class="search_box_rel">
                    <form class="d-flex header__search--form" action="{{route('search_product')}}" method="get">
                        <div class="header__select--categories select">
                            <select class="header__select--inner" name="category_name" id="category_name">
                                <option selected value="1">All Categories</option>

                                @foreach($get_all_category as $all_get_all_category)
                                <option value="{{ $all_get_all_category->cat_name }}">{{ $all_get_all_category->cat_name }}</option>
@endforeach
                            </select>
                        </div>
                        <div class="header__search--box">
                            <label>
                                <input class="header__search--input" name="product_name" id="product_name" placeholder="Keyword here..." type="text" >
                            </label>
                            <button class="header__search--button bg__secondary text-white" type="submit" aria-label="search button">
                                <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="27.51" height="26.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                            </button>
                        </div>
                    </form>
                
                    <div class="search_box_abs showbox" id="MainSearchNew">
                        <table class="table table-borderless">
                            <tbody id="search_area">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="header__account header__sticky--none">
                <ul class="d-flex">

                    @if (Auth::guest())
                    <li class="header__account--items">
                        <a class="header__account--btn" href="{{route('login_page_dash')}}">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                            <span class="header__account--btn__text">My Account</span>
                        </a>
                    </li>
                    <li class="header__account--items d-none d-lg-block">
                        <a class="header__account--btn" href="{{ route('wishList') }}">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="28.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                            <span class="header__account--btn__text"> Wish List</span>
                            
                            <span class="items__count wishlist">0</span>
                        </a>
                    </li>
                    @else


                    <li class="header__account--items">
                        <a class="header__account--btn" href="{{route('customer_dashboard')}}">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                            <span class="header__account--btn__text">My Account</span>
                        </a>
                    </li>
                    <li class="header__account--items d-none d-lg-block">
                        <a class="header__account--btn" href="{{ route('wishList') }}">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="28.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                            <span class="header__account--btn__text"> Wish List</span>
                            <?php  $all_wish_list23 = DB::table('wishlists')->where('user_id',Auth::user()->id)->count(); ?>
                            <span class="items__count wishlist">{{$all_wish_list23}}</span>
                        </a>
                    </li>

                    @endif
                    <li class="header__account--items">
                        <a class="header__account--btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 14.706 13.534">
                                <g  transform="translate(0 0)">
                                    <g >
                                        <path  data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"/>
                                        <path  data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"/>
                                        <path  data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"/>
                                    </g>
                                </g>
                            </svg>
                            <span class="header__account--btn__text"> My cart</span>
                            <span class="items__count" id="main_cart_count2">{{ \Cart::getTotalQuantity()}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header__menu d-none header__sticky--block d-lg-block">
                <nav class="header__menu--navigation">
                    <ul class="d-flex">
                        <li class="header__menu--items style2">
                            <a class="header__menu--link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="header__menu--items mega__menu--items style2">
                            <a class="header__menu--link" href="shop.html">Shop
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
                                    <span class="header__mega--subtitle">
                                        <a href="{{ route('categoryProduct',$all_get_all_category->cat_name) }}">
                                            {{ $all_get_all_category->cat_name }}
                                        </a>
                                    </span>
                                    <ul class="header__mega--sub__menu">
                                        @foreach($sub_cat_list as $all_sub_cat_list)

                                        <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="{{ route('categoryProduct',$all_sub_cat_list->sub_cat) }}">{{ $all_sub_cat_list->sub_cat }}</a></li>
@endforeach
                                    </ul>
                                </li>

@endforeach
                            </ul>
                        </li>
                        <li class="header__menu--items style2">
                            <a class="header__menu--link" href="{{ route('about_us_new') }}">About US </a>
                        </li>
                        <li class="header__menu--items style2">
                            <a class="header__menu--link" href="{{ route('blog_new') }}">Blog</a>
                        </li>
                        <li class="header__menu--items style2">
                            <a class="header__menu--link" href="{{ route('offerAndEventProduct') }}">Offers & Events</a>
                        </li>
                        <li class="header__menu--items style2">
                            <a class="header__menu--link " href="{{ route('contact_us_new') }}">Contact </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header__account header__account2 header__sticky--block">
                <ul class="d-flex">
                    <li class="header__account--items header__account2--items  header__account--search__items d-none d-lg-block">
                        <a class="header__account--btn search__open--btn" href="javascript:void(0)" data-offcanvas>
                            <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
                            <span class="visually-hidden">Search</span>
                        </a>
                    </li>

                    @if (Auth::guest())
                    <li class="header__account--items header__account2--items">
                        <a class="header__account--btn" href="{{route('login_page_dash')}}">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                            <span class="visually-hidden">My Account</span>
                        </a>
                    </li>
                    <li class="header__account--items header__account2--items d-none d-lg-block">
                        <a class="header__account--btn" href="{{ route('wishList') }}">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="28.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                            <span class="items__count  wishlist style2">0</span>
                        </a>
                    </li>
                    @else
                    <li class="header__account--items header__account2--items">
                        <a class="header__account--btn" href="{{route('customer_dashboard')}}">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                            <span class="visually-hidden">My Account</span>
                        </a>
                    </li>
                    <li class="header__account--items header__account2--items d-none d-lg-block">
                        <a class="header__account--btn" href="{{ route('wishList') }}">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="28.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                            <?php  $all_wish_list23 = DB::table('wishlists')->where('user_id',Auth::user()->id)->count(); ?>
                            <span class="items__count  wishlist style2">{{ $all_wish_list23 }}</span>
                        </a>
                    </li>

                    @endif
                    <li class="header__account--items header__account2--items">
                        <a class="header__account--btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 14.706 13.534">
                                <g  transform="translate(0 0)">
                                    <g >
                                        <path  data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"/>
                                        <path  data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"/>
                                        <path  data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"/>
                                    </g>
                                </g>
                            </svg>
                            <span class="items__count style2" id="main_cart_count1">{{ \Cart::getTotalQuantity()}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
