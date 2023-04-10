@extends('front.master.master')

@section('title')

Password Update

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

    .userInput {
  display: flex;
  justify-content: center;
  text-align:center;
}

    </style>

<main class="main__content_wrapper">

<div class="login__section section--padding">
    <div class="container">
        <div class="row justify-content-md-center">
             @include('flash_message')
            <div class="col-md-8 text-center">
                       <form action="{{route('password_update_store')}}" method="post"  enctype="multipart/form-data" id="form1" data-parsley-validate="">
                @csrf
                <input type="hidden" name="id" value="{{ $user_id }}" />
                <div class="row">
                    <div class="col-sm-12">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">Update Password</h2>
                            </div>
                            <div class="account__login--inner">
                                <div class="userInput">
			                        <input type="text" name="password" id="password" required data-parsley-length="[8, 10]"  placeholder="Enter Password" class="account__login--input" >

		                        </div>

                            </div>
                            <div class="account__login--inner">
                                <div class="userInput">
			                        <input type="text" name="confirm_password" id="confirm_password" data-parsley-equalto="#password" required  placeholder="Enter Confirm Password" class="account__login--input" >

		                        </div>
		                        <button class="account__login--btn primary__btn" id="final_button" type="submit" >Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- End breadcrumb section -->

        <!-- Start login section  -->

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

                $("#final_button").removeAttr('disabled');
                $('#view_text').html('Email Available');
                $("#view_text").css({"color": "green"});

            }else{




                $("#final_button").attr('disabled', 'disabled');
               $('#view_text').html('Email Not Found');
                $("#view_text").css({"color": "red"});
            }

        }
        });

    });
</script>

<script>
    function clickEvent(first,last){
			if(first.value.length){
				document.getElementById(last).focus();
			}
		}
</script>



@endsection
