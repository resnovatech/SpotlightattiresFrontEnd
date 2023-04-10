<div class="offcanvas__header">
    <div class="offcanvas__inner">
        <div class="offcanvas__logo">
            <a class="offcanvas__logo_link" href="{{ route('index') }}">
                <img src="{{$url_name}}{{ $logo }}" alt="Grocee Logo" width="158" height="36">
            </a>
            <button class="offcanvas__close--btn" data-offcanvas>close</button>
        </div>
        <nav class="offcanvas__menu">
            <ul class="offcanvas__menu_ul">
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="{{ route('index') }}">Home</a>
                </li>
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="#">Shop</a>
                    <ul class="offcanvas__sub_menu">

                        @foreach($get_all_category as $all_get_all_category)

                        <?php

             $sub_cat_list = DB::table('categories')
             ->where('cat_name',$all_get_all_category->cat_name)
             ->whereNotNull('sub_cat')
               ->select('sub_cat')->groupby('sub_cat')->get();
                ?>
                        <li class="offcanvas__sub_menu_li">
                            <a href="{{ route('categoryProduct',$all_get_all_category->cat_name) }}" class="offcanvas__sub_menu_item">{{ $all_get_all_category->cat_name }}</a>
                            <ul class="offcanvas__sub_menu">

                                @foreach($sub_cat_list as $all_sub_cat_list)
                                <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="{{ route('categoryProduct',$all_sub_cat_list->sub_cat) }}">{{ $all_sub_cat_list->sub_cat }}</a></li>
@endforeach
                            </ul>
                        </li>
                    @endforeach
                    </ul>
                </li>
                <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{ route('about_us_new') }}">About</a></li>
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="{{ route('blog_new') }}">Blog</a>
                </li>
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="{{ route('animationCategoryProductList') }}">Anim Character</a>
                </li>
                <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{ route('contact_us_new') }}">Contact</a></li>
            </ul>
            @if (Auth::guest())
            <div class="offcanvas__account--items">
                <a class="offcanvas__account--items__btn d-flex align-items-center" href="{{route('login_page_dash')}}">
                        <span class="offcanvas__account--items__icon">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                            </span>
                    <span class="offcanvas__account--items__label">Login / Register</span>
                </a>
            </div>
            @else
            <div class="offcanvas__account--items">
                <a class="offcanvas__account--items__btn d-flex align-items-center" href="{{route('customer_dashboard')}}">
                        <span class="offcanvas__account--items__icon">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                            </span>
                    <span class="offcanvas__account--items__label">Account</span>
                </a>
            </div>

            @endif

        </nav>
    </div>
</div>
