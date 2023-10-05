<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;
use Mail;
use DB;
use URL;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserVerify;
Use App\Models\Client;
Use App\Models\CartTbl;
use Illuminate\Support\Str;
use App\Models\Messagesection;
use App\Models\Offerprice;
use App\Models\Review;
use App\Models\DelivaryAddress;
use App\Models\InvoiceDetail;
use App\Models\Invoice;
use App\Models\Wishlist;
use DateTime;
use GuzzleHttp;
use DateTimezone;
class BkashController extends Controller
{
    private $base_url;
    private $app_key;
    private $app_secret;
    private $username;
    private $password;


    public function __construct()
    {
        // Sandbox
        //$this->base_url = 'https://tokenized.sandbox.bka.sh/v1.2.0-beta';
        // Live
$this->base_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta';
$BKASH_CHECKOUT_URL_USER_NAME ='01965665880';
$BKASH_CHECKOUT_URL_PASSWORD = 'iRI:SK7tWbz';
$BKASH_CHECKOUT_URL_APP_KEY = 'JTKshr429pkbVxT6sJYjUrDPtc';
$BKASH_CHECKOUT_URL_APP_SECRET ='cdjFKfCvfzZxReRTogc60eASv9ZnNDZrtu3K5GzXCUunTyW1CxYz';


        $this->app_key = $BKASH_CHECKOUT_URL_APP_KEY;
        $this->app_secret = $BKASH_CHECKOUT_URL_APP_SECRET;
        $this->username = $BKASH_CHECKOUT_URL_USER_NAME;
        $this->password = $BKASH_CHECKOUT_URL_PASSWORD;




//$this->base_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta';
// $BKASH_CHECKOUT_URL_USER_NAME ='sandboxTokenizedUser02';
// $BKASH_CHECKOUT_URL_PASSWORD = 'sandboxTokenizedUser02@12345';
// $BKASH_CHECKOUT_URL_APP_KEY = '4f6o0cjiki2rfm34kfdadl1eqq';
// $BKASH_CHECKOUT_URL_APP_SECRET ='2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b';


//         $this->app_key = $BKASH_CHECKOUT_URL_APP_KEY;
//         $this->app_secret = $BKASH_CHECKOUT_URL_APP_SECRET;
//         $this->username = $BKASH_CHECKOUT_URL_USER_NAME;
//         $this->password = $BKASH_CHECKOUT_URL_PASSWORD;








    }

    public function authHeaders(){


        return array(
            'Content-Type:application/json',
            'Authorization:' .$this->grant(),
            'X-APP-Key:'.$this->app_key
        );
    }

    public function curlWithBody($url,$header,$method,$body_data_json){
        $curl = curl_init($this->base_url.$url);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_POSTFIELDS, $body_data_json);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function grant()
    {




        $header = array(
                'Content-Type:application/json',
                'username:'.$this->username,
                'password:'.$this->password
                );

                //dd($header);
        $header_data_json=json_encode($header);

        $body_data = array('app_key'=>$this->app_key, 'app_secret'=>$this->app_secret);
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/token/grant',$header,'POST',$body_data_json);

          // dd($response);
        $token = json_decode($response)->id_token;

        return $token;
    }

    public function payment(Request $request)
    {
        return view('CheckoutURL.pay');
    }

    public function createPayment(Request $request)
    {


        //dd(Session::get('bkashAmount'));
        $header =$this->authHeaders();

        $website_url = URL::to("/");

        $body_data = array(
            'mode' => '0011',
            'payerReference' => ' ',
            'callbackURL' => $website_url.'/bkash/callback',
            'amount' => Session::get('bkashAmount') ? Session::get('bkashAmount') : 10,
            //'amount' =>1,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => "Inv".Str::random(8) // you can pass here OrderID
        );
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/create',$header,'POST',$body_data_json);

        return redirect((json_decode($response)->bkashURL));
    }

    public function executePayment($paymentID)
    {

        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $paymentID
        );
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/execute',$header,'POST',$body_data_json);

        $res_array = json_decode($response,true);

        if(isset($res_array['trxID'])){
            // your database insert operation
            // save $response

        }

        return $response;
    }

    public function queryPayment($paymentID)
    {

        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $paymentID,
        );
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/payment/status',$header,'POST',$body_data_json);

        $res_array = json_decode($response,true);

        if(isset($res_array['trxID'])){
            // your database insert operation
            // insert $response to your db

        }

         return $response;
    }

    public function callback(Request $request)
    {
        $allRequest = $request->all();
        if(isset($allRequest['status']) && $allRequest['status'] == 'failure'){
            return view('front.otherPage.fail')->with([
                'response' => 'Payment Failure'
            ]);

        }else if(isset($allRequest['status']) && $allRequest['status'] == 'cancel'){
            return view('front.otherPage.fail')->with([
                'response' => 'Payment Cancell'
            ]);

        }else{

            $response = $this->executePayment($allRequest['paymentID']);

            $arr = json_decode($response,true);

            if(array_key_exists("statusCode",$arr) && $arr['statusCode'] != '0000'){
                return view('front.otherPage.fail')->with([
                    'response' => $arr['statusMessage'],
                ]);
            }else if(array_key_exists("message",$arr)){
                // if execute api failed to response
                sleep(1);
                $query = $this->queryPayment($allRequest['paymentID']);


                return view('front.otherPage.success')->with([
                    'response' => $query
                ]);
            }


            //new


            $lastIdInvoice = Invoice::latest()->value('id');

              //dd(11);



             $search_ship_address  =  DelivaryAddress::where('user_id',Auth::user()->id)->value('first_name');

             if(empty($search_ship_address)){
                 $shipping_address = new DelivaryAddress();
                 $shipping_address->first_name = Session::get('first_name');
                 $shipping_address->user_id = Auth::user()->id;
                 $shipping_address->last_name = Session::get('last_name');
                 $shipping_address->address = Session::get('address');

                 $shipping_address->phone = Session::get('ephone');
                 $shipping_address->email = Session::get('ephone');
                 $shipping_address->town =Session::get('town');
                  $shipping_address->division = Session::get('division');
                 $shipping_address->district = Session::get('district');
                 $shipping_address->post_code = Session::get('post_code');
                 $shipping_address->save();

             }else{

                 $search_ship_address1  =  DelivaryAddress::where('user_id',Auth::user()->id)->value('id');

                 $shipping_address =DelivaryAddress::find($search_ship_address1);
                 $shipping_address->first_name = Session::get('first_name');
                 $shipping_address->last_name = Session::get('last_name');
                 $shipping_address->address = Session::get('address');
                 $shipping_address->division = Session::get('division');
                 $shipping_address->phone = Session::get('ephone');
                 $shipping_address->email = Session::get('ephone');
                 $shipping_address->town = Session::get('town');
                 $shipping_address->district = Session::get('district');
                 $shipping_address->post_code = Session::get('post_code');
                 $shipping_address->save();

             }

          //shipping_address_add



             $shipping_address_id = $shipping_address->id;

          //end shipping_address_add


        $clientType = Client::where('user_id',Auth::user()->id)->value('c_type');

        //newCode For Database Cart


               $userCartInfo = DB::table('cart_tbls')->where('status',0)->where('user_id',Auth::user()->id)->latest()->get();
               $totalProductPrice = 0;
              $totalProductPriceforDiscount=0;
               foreach($userCartInfo as $item){

                   $mainProductInfo = DB::table('main_products')->where('id',$item->product_id)->first();

                   if($mainProductInfo->discount == 0){

                                            $totalProductPriceforDiscount = $totalProductPriceforDiscount  +  ($mainProductInfo->selling_price*$item->quantity);

                                        }


                   $totalProductPrice = $totalProductPrice  +  (($mainProductInfo->selling_price - $mainProductInfo->discount)*$item->quantity);
               }


        //complete newCode for Database Cart

            if($clientType == 'Silver'){

                   $getClientWiseDiscount = ($totalProductPriceforDiscount*5)/100;
                   $getClientWiseDiscountFinal = $totalProductPrice - $getClientWiseDiscount;

                    }elseif($clientType == 'Platinum'){
  $getClientWiseDiscount = ($totalProductPriceforDiscount*10)/100;
                   $getClientWiseDiscountFinal = $totalProductPrice - $getClientWiseDiscount;


                 }else{
$getClientWiseDiscount = 0;
  $getClientWiseDiscountFinal = 0;
                  }


                  //new code for cupon

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


                  //end new code for cupon


         $database_save = new Invoice();
         $database_save->client_slug =  Auth::user()->id;
         $database_save->order_id = $lastIdInvoice.Auth::user()->id;
         $database_save->payment_term = 'web';
         $database_save->pay_date = date('d-m-Y');
         $database_save->due_date = date('d-m-Y');
         $database_save->s_pay_date = date('Y-m-d');
         $database_save->s_due_date = date('Y-m-d');

         $database_save->order_from = 'web';
         $database_save->shippingaddres_id = $shipping_address_id;

         if(empty($getCuponId)){

              $database_save->total_net_price = $totalProductPrice - $getClientWiseDiscount;
         $database_save->total_discount = $getClientWiseDiscount;
         $database_save->total_vat_tax = 0;

         if($request->ship_price == '0'){
             $database_save->delivery_charge = Session::get('ship_price_c');
             $database_save->grand_total = (Session::get('ship_price_c')+$totalProductPrice) - $getClientWiseDiscount;
             $database_save->total_pay = (Session::get('ship_price_c')+$totalProductPrice) - $getClientWiseDiscount;
             $database_save->cod = (Session::get('ship_price_c')+$totalProductPrice) - $getClientWiseDiscount;
         }else{
             $database_save->delivery_charge = Session::get('ship_price_c');
             $database_save->grand_total = (Session::get('ship_price_c')+$totalProductPrice) - $getClientWiseDiscount;
             $database_save->total_pay = (Session::get('ship_price_c')+$totalProductPrice) - $getClientWiseDiscount;
             $database_save->cod = (Session::get('ship_price_c')+$totalProductPrice) - $getClientWiseDiscount;

         }

         }else{




         $database_save->total_net_price = $totalProductPrice - $disval;
         $database_save->total_discount = $disval;
         $database_save->total_vat_tax = 0;

         if($request->ship_price == '0'){
             $database_save->delivery_charge = Session::get('ship_price_c');
             $database_save->grand_total = (Session::get('ship_price_c')+$totalProductPrice) - $disval;
             $database_save->total_pay = (Session::get('ship_price_c')+$totalProductPrice) - $disval;
             $database_save->cod = (Session::get('ship_price_c')+$totalProductPrice) - $disval;
         }else{
             $database_save->delivery_charge = Session::get('ship_price_c');
             $database_save->grand_total = (Session::get('ship_price_c')+$totalProductPrice) - $disval;
             $database_save->total_pay = (Session::get('ship_price_c')+$totalProductPrice) - $disval;
             $database_save->cod = (Session::get('ship_price_c')+$totalProductPrice) - $disval;

         }


}




         $database_save->due = 0;
         $database_save->order_notes = 0;
         $database_save->order_status = 'Web';
         $database_save->save();

                $main_order_id = $database_save->id;
                $main_t_id =  $database_save->order_id;

                $cartCollection = \Cart::getContent();
              foreach ($userCartInfo as $cartProduct){

                  $mainProductInfo = DB::table('main_products')->where('id',$cartProduct->product_id)->first();
                  $sellQuantity = DB::table('main_products')->where('id',$cartProduct->product_id)->value('trade_count');

                  if(empty($sellQuantity)){

                          DB::table('main_products')->where('id',$cartProduct->product_id)
                          ->update(['trade_count' => 1]);

                  }else{

                      $finalQuantity = $sellQuantity + 1;

                        DB::table('main_products')->where('id',$cartProduct->product_id)
                          ->update(['trade_count' => $finalQuantity]);

                  }


                     $getIdFromQuantity = DB::table('product_quantities')
                  ->where('product_name',$cartProduct->product_id)->value('quantity');


                  $ffr = $getIdFromQuantity - $cartProduct->quantity;

                    $getIdFromQuantityu = DB::table('product_quantities')
                  ->where('product_name',$cartProduct->product_id)->update(['quantity' => $ffr]);

                  $getProductColor = DB::table('product_colors')
->where('product_name',$cartProduct->product_id)->where('size',$cartProduct->size)->value('quantity');

$ffrc = $getProductColor - $cartProduct->quantity;

            $getProductColoru = DB::table('product_colors')
->where('product_name',$cartProduct->product_id)->where('size',$cartProduct->size)->update(['quantity' => $ffrc]);



                $form= new InvoiceDetail();
                 $form->product_id=$cartProduct->product_id;
                 $form->size=$cartProduct->size;
                 $form->color=$cartProduct->color;
                 $form->qty=$cartProduct->quantity;
                 $form->price=$mainProductInfo->selling_price - $mainProductInfo->discount;
                 $form->total_price=($mainProductInfo->selling_price - $mainProductInfo->discount)*$cartProduct->quantity;
                 $form->discount=0;
                 $form->discount_price=($mainProductInfo->selling_price - $mainProductInfo->discount)*$cartProduct->quantity;
                 $form->invoice_id =  $main_order_id;
                 $form->client_slug = Auth::user()->id;
                 $form->order_id =  $main_t_id;
                 $form->save();
              }

              \Cart::clear();
     $mid= $main_t_id;


     //updateCuponCode

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


          $checkCodeFirst = DB::table('cupons')
                                           ->where('id',$getCuponId)
                                           ->first();


                                    if(!$checkCodeFirst){
                                    }else{

                                            if($checkCodeFirst->coupon_type == "Single Times"){

                                          DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',0) ->update([
           'status' => 1
        ]);



                                            }else{
                 $getCount = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',0)->orderBy('id','desc')->value('count');

                    $calData = $getCount + 1;

                 if(empty($getCount)){
                                  DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1) ->update([
                                   'mstatus' => 0,
           'status' => 1,
            'count' => $calData
        ]);
                 }else{

                                  DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',0) ->update([
                                   'mstatus' => 0,
           'status' => 1,
            'count' => $calData
        ]);

                 }





                                            }
    }

     //finalUpdateCuponCode




$userCartInfoDeleteData = DB::table('cart_tbls')->where('status',0)
->where('user_id',Auth::user()->id)->delete();


session()->forget('discountMain');
// session()->forget('cuponId');

              return redirect()->route('success_page',['id'=>$mid]);

            //new

            // return view('front.otherPage.success')->with([
            //     'response' => $response
            // ]);

        }

    }

    public function getRefund(Request $request)
    {
        return view('CheckoutURL.refund');
    }

    public function refundPayment(Request $request)
    {
        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $request->paymentID,
            'amount' => $request->amount,
            'trxID' => $request->trxID,
            'sku' => 'sku',
            'reason' => 'Quality issue'
        );

        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/payment/refund',$header,'POST',$body_data_json);

        // your database operation
        // save $response

        return view('CheckoutURL.refund')->with([
            'response' => $response,
        ]);
    }
}
