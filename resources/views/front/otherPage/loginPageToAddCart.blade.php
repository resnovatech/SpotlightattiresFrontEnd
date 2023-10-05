@extends('front.master.master')

@section('title')

Login Page

@endsection


@section('body')

<style>
.select2-container
{
width: 100% !important;
}
.login_image_section
{
  margin-bottom: 1.5rem;
}

.login_image_box
{
  height: 100px;
  width: 100px;
}

.login_upload_button
{
  background: var(--secondary-color);
  color: var(--white-color);
  border: 0;
  line-height: 4.8rem;
  height: 4.4rem;
  padding: 0 1.9rem;
  font-size: 1.6rem;
  text-align: center;
  border-radius: 5px;
  cursor: pointer;
}

.nav-link
{
  width: 180px;
  text-align: center;
  background-color: #eeeeee;
}

.nav-pills
{

  border-radius: 15px;
  box-shadow: 10px 10px 24px -4px rgb(221, 221, 221);
  font-size: 20px;
}

.nav-link {
  display: block;
  padding: .5rem 0;
  color: #000000;
}

.nav-pills .nav-link.active
{
  padding: .7rem 0;
  border-radius: 15px;
  background-color: var(--secondary-color);
}

.select2-container span
{
    display: block !important;
}
.select2-container .select2-selection--single
{
    display: block !important;
    transition: none !important;
  width: 100%;
  height: 4.8rem !important;
  border: 1px solid var(--border-color) !important;
  border-radius: 0.5rem !important;
  padding: 0 1.5rem !important;
  margin-bottom: 1.5rem !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered
{
  line-height: 4.5rem !important;
  color: black !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow
{
  height: 4.5rem !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
  border-color: #000000 transparent transparent transparent !important;
}

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

.custom_image_input
{
    border: none !important;
    margin-top: 8px;
    margin-bottom: 0 !important;
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
        <section>
        <div class="login__section section--padding">
            <div class="container">
                <div class="d-flex justify-content-center mb-5">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Login
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">Registration
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">
                        <div class="d-flex justify-content-center">
                              <form action="{{route('postLoginToAddCart')}}" method="post"  enctype="multipart/form-data" id="form1" data-parsley-validate="">
                                @csrf
                                <div class="login__section--inner">

                                    <div class="account__login">
                                        <div class="account__login--header mb-25">
                                            <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                            <p class="account__login--header__desc">Login if you area a returning
                                                customer.</p>
                                                @include('flash_message')
                                        </div>
                                        <div class="account__login--inner">
                                            <input class="account__login--input" placeholder="Email Addres" name="email" type="text" required>
                                            <input class="account__login--input" placeholder="Password" name="password" type="password" required>
                                            <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                                <div class="account__login--remember position__relative">
                                                    <input class="checkout__checkbox--input" id="check1"
                                                           type="checkbox">
                                                    <span class="checkout__checkbox--checkmark"></span>
                                                    <label class="checkout__checkbox--label login__remember--label"
                                                           for="check1">
                                                        Remember me</label>
                                                </div>
                                                <a class="account__login--forgot" href="{{ route('forget_password_link') }}">Forgot Your
                                                    Password?
                                                </a>
                                            </div>
                                            <button name="b_value" value="Login" class="account__login--btn primary__btn" type="submit">Login
                                            </button>
                                            <!--<div class="account__login--divide">-->
                                            <!--    <span class="account__login--divide__text">OR</span>-->
                                            <!--</div>-->
                                            <!--<div class="account__social d-flex justify-content-center mb-15">-->
                                            <!--    <a class="account__social--link facebook" target="_blank"-->
                                            <!--       href="https://www.facebook.com">Facebook</a>-->
                                            <!--    <a class="account__social--link google" target="_blank"-->
                                            <!--       href="https://www.google.com">Google</a>-->
                                            <!--    <a class="account__social--link twitter" target="_blank"-->
                                            <!--       href="https://twitter.com">Twitter</a>-->
                                            <!--</div>-->
                                            <!--<p class="account__login--signup__text">Don,t Have an Account?-->
                                            <!--    <button type="submit">Sign up now</button>-->
                                            <!--</p>-->
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="d-flex justify-content-center">
                             <form action="{{route('postRegisterToAddCart')}}" method="post"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                           @csrf
                                <div class="login__section--inner">

                                    <div class="account__login">
                                        <div class="account__login--header mb-25">
                                            <h2 class="account__login--header__title h3 mb-10">Create an
                                                Account</h2>
                                            <p class="account__login--header__desc">Register here if you are a new
                                                customer</p>
                                        </div>
                                        <div class="account__login--inner">
                                        <input class="account__login--input" placeholder="Your Name" name="name" type="text" maxlength="50" required>
                                       <input class="account__login--input" placeholder="Email Address" id="email" name="email1"  type="email" maxlength="50" required>
                                       <small id="view_text"></small>

                                            <div class="login_image_section">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="d-flex justify-content-center mb-2">
                                                            <img id="output" class="login_image_box"
                                                                 src="{{ asset('/') }}public/demo.jpg"/>
                                                        </div>
                                                        <input type="file" accept="image/*"
                                                               onchange="loadFile(event)" name="image" id="upload" hidden/>
                                                        <label class="login_upload_button" for="upload">Choose
                                                            Image</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="d-flex align-content-center pt-5">
                                                            <p>Photo Must be JPG, JPEG, GIF,or PNG, <br>
                                                                For Best View Photo 100 * 100px (File Size no more
                                                                than 50KB)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="account__login--input" placeholder="Password"
                                                   type="password" name="pass1" id="pass" type="password" maxlength="20">
                                            <input class="account__login--input" placeholder="Confirm Password"
                                            name="confirm_pass" id="confirm_pass" type="password" maxlength="20">

<small id="view_text2"></small>
                                                   <input class="account__login--input" placeholder="Address" name="address"  type="text" required>

                                                   <?php

                                                  $district_list_all_dis = DB::table('rede')->select('District')->groupBy('District')->get();
                                                 $district_list_all_div = DB::table('rede')->select('District')->groupBy('District')->get();

?>



                                          <div class="checkout__input--list mt-3">
                                              <label>
                                                   <select  class="js-example-basic-single account__login--input" placeholder="Division"
name="district"    required id="district" >
<option value="">-- Select District --</option>
@foreach($district_list_all_dis as $all_district_list_all)
<option value="{{$all_district_list_all->District}}" >{{$all_district_list_all->District}}</option>
@endforeach
</select>
                                               </label>
                                           </div>
                                           <div class="checkout__input--list mt-3">
                                            <label>
    <select  class="js-example-basic-single1 form-control" placeholder="Division"
name="town"    required id="town" >
<option value="">-- Select Thana/Upazila --</option>
</select>
                                            </label>
                                           </div>
                                            <div class="form-group has-search ">
                                                <span class="form-control-feedback">
                                                    <img src="{{ asset('/') }}public/download.jpg" alt="">
                                                    <span>+88</span>
                                               </span>
                                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "11" class="account__login--input" placeholder="Phone" id="mainPhone" name="phone"   minlength="11" maxlength="11" required>
                                             </div>
                                            <button id="final_button" name="b_value" value="Register" class="account__login--btn primary__btn mb-10" type="submit">
                                                Registration
                                            </button>
                                            <div class="account__login--remember position__relative">
                                                <input class="checkout__checkbox--input" id="check2"
                                                       type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label"
                                                       for="check2">
                                                    I have read and agree to the terms & conditions</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- End login section  -->

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
    $(document).ready(function(){
          $("#division").change(function(){


                var currentId  = $(this).val();

                  $.ajax({
url: "https://spotlightattires.com/get_district_from_division",
type: "GET",
data: {
'currentId':currentId
},
beforeSend: function(){
    // Show image container
    $("#district").html('<option id="nnn"><i class="fa fa-spinner fa-spin"></i> Loading.....</option>');
   },
success: function (data) {

$("#district").html('');
$('#district').html(data);


},
complete:function(data){
    // Hide image container
    $("#nnn").hide();
   }

});





          });
});
</script>

<script>
    $(document).ready(function(){
          $("#district").change(function(){


                var currentId  = $(this).val();

                  $.ajax({
url: "https://spotlightattires.com/get_thana_from_district",
type: "GET",
cache: false,
	headers: { "cache-control": "no-cache" },
data: {
'currentId':currentId
},
beforeSend: function(){
    // Show image container
    $("#town").html('<option id="nnnn"><i class="fa fa-spinner fa-spin"></i> Loading.....</option>');
   },
success: function (data) {

$("#town").html('');
$('#town').html(data);


},
complete:function(data){
    // Hide image container
    $("#nnnn").hide();
   }

});





          });
});
</script>


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
        url: "https://spotlightattires.com/check_email_value",
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
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

@endsection
