@extends('front.master.master')

@section('title')
Cart
@endsection

@section('body')
<style>
        .cart-area .cart-details .cart-all-pro {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .cart-area .cart-details .cart-all-pro .cart-pro {
            width: 60%;
            margin-top: 20px;
        }

        .cart-area .cart-details .cart-all-pro .cart-pro .pro-details h4 {
            font-size: 14px;
            font-weight: 400;
            line-height: 1;
        }

.cart__price_new
  {
    font-size: 12px;
    color: black;
    font-weight: normal;
  }
        .cart-area .cart-details .cart-all-pro .qty-item {
            width: 20%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-area .cart-details .cart-all-pro .all-pro-price {
            width: 20%;
            text-align: center;
        }

        .cart-area .cart-details .cart-all-pro .all-pro-price span {
            font-weight: 600;
        }

        @media (max-width: 767px) {
            .cart-area .cart-details .cart-all-pro .cart-pro {
                width: 100%;
                margin-bottom: 20px;
            }

            .cart-area .cart-details .cart-item span.cart-head {
                font-size: 14px;
                font-weight: 600;
            }

            .cart-area .cart-details .cart-all-pro .cart-pro .pro-details h4 {
                font-size: 14px;
            }

           

            .cart-area .cart-details .cart-all-pro .qty-item {
                width: 50%;
            }

            .cart-area .cart-details .cart-all-pro .all-pro-price {
                width: 50%;
            }
        }
    </style>

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    {{-- <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Shopping Cart</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End breadcrumb section -->



    <!-- cart section start -->
    <section class="cart__section section--padding" id="main_content_table234">
        <div class="container-fluid">
            <div class="cart__section--inner">
              
              
              @if (Auth::guest())
               <h2 class="cart__title mb-40">Please Login To See Cart Information</h2>
               <div class="minicart__button d-flex justify-content-center mt-4">
    <a class="primary__btn minicart__button--link" href="{{ route('login_page_dash') }}">Login</a>
    
</div>
              @else
              
              <?php  
               $userCartInfo = DB::table('cart_tbls')->where('status',0)->where('user_id',Auth::user()->id)->latest()->get();
               $totalProductPrice = 0;
                $totalProductPriceforDiscount = 0;
              
              ?>
               <h2 class="cart__title mb-40">Shopping Cart</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <div class="cart-area">
                                    <div class="cart-details">
                                        <div class="cart-item">
                                            <span class="cart-head">My cart:</span>
                                            <span class="c-items">{{ count($userCartInfo) }} item</span>
                                        </div>
                                         @foreach($userCartInfo as $item)
  <?php 
  $mainProductInfo = DB::table('main_products')->where('id',$item->product_id)->first();
  ?>
  @if (!$mainProductInfo) 
  
  @else
                                        <div class="cart-all-pro">
                                            <div class="cart-pro">
                                                <div class="cart__product d-flex align-items-center">
                                                    <a href="{{route('cart_clear_single_data',$item->id)}}" class="cart__remove--btn" aria-label="search button" type="button">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                                    </a>
                                                    <div class="cart__thumbnail">
                                                        <a href="{{ route('productDetail',$mainProductInfo->slug) }}"><img class="border-radius-5" src="{{ $url_name }}{{$mainProductInfo->front_image }}" alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h4 class="cart__content--title"><a href="{{ route('productDetail',$mainProductInfo->slug) }}">  {{ $mainProductInfo->product_name }}</a></h4>
														<span class="cart__price_new">Item Price: ৳ {{ $mainProductInfo->selling_price - $mainProductInfo->discount }}</span>
															@if(empty($item->size))
																												
																												@else
																												<span class="cart__price_new">Size: {{ $item->size}}</span>
																												@endif
																												@if(empty($item->color))
																												
																												@else
																											<span class="cart__price_new">Color: {{ $item->color}}</span>
																											@endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="qty-item">
                                                 <form class="cart-items-number">
                                                <div class="quantity__box">
                                                    <button type="button" class="qtyminus quantity__value quickview__value--quantity " aria-label="quantity value" value="Decrease Value"  id="mi{{ $item->id }}">-</button>
                                                    <label>
                                                        <input type="number" class="qty quantity__number quickview__value--number" name="quantity" minlength="1" value="{{ $item->quantity }}" id="gv{{ $item->id }}"/>
                                                         <input type="hidden" class="mainId quantity__number quickview__value--number" name="id"  value="{{ $item->id }}" />
                                                    </label>
                                                    <button type="button" class="qtyplus quantity__value quickview__value--quantity " aria-label="quantity value" value="Increase Value"  id="cartpl{{ $item->id }}">+</button>
                                                </div>
                                                </form>
                                            </div>
                                            <div class="all-pro-price">
                                                <span> ৳  {{ ($mainProductInfo->selling_price - $mainProductInfo->discount)*$item->quantity }}</span>
                                            </div>
                                        </div>
                                        <?php
                                        
                                        if($mainProductInfo->discount == 0){
                                            
                                            $totalProductPriceforDiscount = $totalProductPriceforDiscount  +  ($mainProductInfo->selling_price*$item->quantity);
                                            
                                        }
                                           $totalProductPrice = $totalProductPrice  +  (($mainProductInfo->selling_price - $mainProductInfo->discount)*$item->quantity) ;
                                        
                                        
                                        
                                        
                                        ?>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="{{route('index')}}">Continue shopping</a>
                                    <a class="continue__shopping--clear" href="{{route('cart_clear_all_data')}}">Clear Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                                
                                  <?php 
                                  
                                  $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');
                              
                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');
                              
                              if($getCuponTypem =="Multiple Times"){
                                         $getCuponId = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('mstatus',0)->orderBy('id','desc')->value('cupon_id');
                                 
                                 $getCuponIdMain = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('mstatus',0)->orderBy('id','desc')->value('id');  
                               
                               
                              }else{
                                         $getCuponId = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',0)->orderBy('id','desc')->value('cupon_id');
                                 
                                 $getCuponIdMain = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',0)->orderBy('id','desc')->value('id');   
                              }
                                           
                                    
                               
                               
                                           
                                $clientType = DB::table('clients')
                              ->where('user_id',Auth::user()->id)->value('c_type')
                                           
                                           ?>
                                           
            
                 <div class="coupon__code mb-30">
                    
                                        <h3 class="coupon__code--title">Coupon</h3>
                                        <p class="coupon__code--desc">Enter your coupon code if you have one.</p>
                                         @if($clientType == 'Silver' || $clientType == 'Platinum')
                     <p class="" style="font-size:12px;color:red;">If you haven't used a coupon, 
                     your assigned discount will be shown on the checkout page</p>
                     @else
                     
                     @endif
                                        <div class="coupon__code--field d-flex">
                                            <label>
                                                @if(!empty($getCuponId))
                                                 <?php
                                           
                                           $checkCodeFirst = DB::table('cupons')
                                           ->where('id',$getCuponId)
                                           ->first();
                                           
                                            if(!$checkCodeFirst){
                                               
                                               $mmd = '';
                                               
                                               
                                           }else{
                                               $mmd =$checkCodeFirst->coupon_code; 
                                           }
                                           ?>
                                          
                                                <input class="coupon__code--field__input border-radius-5" value="{{$mmd}}" id="cuponCode" placeholder="Coupon code" type="text">
                                                
                                                <br>
                                                <a href="{{route('deleteCupon',$getCuponIdMain)}}" style="font-size:12px;color:red;">Delete</a>
                                          
                                                @else
                                            <input class="coupon__code--field__input border-radius-5" id="cuponCode" placeholder="Coupon code" type="text">
                                                @endif
                                                
                                                <br><small class="text-danger" id="errMsg"></small>
                                            </label>
                                            <button class="coupon__code--field__btn primary__btn" id="passCuponCode">Apply Coupon</button>
                                             
                                        </div>
                                    </div>

                                <div class="cart__summary--total mb-20">
                                    <table class="cart__summary--total__table">
                                        <tbody>
                                            
                                         
                                           
                                           @if(!empty($getCuponId))
                                           
                                           <?php
                                           
                                           $checkCodeFirst = DB::table('cupons')
                                           ->where('id',$getCuponId)
                                           ->first();
                                           
                                           if(!$checkCodeFirst){
                                               
                                               $final_cal = $totalProductPrice;
                                               $disval = 0 ;
                                               
                                           }else{
                                           
                                           if($checkCodeFirst->amount_type == "Percentage"){
    
    $calculateFinalVal = ($totalProductPriceforDiscount*$checkCodeFirst->amount)/100;
    $final_cal = $totalProductPrice -  Session::get('discountMain');
    $disval = Session::get('discountMain');
    
}else{
    
     $final_cal =$totalProductPrice -  Session::get('discountMain');
     $disval = Session::get('discountMain');
}
                                           
                                           }                                       
                                           ?>
                                           
                                           
                                            <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">SUB TOTAL</td>
                                            <td class="cart__summary--amount text-right" >  {{  $totalProductPrice }}</td>
                                            <input type="hidden" value="{{  $totalProductPriceforDiscount }}" id="subAmount"/>
                                        </tr>
                                        
                                         <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">DISCOUNT</td>
                                            <td class="cart__summary--amount text-right" id="discountAmount">৳ {{$disval}} </td>
                                        </tr>
                                        
                                         <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                            <td class="cart__summary--amount text-right" id="finalAmount">  {{   $final_cal }}</td>
                                        </tr>
                                           
                                           
                                           @else

                                        <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">SUB TOTAL</td>
                                            <td class="cart__summary--amount text-right" >৳  {{  $totalProductPrice }}</td>
                                            <input type="hidden" value="{{  $totalProductPriceforDiscount }}" id="subAmount"/>
                                        </tr>
                                        
                                         <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">DISCOUNT</td>
                                            <td class="cart__summary--amount text-right" id="discountAmount"> 0 </td>
                                        </tr>
                                        
                                         <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                            <td class="cart__summary--amount text-right" id="finalAmount">৳  {{  $totalProductPrice }}</td>
                                        </tr>
                                        @endif
                                        
                                        </tbody>
                                    </table>
                                </div>
                
                                <div class="cart__summary--footer">

                                    <ul class="d-flex justify-content-between">
                                        {{-- <li><button class="cart__summary--footer__btn primary__btn cart" type="submit">Update Cart</button></li> --}}
                                        <li><a class="cart__summary--footer__btn primary__btn checkout" href="{{ route('check_out_from_cart') }}">Check Out</a></li>
                                    </ul>
                                </div>

                   

            </div>
        </div>
        </div>
        @endif
    </section>
    <!-- cart section end -->




  





</main>

@endsection


@section('script')
 <script>
 
 //
 
 $("#passCuponCode").click(function(){
     
      var code = $('#cuponCode').val();
      var subAmount = $('#subAmount').val();
      
        $.ajax({
            url: "https://spotlightattires.com/checkCartCondition",
            method: 'GET',
            data: {code:code,subAmount:subAmount},
            success: function(data) {
                
                if(data.data != 0){
                $("#discountAmount").html(' '+data.data);  
                
                var finalData = subAmount - data.data;
            
                 $("#finalAmount").html(' '+finalData); 
                $("#errMsg").html(data.msg);
                location.reload(true);
                }else{
                     $("#discountAmount").html(' '+data.data);  
                
                var finalData = subAmount - data.data;
            
                 $("#finalAmount").html(' '+finalData); 
                $("#errMsg").html(data.msg);
                    
                }
            //   $("#main_content_table234").html('');
            //   $("#main_content_table234").html(data);

             // location.reload(true);
            }
        });
 
 });
 //

// $("[id^=mi]").click(function(){


//       var main_id = $(this).attr('id');
//       var id_for_pass = main_id.slice(2);

//   var previous_cart_quantity  = parseInt($('#main_cart_count1').html());
//   var get_main_value = parseInt(previous_cart_quantity-1);

//   $('#main_cart_count1').html(get_main_value);
//  $('#main_cart_count2').html(get_main_value);
// $('#main_cart_count3').html(get_main_value);


// var main_quantity = $('#gv'+id_for_pass).val()

//                  var get_value = parseInt(main_quantity-1);


//   $.ajax({
//             url: "https://spotlightattires.com/cart_page_all_update_minus",
//             method: 'GET',
//             data: {id_for_pass:id_for_pass,get_value:get_value},
//             success: function(data) {
//               $("#main_content_table234").html('');
//               $("#main_content_table234").html(data);

//               location.reload(true);
//             }
//         });





// //////////








// });
// ////

// $("[id^=pl]").click(function(){



// // alert(22);

// var main_id = $(this).attr('id');
// var id_for_pass = main_id.slice(2);

// var previous_cart_quantity  = parseInt($('#main_cart_count1').html());
// var get_main_value = parseInt(previous_cart_quantity);

//   $('#main_cart_count1').html(get_main_value);
//  $('#main_cart_count2').html(get_main_value);
// $('#main_cart_count3').html(get_main_value);


// var main_quantity = $('#gv'+id_for_pass).val()

//                  var get_value = parseInt(main_quantity);


//   $.ajax({
//             url: "https://spotlightattires.com/cart_page_all_update",
//             method: 'GET',
//             data: {id_for_pass:id_for_pass,get_value:get_value},
//             success: function(data) {
//               $("#main_content_table234").html('');
//               $("#main_content_table234").html(data);

//               location.reload(true);
//             }
//         });



// //////////





// });

jQuery($ => { // DOM ready and $ alias in scope
  
  $(".cart-items-number").on("click", ".qtyminus, .qtyplus", (evt) => {
    const $qty    = $(evt.delegateTarget).find(".qty");
    const $mainId    = $(evt.delegateTarget).find(".mainId");
    
    const isMinus = $(evt.currentTarget).hasClass("qtyminus");
    const valueCurrent = +$qty.val() || 0;
    const valueChange = isMinus ? -1 : 1;
    const value = Math.max(0, valueCurrent + valueChange);
    $qty.val(value);
    var id_for_pass = $mainId.val();
    var get_value = value;
    //alert(get_value);
    
      $.ajax({
            url: "https://spotlightattires.com/increaseDataFromCartPage",
            method: 'GET',
            data: {id_for_pass:id_for_pass,get_value:get_value},
            success: function(data) {
            //   $("#main_content_table234").html('');
            //   $("#main_content_table234").html(data);

              location.reload(true);
            }
        });
  });
  
});
</script>
@endsection
