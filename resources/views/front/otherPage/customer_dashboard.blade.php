@extends('front.master.master')

@section('title')

Customer Dasboard

@endsection


@section('body')
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

                <p class="account__welcome--text">Hello, {{ Auth::user()->name }} welcome to your dashboard!</p>


                <p class="account__welcome--text">Customer Type: {{$client_type_new}}</p>

                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">My Profile</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list {{ Route::is('customer_dashboard')  ? 'active' : '' }}"><a href="{{route('customer_dashboard')}}">Dashboard</a></li>
                            
                            <li class="account__menu--list {{ Route::is('customer_address')  ? 'active' : '' }}"><a href="{{route('customer_address')}}">Address</a></li>
                            
                             <li class="account__menu--list {{ Route::is('customer_wishlist')  ? 'active' : '' }}"><a href="{{route('customer_wishlist')}}">Wishlist</a></li>
                             
                               <li class="account__menu--list {{ Route::is('customer_profile')  ? 'active' : '' }}"><a href="{{route('customer_profile')}}">Profile</a></li>

                            <li class="account__menu--list"><a href="{{ route('signout') }}">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        @include('flash_message')
                        <div class="account__content">
                 


<?php
                        $recent_odrder_list = DB::table('invoices')->where('client_slug',Auth::user()->id)->latest()->get();

                        ?>
                            <h2 class="account__content--title h3 mb-20">Order History</h2>
                            <div class="account__table--area">
                                <table class="account__table">
                                    <thead class="account__table--header">
                                        <tr class="account__table--header__child">
                                            <th class="account__table--header__child--items">Order</th>
                                            <th class="account__table--header__child--items">Date</th>
                                            <th class="account__table--header__child--items">Payment Status</th>
                                            <th class="account__table--header__child--items">Fulfillment Status</th>
                                            <th class="account__table--header__child--items">Total</th>
                                            <th class="account__table--header__child--items">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="account__table--body mobile__none">

                                    @foreach($recent_odrder_list as $all_recent_list)
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items">#{{ $all_recent_list->order_id }}</td>
                                            <td class="account__table--body__child--items">{{\Carbon\Carbon::parse($all_recent_list->created_at)->format('d M Y')}}</td>
                                            <td class="account__table--body__child--items">

                                             @if($all_recent_list->due == 0 )

                                            Paid
                                            @else
 UnPaid
                                            @endif

                                            </td>
                                            <td class="account__table--body__child--items">


                                @if(empty($all_recent_list->delivery_status) )
                                Processing

                            @else
                            {{ $all_recent_list->delivery_status }}



                            @endif




                                            </td>
                                            <td class="account__table--body__child--items">{{ $all_recent_list->grand_total }}</td>
                                            <td class="account__table--body__child--items">
                                        
                                                <a class="product__items--action__btn" data-open="mmodal{{ $all_recent_list->id }}" href="javascript:void(0)">
      View
    </a>
              <!-- Modal -->
    <!-- Quickview Wrapper -->
    <div class="modal" id="mmodal{{ $all_recent_list->id }}" data-animation="slideInUp">
        <div class="modal-dialog quickview__main--wrapper">
            <header class="modal-header quickview__header">
                <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
            </header>
            <div class="quickview__inner">
                <div class="row row-cols-lg-12 row-cols-md-12">
                    <div class="col">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel&quot;">Order Details</h5>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">{{ $all_recent_list->order_id }}</span></p>
                                
                                <?php
                        $first_name = DB::table('delivary_addresses')->where('user_id',$all_recent_list->client_slug)->value('first_name');
$invoice_details = DB::table('invoice_details')->where('invoice_id',$all_recent_list->id)->latest()->get();
                        ?>
                        
                        
                                <p class="mb-4">Billing Name: <span class="text-primary">{{$first_name}}</span></p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap">
                                        <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($invoice_details as $all_invoice_details)
                                            <?php  
                                            $product_details = DB::table('main_products')->where('id',$all_invoice_details->product_id)->first();
                                            ?>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="https://admin.spotlightattires.com/{{$product_details->front_image}}" alt="" style="height:50px;" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">{{$product_details->product_name}} ({{$all_invoice_details->color}})</h5>
                                                    <p class="text-muted mb-0">৳ {{$all_invoice_details->price}} x {{$all_invoice_details->qty}}</p>
                                                </div>
                                            </td>
                                            <td>৳ {{$all_invoice_details->price* $all_invoice_details->qty}}</td>
                                        </tr>
                                       @endforeach
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                            </td>
                                            <td>
                                                ৳ {{$all_recent_list->total_net_price}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Shipping:</h6>
                                            </td>
                                            <td>
                                               ৳  {{$all_recent_list->delivery_charge}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Total:</h6>
                                            </td>
                                            <td>
                                                ৳ {{$all_recent_list->grand_total}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quickview Wrapper End -->                                   
                                                </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tbody class="account__table--body mobile__block">
                                           @foreach($recent_odrder_list as $all_recent_list)
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items">
                                                <strong>Order</strong>
                                                <span>#{{ $all_recent_list->order_id }}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Date</strong>
                                                <span>{{\Carbon\Carbon::parse($all_recent_list->created_at)->format('d M Y')}}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Payment Status</strong>
                                                <span>  @if($all_recent_list->due == 0 )

                                            Paid
                                            @else
 UnPaid
                                            @endif</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Fulfillment Status</strong>
                                                <span>
    
                                @if(empty($all_recent_list->delivery_status) )
                                Processing

                            @else
                            {{ $all_recent_list->delivery_status }}



                            @endif</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Total</strong>
                                                <span>{{ $all_recent_list->grand_total }}</span>
                                            </td>
                                            <td class="account__table--body__child--items"> <strong>          <button type="button" class="newsletter__subscribe--button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $all_recent_list->id }}">
View
</button></strong>
</td>
                                           
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
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
