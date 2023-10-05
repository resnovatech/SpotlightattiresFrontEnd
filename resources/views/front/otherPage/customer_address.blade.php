@extends('front.master.master')

@section('title')

Customer Dasboard

@endsection


@section('body')
<style>
    .select2-container .select2-selection--single
{
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
</style>
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
                        
                      $get_all_address12_email = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('email');  
            
            
              $get_all_address12_address = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('address');
    
    
       $get_all_address12_town = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('town');
                        
                        
                          $get_all_address12_district = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('district');

                   $get_all_address12_division = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('division');

                        
                   $get_all_address12_post_code = DB::table('delivary_addresses')
                        ->where('user_id',Auth::user()->id)->value('post_code');       
                        

 ?>
<h2 class="account__content--title h3 mb-20">Delivery Address</h2>

         <h6>Name:<b> {{ $get_all_address12_first}}</b></h6>
         <h6 class="mt-3">Email:<b>  {{$get_all_address12_email }}</b></h6>
         <h6 class="mt-3">Mobile No:<b>  {{$get_all_address12_phone}}</b></h6>
        <h6 class="mt-3">Address:<b>  {{ $get_all_address12_address}}</b></h6>
        <h6 class="mt-3">District:<b>  {{$get_all_address12_district}}</b></h6>
        <h6 class="mt-3">Thana/Upozila:<b>  {{$get_all_address12_town}}</b></h6>
        
        <a class="product__items--action__btn" style="background:#ee2761;color:white;" data-open="mmodal" href="javascript:void(0)">
      Edit
    </a>
    
      <!-- Quickview Wrapper -->
    <div class="modal" id="mmodal" data-animation="slideInUp">
        <div class="modal-dialog quickview__main--wrapper">
            <header class="modal-header quickview__header">
                <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
            </header>
            <div class="quickview__inner">
                <div class="row row-cols-lg-12 row-cols-md-12">
                    <div class="col">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel&quot;">Update Delivery Address</h5>
                            </div>
                            <div class="modal-body">
                        <form method="post" action="{{ route('address_update_code') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
@csrf
    <input type="hidden" value="{{ $get_all_address12_id }}" name="id" />

    <p>Name : <input type="text" class="checkout__discount--code__input--field border-radius-5" name="first_name" value="{{ $get_all_address12_first}}"  maxlength="50" required/> </p>
  

    <p> Phone : <input type="text" class="checkout__discount--code__input--field border-radius-5" name="phone" value="{{ $get_all_address12_phone}}" maxlength="11" required /> </p>

 <p> Email : <input type="text" class="checkout__discount--code__input--field border-radius-5" name="email" value="{{ $get_all_address12_email}}"  required /> </p>
 
    <p> Address : <input type="text" class="checkout__discount--code__input--field border-radius-5" name="address" maxlength="200" required value="{{ $get_all_address12_address}}" /> </p>
<?php


$district_list_all_dis = DB::table('rede')->select('District')->groupBy('District')->get();
$district_list_all_thana = DB::table('rede')->select('Upazila_Thana')->groupBy('Upazila_Thana')->get();
?>



<p> District : <select  class=" checkout__input--field border-radius-5 js-example-basic-single " placeholder="Division" 
name="district"    required id="district" >
<option value="">-- Select District --</option>
@foreach($district_list_all_dis as $all_district_list_all)
<option value="{{$all_district_list_all->District}}" {{ $get_all_address12_district == $all_district_list_all->District ? 'selected':'' }}>{{$all_district_list_all->District}}</option>
@endforeach

</select>
 </p>


    <p> Thana/Upozila :  <select  class=" checkout__input--field border-radius-5 js-example-basic-single" placeholder="Division" 
name="town"    required id="town" >
<option value="">-- Select Thana/Upazila --</option>
@foreach($district_list_all_thana as $all_district_list_all)
<option value="{{$all_district_list_all->Upazila_Thana}}" {{ $get_all_address12_town == $all_district_list_all->Upazila_Thana ? 'selected':'' }}>{{$all_district_list_all->Upazila_Thana}}</option>
@endforeach

</select>
 </p>
    


<button type="submit" class="account__details--footer__btn"> Update</button>

</form>
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
    $(document).ready(function(){
          $("#division").change(function(){
              
              
                var currentId  = $(this).val();
                            
                  $.ajax({
url: "https://spotlightattires.com/get_district_from_division",
type: "GET",
data: {
'currentId':currentId  
},
success: function (data) {

$("#district").html('');
$('#district').html(data);


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

@endsection
