



                            <legend class="product__variant--title mb-8">Size :</legend>
                            @foreach($assaign_color_all as $key=>$all_assaign_size_all)

<?php    

$checkQuantity = DB::table('product_colors')->where('product_name',$all_assaign_size_all->product_name)
  ->where('size',$all_assaign_size_all->size_name)->value('quantity');


?>

                            @if(($key+1) == 1)
@if($checkQuantity == 0)

@else
                            <input id="weight{{ $key+1 }}" name="weight" type="radio" value="{{ $all_assaign_size_all->size_name }}" checked>
                            <label class="variant__size--value red" for="weight{{ $key+1 }}">{{ $all_assaign_size_all->size_name }}</label>
@endif

                            @else

                            @if($checkQuantity == 0)

@else
                            <input id="weight{{ $key+1 }}" name="weight" type="radio" value="{{ $all_assaign_size_all->size_name }}" >
                            <label class="variant__size--value red" for="weight{{ $key+1 }}">{{ $all_assaign_size_all->size_name }}</label>
@endif

                            @endif
                            @endforeach



