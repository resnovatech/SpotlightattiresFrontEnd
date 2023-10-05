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
<h2 class="account__content--title h3 mb-20">Password</h2>
  <form action="{{route('postPasswordUpdate')}}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf
                 <input type="hidden" name="id" value="{{Auth::user()->id}}"  required/>                              
                                       
<input class="account__login--input" placeholder="Current Password" name="current_password"  type="password" maxlength="20" required/>
<small id="view_text23"></small>

                                        <input class="account__login--input" placeholder="Password" name="pass" id="pass" type="password" maxlength="20" required/>
                                        
                                           <input class="account__login--input" placeholder="Confirm Password" name="confirm_pass" id="confirm_pass" type="password" maxlength="20" required/>
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


//new current password
$("#current_password").keyup(function(){
    
    var current_password = $(this).val();
    
      $.ajax({
        url: "{{ route('checkPasswordAvailable') }}",
        method: 'GET',
        data: {current_password:current_password},
        success: function(data) {

            //alert(data);
            
            if(data == 1){


               $("#final_button").attr('disabled', 'disabled');
               $('#view_text23').html('password did not matched with current password');
                $("#view_text23").css({"color": "red"});
            }else{

                $("#final_button").removeAttr('disabled');
                $('#view_text23').html('password matched with current password');
                $("#view_text23").css({"color": "green"});
            }

        }
        });
    
});
//end new current password
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
