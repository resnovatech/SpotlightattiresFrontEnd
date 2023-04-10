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
                        <!--<h2 class="account__content--title h3 mb-20">Personal Info</h2>-->
                   
                        <!--<p>{{ Auth::user()->name }}</p>-->
                        <!--<hr>-->
                        <?php

                        $get_all_address12_id = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('id');
                        
                        
                         $get_all_address12_first = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('first_name');
                        
                 $get_all_address12_last = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('last_name');
                        
                $get_all_address12_phone = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('phone');
                        
                        
            
            
              $get_all_address12_address = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('address');
    
    
       $get_all_address12_town = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('town');
                        
                        
                          $get_all_address12_district = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('district');
                        
                   $get_all_address12_post_code = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('post_code');       
                        

 ?>
<h2 class="account__content--title h3 mb-20">Profile</h2>
  <form action="{{route('personal_information_update')}}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf
                                            
                                            <input class="account__login--input" placeholder="Username" name="id" value="{{ Auth::user()->id }}" type="hidden" maxlength="50" required>

                                        <input class="account__login--input" placeholder="Username" value="{{ Auth::user()->name }}" name="name" type="text" maxlength="50" required>
                                        <input class="account__login--input" placeholder="Email Addres" value="{{ Auth::user()->email }}" id="email" name="email"  type="email" maxlength="50" required>
                                        <small id="view_text"></small>
                                        {{-- <input type="tel" id="mobile-number" readonly> --}}


                                        <div class="form-group has-search">
                                            <span class="form-control-feedback">
                                                <img src="{{ asset('/') }}public/download.jpg" alt="">
                                                <span>+88</span>
                                            </span>
                                            <input type="text" class="account__login--input" placeholder="Phone" value="{{ Auth::user()->phone }}" id="mainPhone" name="phone"  type="text" maxlength="11" required>
                                        </div>
   <small id="view_text1"></small>



                                        <input class="account__login--input" placeholder="Password" name="pass" id="pass" type="password" maxlength="20" />
                                        
                                           <input class="account__login--input" placeholder="Confirm Password" name="confirm_pass" id="confirm_pass" type="password" maxlength="20" />
   <small id="view_text2"></small>
                                        <input name="b_value" class="account__login--btn primary__btn mb-10" id="final_button" value="Update" type="submit" />
<div class="account__login--remember position__relative">
                                        
                                           
                                        </div>
                                        </form>



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
@section('script')
<script>

//password//
$("#confirm_pass").keyup(function(){
    var pass = $('#pass').val();
    var confirm_pass = $(this).val();
    
    if(confirm_pass == pass){
           $("#final_button").removeAttr('disabled');
                $('#view_text2').html('Password Matched');
                $("#view_text2").css({"color": "green"});
        
    }else{
          $("#final_button").attr('disabled', 'disabled');
               $('#view_text2').html('Password Not Matched');
                $("#view_text2").css({"color": "red"});
    }
});
//end password//

$("#mainPhone").keyup(function(){
    var phone = $(this).val();
    
    var mphone = phone.substr(0, 3);
    
    if (mphone == '017' || mphone == '019' || mphone == '018' || mphone == '016' || mphone == '015' || mphone == '013' || mphone == '014'){
        $("#final_button").removeAttr('disabled');
                $('#view_text1').html('Phone Available');
                $("#view_text1").css({"color": "green"});
        
    }else{
        
        $("#final_button").attr('disabled', 'disabled');
               $('#view_text1').html('Phone Not Available');
                $("#view_text1").css({"color": "red"});
    }
   // alert(mphone);
});
///////////
    $("#email").keyup(function(){

        var email = $(this).val();
        //alert(email);

         $.ajax({
        url: "{{ route('check_email_value') }}",
        method: 'GET',
        data: {email:email},
        success: function(data) {

            //alert(data);

            if(data >= 1){


               $("#final_button").attr('disabled', 'disabled');
               $('#view_text').html('Email Not Available');
                $("#view_text").css({"color": "red"});
            }else{

                $("#final_button").removeAttr('disabled');
                $('#view_text').html('Email Available');
                $("#view_text").css({"color": "green"});
            }

        }
        });

    });
</script>

@endsection
