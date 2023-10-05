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

<div class="container-fluid">
            <div class="cart__section--inner">
<?php  
               $userCartInfo = DB::table('cart_tbls')->where('status',0)->where('user_id',Auth::user()->id)->latest()->get();
               $totalProductPrice = 0;
              
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
                                                        <a href="#"><img class="border-radius-5" src="{{ $url_name }}{{$mainProductInfo->front_image }}" alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h4 class="cart__content--title"><a href="#">  {{$mainProductInfo->product_name }}</a></h4>
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
                                                                                          <input type="hidden" class="" name="id" value="{{ $item->id }}"/>

                                                <div class="quantity__box">
                                                    <button type="button" class="quantity__value quickview__value--quantity " aria-label="quantity value" value="Decrease Value"  id="mmi{{ $item->id }}">-</button>
                                                    <label>
                                                        <input type="number" class="quantity__number quickview__value--number" name="quantity" minlength="1" value="{{ $item->quantity }}" id="gv{{ $item->id }}"/>
                                                    </label>
                                                    <button type="button" class="quantity__value quickview__value--quantity " aria-label="quantity value" value="Increase Value"  id="mpl{{ $item->id }}">+</button>
                                                </div>
                                            </div>
                                            <div class="all-pro-price">
                                                <span> ৳  {{ ($mainProductInfo->selling_price - $mainProductInfo->discount)*$item->quantity }}</span>
                                            </div>
                                        </div>
                                                                                <?php $totalProductPrice = $totalProductPrice  +  (($mainProductInfo->selling_price - $mainProductInfo->discount)*$item->quantity)  ?>
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


                                <div class="cart__summary--total mb-20">
                                    <table class="cart__summary--total__table">
                                        <tbody>

                                        <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                            <td class="cart__summary--amount text-right">৳  {{ $totalProductPrice }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart__summary--footer">
                                    <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                                    <ul class="d-flex justify-content-between">

                                        <li><a class="cart__summary--footer__btn primary__btn checkout" href="{{ route('check_out_from_cart') }}">Check Out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>


        <!--get-->
 <script>

$("[id^=mmi]").click(function(){
    
    
       var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(3);

  var previous_cart_quantity  = parseInt($('#main_cart_count1').html());
  var get_main_value = parseInt(previous_cart_quantity-1);

   $('#main_cart_count1').html(get_main_value);
 $('#main_cart_count2').html(get_main_value);
$('#main_cart_count3').html(get_main_value);


var main_quantity = $('#gv'+id_for_pass).val()

                 var get_value = parseInt(main_quantity-1);


   $.ajax({
            url: "https://spotlightattires.com/cart_page_all_update_minus",
            method: 'GET',
            data: {id_for_pass:id_for_pass,get_value:get_value},
            success: function(data) {
              $("#main_content_table234").html('');
              $("#main_content_table234").html(data);

              location.reload(true);
            }
        });





});
////

$("[id^=mpl]").click(function(){
    
    
var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(3);

var previous_cart_quantity  = parseInt($('#main_cart_count1').html());
var get_main_value = parseInt(previous_cart_quantity+1);

  $('#main_cart_count1').html(get_main_value);
 $('#main_cart_count2').html(get_main_value);
$('#main_cart_count3').html(get_main_value);


var main_quantity = $('#gv'+id_for_pass).val()

                 var get_value = parseInt(main_quantity+1);


  $.ajax({
            url: "https://spotlightattires.com/cart_page_all_update",
            method: 'GET',
            data: {id_for_pass:id_for_pass,get_value:get_value},
            success: function(data) {
              $("#main_content_table234").html('');
              $("#main_content_table234").html(data);

              location.reload(true);
            }
        });


});
</script>