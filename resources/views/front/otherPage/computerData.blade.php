@if($mainVal == 'All')
<?php
                        $recent_odrder_list = DB::table('invoices')->where('client_slug',Auth::user()->id)->latest()->get();

                        ?>
                        
                          @foreach($recent_odrder_list as $all_recent_list)
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items">#{{ $all_recent_list->order_id }}</td>
                                            <td class="account__table--body__child--items">{{\Carbon\Carbon::parse($all_recent_list->created_at)->format('d M Y')}}</td>
                                            <td class="account__table--body__child--items">

                                           @if(empty($all_recent_list->delivery_status) )
                                Cash On Delivery

                            @elseif($all_recent_list->delivery_status == 'Delivered')
                       Paid

@else
 Cash On Delivery
 @endif

                                            </td>
                                            <td class="account__table--body__child--items">


                                @if(empty($all_recent_list->delivery_status) )
                                Processing

                            @else
                            {{ $all_recent_list->delivery_status }}



                            @endif




                                            </td>
                                            <td class="account__table--body__child--items">{{ $all_recent_list->grand_total }}</td>
                                            <td class="account__table--body__child--items">
                                        
                                                <a class="product__items--action__btn" data-open="mmodal{{ $all_recent_list->id }}" href="javascript:void(0)">
      View
    </a>
              <!-- Modal -->
    <!-- Quickview Wrapper -->
    <div class="modal" id="mmodal{{ $all_recent_list->id }}" data-animation="slideInUp">
        <div class="modal-dialog quickview__main--wrapper">
            <header class="modal-header quickview__header">
                <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
            </header>
            <div class="quickview__inner">
                <div class="row row-cols-lg-12 row-cols-md-12">
                    <div class="col">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel&quot;">Order Details</h5>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">{{ $all_recent_list->order_id }}</span></p>
                                
                                <?php
                        $first_name = DB::table('delivary_addresses')->where('user_id',$all_recent_list->client_slug)->value('first_name');
$invoice_details = DB::table('invoice_details')->where('invoice_id',$all_recent_list->id)->latest()->get();
                        ?>
                        
                        
                                <p class="mb-4">Billing Name: <span class="text-primary">{{$first_name}}</span></p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap">
                                        <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($invoice_details as $all_invoice_details)
                                            <?php  
                                            $product_details = DB::table('main_products')->where('id',$all_invoice_details->product_id)->first();
                                            ?>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="https://adminpanel.spotlightattires.com/{{$product_details->front_image}}" alt="" style="height:50px;" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">{{$product_details->product_name}} ({{$all_invoice_details->size}})</h5>
                                                    <p class="text-muted mb-0">৳ {{$all_invoice_details->price}} x {{$all_invoice_details->qty}}</p>
                                                </div>
                                            </td>
                                            <td>৳ {{$all_invoice_details->price* $all_invoice_details->qty}}</td>
                                        </tr>
                                       @endforeach
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                            </td>
                                            <td>
                                                ৳ {{$all_recent_list->total_net_price}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Shipping:</h6>
                                            </td>
                                            <td>
                                               ৳  {{$all_recent_list->delivery_charge}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Total:</h6>
                                            </td>
                                            <td>
                                                ৳ {{$all_recent_list->grand_total}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                                            <td class="account__table--body__child--items">#{{ $all_recent_list->order_id }}</td>
                                            <td class="account__table--body__child--items">{{\Carbon\Carbon::parse($all_recent_list->created_at)->format('d M Y')}}</td>
                                            <td class="account__table--body__child--items">

                                           @if(empty($all_recent_list->delivery_status) )
                                Cash On Delivery

                            @elseif($all_recent_list->delivery_status == 'Delivered')
                       Paid

@else
 Cash On Delivery
 @endif

                                            </td>
                                            <td class="account__table--body__child--items">


                                @if(empty($all_recent_list->delivery_status) )
                                Processing

                            @else
                            {{ $all_recent_list->delivery_status }}



                            @endif




                                            </td>
                                            <td class="account__table--body__child--items">{{ $all_recent_list->grand_total }}</td>
                                            <td class="account__table--body__child--items">
                                        
                                                <a class="product__items--action__btn" data-open="mmodal{{ $all_recent_list->id }}" href="javascript:void(0)">
      View
    </a>
              <!-- Modal -->
    <!-- Quickview Wrapper -->
    <div class="modal" id="mmodal{{ $all_recent_list->id }}" data-animation="slideInUp">
        <div class="modal-dialog quickview__main--wrapper">
            <header class="modal-header quickview__header">
                <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
            </header>
            <div class="quickview__inner">
                <div class="row row-cols-lg-12 row-cols-md-12">
                    <div class="col">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel&quot;">Order Details</h5>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">{{ $all_recent_list->order_id }}</span></p>
                                
                                <?php
                        $first_name = DB::table('delivary_addresses')->where('user_id',$all_recent_list->client_slug)->value('first_name');
$invoice_details = DB::table('invoice_details')->where('invoice_id',$all_recent_list->id)->latest()->get();
                        ?>
                        
                        
                                <p class="mb-4">Billing Name: <span class="text-primary">{{$first_name}}</span></p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap">
                                        <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($invoice_details as $all_invoice_details)
                                            <?php  
                                            $product_details = DB::table('main_products')->where('id',$all_invoice_details->product_id)->first();
                                            ?>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="https://adminpanel.spotlightattires.com/{{$product_details->front_image}}" alt="" style="height:50px;" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">{{$product_details->product_name}} ({{$all_invoice_details->size}})</h5>
                                                    <p class="text-muted mb-0">৳ {{$all_invoice_details->price}} x {{$all_invoice_details->qty}}</p>
                                                </div>
                                            </td>
                                            <td>৳ {{$all_invoice_details->price* $all_invoice_details->qty}}</td>
                                        </tr>
                                       @endforeach
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                            </td>
                                            <td>
                                                ৳ {{$all_recent_list->total_net_price}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Shipping:</h6>
                                            </td>
                                            <td>
                                               ৳  {{$all_recent_list->delivery_charge}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Total:</h6>
                                            </td>
                                            <td>
                                                ৳ {{$all_recent_list->grand_total}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                                                </td>
                                        </tr>
                                        @endforeach

@endif