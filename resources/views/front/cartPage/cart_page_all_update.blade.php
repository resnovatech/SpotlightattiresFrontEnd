<div class="container-fluid">
            <div class="cart__section--inner">

                    <h2 class="cart__title mb-40">Shopping Cart</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <table class="cart__table--inner">
                                    <thead class="cart__table--header">
                                        <tr class="cart__table--header__items">
                                            <th class="cart__table--header__list">Product</th>
                                            <th class="cart__table--header__list">Price</th>
                                            <th class="cart__table--header__list">Quantity</th>
                                            <th class="cart__table--header__list">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__table--body">
                                    @foreach($cartCollection1 as $item)
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <a href="{{route('cart_clear_single_data',$item->id)}}" class="cart__remove--btn" aria-label="search button" type="button">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                                    </a>
                                                    <div class="cart__thumbnail">
                                                        <a href="#"><img class="border-radius-5" src="{{ $url_name }}{{$item->attributes->image }}" alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h4 class="cart__content--title"><a href="#">  {{ $item->name }}</a></h4>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">৳ {{ $item->price }}</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                           

                                                                                                        <input type="hidden" class="" name="id" value="{{ $item->id }}"/>

                                                <div class="quantity__box">
                                                    <button type="button" class="quantity__value quickview__value--quantity " aria-label="quantity value" value="Decrease Value"  id="mmi{{ $item->id }}">-</button>
                                                    <label>
                                                        <input type="number" class="quantity__number quickview__value--number" name="quantity" minlength="1" value="{{ $item->quantity }}" id="gv{{ $item->id }}"/>
                                                    </label>
                                                    <button type="button" class="quantity__value quickview__value--quantity " aria-label="quantity value" value="Increase Value"  id="mpl{{ $item->id }}">+</button>
                                                </div>

                                              
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price end">৳ {{ $item->price*$item->quantity }}</span>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
                                                <td class="cart__summary--amount text-right"> ৳  {{ \Cart::getTotal() }}</td>
                                            </tr>
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

            </div>
        </div>
        <!--get-->
 <script>

$("[id^=mmi]").click(function(){
    
    
      var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(3);

var  after_string_slice_id = main_id.slice(3);

var get_value_first = parseInt($('#gv'+id_for_pass).val());

if(isNaN(get_value_first)){



    var get_value2 = parseInt($('#gv'+id_for_pass).val(1));

    var get_value = 1;

}

else{


    if(get_value_first == 0){
        var get_value2 = parseInt($('#gv'+id_for_pass).val(0));
        var get_value = parseInt(0);
    }else{
        var get_value2 = parseInt($('#gv'+id_for_pass).val(get_value_first-1));
        var get_value = parseInt(get_value_first-1);

    }


    // var get_value = parseInt(get_value_first-1);

}
//alert(id_for_pass);

var quantity = 1;

   $.ajax({
            url: "{{ route('cart_page_all_update') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass,get_value:get_value},
            success: function(data) {
              $("#main_content_table234").html('');
              $("#main_content_table234").html(data);
            }
        });
        
        
        
               $.ajax({
url: "{{ route('add_to_card_all_product') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

$("#main_sidebar").html('');
$('#main_sidebar').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Added To Cart!');

}

});

//////////


$.ajax({
url: "{{ route('add_to_cart_count') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

    $("#main_cart_count1").html('');
$('#main_cart_count1').html(data);


    $("#main_cart_count2").html('');
$('#main_cart_count2').html(data);

$("#main_cart_count3").html('');
$('#main_cart_count3').html(data);



}

});





});
////

$("[id^=mpl]").click(function(){
    
    

// alert(22);

  var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(3);
var  after_string_slice_id = main_id.slice(3);
var get_value_first = parseInt($('#gv'+id_for_pass).val());

if(isNaN(get_value_first)){



    var get_value2 = parseInt($('#gv'+id_for_pass).val(1));

    var get_value = 1;

}

else{
    var get_value2 = parseInt($('#gv'+id_for_pass).val(get_value_first+1));

    var get_value = parseInt(get_value_first+1);

}

//
var quantity = 1;

   $.ajax({
            url: "{{ route('cart_page_all_update') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass,get_value:get_value},
            success: function(data) {
              $("#main_content_table234").html('');
              $("#main_content_table234").html(data);
            }
        });
        
                      $.ajax({
url: "{{ route('add_to_card_all_product') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

$("#main_sidebar").html('');
$('#main_sidebar').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Added To Cart!');

}

});

//////////


$.ajax({
url: "{{ route('add_to_cart_count') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

    $("#main_cart_count1").html('');
$('#main_cart_count1').html(data);


    $("#main_cart_count2").html('');
$('#main_cart_count2').html(data);

$("#main_cart_count3").html('');
$('#main_cart_count3').html(data);



}

});


});
</script>