

<div class="minicart__product">

    <?php  $totalProductPrice = 0; ?>
    @foreach($cartCollection1 as $item)
    <div class="minicart__product--items d-flex">
        <div class="minicart__thumb">
            <a href="#"><img src="{{ $url_name }}{{$item->attributes->image }}" alt="prduct-img"></a>
        </div>
        <div class="minicart__text">
            <h3 class="minicart__subtitle h4"><a href="#">{{ $item->name }}</a></h3>
            @if($item->attributes->color == 0)

            @else
            <span class="color__variant"><b>Color:</b> {{$item->attributes->color }}</span>
            @endif


            @if($item->attributes->size == 0)

            @else
            <span class="color__variant"><b>Size:</b> {{$item->attributes->size }}</span>
            @endif



            <div class="minicart__price">
                <span class="current__price">৳ {{ $item->price }}</span>
                {{-- <span class="old__price">$140.00</span> --}}
            </div>
            <div class="minicart__text--footer d-flex align-items-center">
                <div class="quantity__box minicart__quantity">
                    <button type="button"  class="quantity__value " id="dcrease_data_from_side_bar{{$item->id}}" aria-label="quantity value" value="Decrease Value">-</button>
                    <label>
                        <input type="number" class="quantity__number" value="{{ $item->quantity }}" id="sidebarQuantity{{$item->id}}" />
                    </label>
                    <button type="button" class="quantity__value " id="increase_data_from_side_bar{{$item->id}}"  value="Increase Value">+</button> 
                </div>
                {{-- <button class="minicart__product--remove">Remove</button> --}}
            </div>
        </div>
    </div>

    <?php $totalProductPrice = $totalProductPrice  +  ($item->price*$item->quantity)  ?>
    @endforeach
</div>
<div class="minicart__amount">
    {{-- <div class="minicart__amount_list d-flex justify-content-between">
        <span>Sub Total:</span>
        <span><b>$240.00</b></span>
    </div> --}}
    <div class="minicart__amount_list d-flex justify-content-between">
        <span>Total:</span>
        <span><b> ৳ {{ $totalProductPrice }}</b></span>
    </div>
</div>

<div class="minicart__button d-flex justify-content-center mt-4">
    <a class="primary__btn minicart__button--link" href="{{ route('cart') }}">View cart</a>
    <a class="primary__btn minicart__button--link" href="{{ route('check_out_from_cart') }}">Checkout</a>
</div>

 <script>
    $(document).ready(function(){
          $("[id^=increase_data_from_side_bar]").click(function(){
              
              
                var currentId  = $(this).attr('id');
                var after_string_slice_id = currentId.slice(27);
                
                 var previous_cart_quantity  = parseInt($('#main_cart_count1').html());
                 
                 var get_main_value = parseInt(previous_cart_quantity+1);
                 
                 var main_quantity = $('#sidebarQuantity'+after_string_slice_id).val()
                 
                 var final_quantity = parseInt(main_quantity+1);
                
                //alert(main_quantity);
                
                $('#main_cart_count1').html(get_main_value);
                $('#main_cart_count2').html(get_main_value);
               $('#main_cart_count3').html(get_main_value);
               
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

               
               
               
              
          });
          
          ///////
          
           $("[id^=dcrease_data_from_side_bar]").click(function(){
              
              
                var currentId  = $(this).attr('id');
                var after_string_slice_id = currentId.slice(26);
                
                //alert(after_string_slice_id);
                
                  var previous_cart_quantity  = parseInt($('#main_cart_count1').html());
                 
                 var get_main_value = parseInt(previous_cart_quantity-1);
                
           
                 
                 
                
               var main_quantity = $('#sidebarQuantity'+after_string_slice_id).val()
                 
                 var final_quantity = parseInt(main_quantity-1);
                 
                 //alert(final_quantity);
                
            $('#main_cart_count1').html(get_main_value);
            $('#main_cart_count2').html(get_main_value);
            $('#main_cart_count3').html(get_main_value);
            
            if(final_quantity == 0){
                
                               $.ajax({
url: "{{ route('delete_from_sidebar_new') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

$("#main_sidebar").html('');
$('#main_sidebar').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Delete From Cart!');

}

});
                
            }else{
                               $.ajax({
url: "{{ route('dcrease_data_from_side_bar') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id,'final_quantity':final_quantity
},
success: function (data) {

$("#main_sidebar").html('');
$('#main_sidebar').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Remove From Cart!');

}

});
                
            }
              
              
          });
  
    });
    </script>
