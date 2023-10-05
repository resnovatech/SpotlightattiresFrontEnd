@if($mainVal == 'All')
<?php
                        $recent_odrder_list = DB::table('invoices')->where('client_slug',Auth::user()->id)->latest()->get();

                        ?>
                            @foreach($recent_odrder_list as $all_recent_list)
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items">
                                                <strong>Order</strong>
                                                <span>#{{ $all_recent_list->order_id }}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Date</strong>
                                                <span>{{\Carbon\Carbon::parse($all_recent_list->created_at)->format('d M Y')}}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Payment Status</strong>
                                                <span>  
@if(empty($all_recent_list->delivery_status) )
                                Cash On Delivery

                            @elseif($all_recent_list->delivery_status == 'Delivered')
                       Paid

@else
 Cash On Delivery
 @endif
</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Fulfillment Status</strong>
                                                <span>
    
                                @if(empty($all_recent_list->delivery_status) )
                                Processing

                            @else
                            {{ $all_recent_list->delivery_status }}



                            @endif</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Total</strong>
                                                <span>{{ $all_recent_list->grand_total }}</span>
                                            </td>
                                            <td class="account__table--body__child--items"> <strong>          <button type="button" class="newsletter__subscribe--button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $all_recent_list->id }}">
View
</button></strong>
</td>
                                           
                                        </tr>
                                        @endforeach

@else
<?php
                        $recent_odrder_list = DB::table('invoices')->where('client_slug',Auth::user()->id)
                         ->whereYear('created_at', date('Y'))->latest()->get();

                        ?>
                        
                            @foreach($recent_odrder_list as $all_recent_list)
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items">
                                                <strong>Order</strong>
                                                <span>#{{ $all_recent_list->order_id }}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Date</strong>
                                                <span>{{\Carbon\Carbon::parse($all_recent_list->created_at)->format('d M Y')}}</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Payment Status</strong>
                                                <span>  
@if(empty($all_recent_list->delivery_status) )
                                Cash On Delivery

                            @elseif($all_recent_list->delivery_status == 'Delivered')
                       Paid

@else
 Cash On Delivery
 @endif
</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Fulfillment Status</strong>
                                                <span>
    
                                @if(empty($all_recent_list->delivery_status) )
                                Processing

                            @else
                            {{ $all_recent_list->delivery_status }}



                            @endif</span>
                                            </td>
                                            <td class="account__table--body__child--items">
                                                <strong>Total</strong>
                                                <span>{{ $all_recent_list->grand_total }}</span>
                                            </td>
                                            <td class="account__table--body__child--items"> <strong>          <button type="button" class="newsletter__subscribe--button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $all_recent_list->id }}">
View
</button></strong>
</td>
                                           
                                        </tr>
                                        @endforeach

@endif