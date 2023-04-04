<legend class="product__variant--title mb-8">Color :</legend>

@foreach($assaign_color_all as $key=>$all_assaign_color_all)

<?php

$color_code =  DB::table('attribute_details')->where('name_list',$all_assaign_color_all->color_id)->value('name_code');

?>
@if(($key+1) == 1)
                                        <input id="color-red{{ $key+1 }}" class="color" value="{{ $all_assaign_color_all->color_id }}" name="color" type="radio" checked>
                                        <label class="variant__color--value red" for="color-red{{ $key+1 }}" title="Red" style="background-color: {{ $color_code }}"></label>

                                        @else

                                        <input id="color-red{{ $key+1 }}" value="{{ $all_assaign_color_all->color_id }}" name="color" type="radio" >
                                        <label class="variant__color--value red" for="color-red{{ $key+1 }}" title="Red" style="background-color: {{ $color_code }}"></label>


                                        @endif

                            @endforeach



