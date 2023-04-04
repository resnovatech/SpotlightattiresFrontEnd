@extends('front.master.master')

@section('title')

Login Page

@endsection


@section('body')

<style>


    .has-search .account__login--input {
      padding-left: 90px
    }

    .has-search .form-control-feedback {
      position: absolute;
      z-index: 2;
      display: block;
      width: 90px;
      height: 2.375rem;
      line-height: 52px;
      text-align: left;
      pointer-events: none;
      color: #000000;
      padding-left: 10px;
    }

    .form-control-feedback img
    {
      height: 18px;
      width: 26px;
    }

    </style>
    
<main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        {{-- <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Account Page</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Account Page</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End breadcrumb section -->

        <!-- Start login section  -->
        <div class="login__section section--padding">
            <div class="container">

                    <div class="login__section--inner">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col">
                                <div class="account__login">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                        <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                        @include('flash_message')
                                    </div>
                                    <div class="account__login--inner">
                                    <form action="{{route('customer_login_post_dash')}}" method="post"  enctype="multipart/form-data" id="form1" data-parsley-validate="">
                @csrf

                                        <input class="account__login--input" placeholder="Email Addres" name="email1"  type="text">
                                        <input class="account__login--input" placeholder="Password" name="pass" type="password">
                                        <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                            <div class="account__login--remember position__relative">
                                                <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                    Remember me</label>
                                            </div>
                                            {{-- <button class="account__login--forgot" type="submit">Forgot Your Password?</button> --}}
                                        </div>
                                        <input name="b_value" value="Login" class="account__login--btn primary__btn" type="submit"/>


                                        {{-- <div class="account__social d-flex justify-content-center mb-15">
                                            <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com/">Facebook</a>
                                            <a class="account__social--link google" target="_blank" href="https://www.google.com/">Google</a>
                                            <a class="account__social--link twitter" target="_blank" href="https://twitter.com/">Twitter</a>
                                        </div> --}}
</form>
{{-- <div class="account__login--divide">
    <span class="account__login--divide__text">OR</span>
</div>

    <div class="account__social d-flex justify-content-center mb-15">

        <a class="account__social--link google" target="_blank" href="https://www.google.com/">Google</a>

    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="account__login register">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                        <p class="account__login--header__desc">Register here if you are a new customer</p>
                                    </div>

                                    <div class="account__login--inner">
                                        <form action="{{route('customer_reg_post_dash')}}" method="post"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf

                                        <input class="account__login--input" placeholder="Username" name="name" type="text" maxlength="50" required>
                                       <input class="account__login--input" placeholder="Email Addres" id="email" name="email"  type="email" maxlength="50" required>
                                        <small id="view_text"></small>

                                       <div class="form-group has-search">
                                            <span class="form-control-feedback">
                                                <img src="{{ asset('/') }}public/download.jpg" alt="">
                                                <span>+88</span>
                                            </span>
                                            <input type="text" class="account__login--input" placeholder="Phone" id="mainPhone" name="phone"  type="text" maxlength="11" required>
                                        </div>
                                    
                                        <input class="account__login--input" placeholder="Password" name="pass" type="password" maxlength="20" required>

                                        <input name="b_value" class="account__login--btn primary__btn mb-10" id="final_button" value="Register" type="submit"/>
                                        {{-- <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                I have read and agree to the terms & conditions</label>
                                        </div> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        <!-- End login section  -->

        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3 section--padding pt-0">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{asset('/')}}public/front/assets/img/other/shipping1.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{asset('/')}}public/front/assets/img/other/shipping2.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{asset('/')}}public/front/assets/img/other/shipping3.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{asset('/')}}public/front/assets/img/other/shipping4.png" alt="">
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
