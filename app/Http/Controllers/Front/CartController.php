<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;
use Mail;
use DB;
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
use App\Http\Controllers\Front\BkashController;
class CartController extends Controller
{

    public function increaseDataFromCartPage(Request $request){
        if($request->get_value == 0){

            // \Cart::remove($request->id_for_pass);

            $updateData = CartTbl::where('id',$request->id_for_pass)
            ->delete();

        }else{



              $updateData = CartTbl::where('id',$request->id_for_pass)
     ->update([
           'quantity' => $request->get_value
        ]);


        }


          $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }

                         return 1;

    }



    public function checkCartCondition(Request $request){

        $subAmount = $request->subAmount;
        $code = $request->code;

        $checkCodeFirst = DB::table('cupons')
        ->where('coupon_code',$code)->where('status',1)->first();



        if(!$checkCodeFirst){


            $data = 0;
            $msg  = 'Cupon Not Available';

        }else{


           $now = date('Y-m-d');

        if($now >= $checkCodeFirst->start_date && $now <= $checkCodeFirst->expiry_date ){


        $clientsType = DB::table('clients')->where('user_id',Auth::user()->id)
            ->value('c_type');

            $usersLists = $checkCodeFirst->users;
            $selUsers = explode(',',$usersLists);

            if((in_array('All',$selUsers))){

                //start user new



        if($checkCodeFirst->amount_limit <= $subAmount ){


            $categoryLists = $checkCodeFirst->categories;
            $selCategories = explode(',',$categoryLists);





             $productIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
                   ->where('status',0)->latest()->get();



                     //check category codition and cupon count
                     foreach($productIdList as $allProductIdList){

                         $getProductSlug =DB::table('main_products')
                         ->where('id',$allProductIdList->product_id)
                         ->value('slug');

                         $getCatName = DB::table('assaign_categories')
                      ->where('product_name',$getProductSlug)->orderBy('id','asc')
                         ->first();





                      $finalGet =$getCatName->cat_name;
                   $finalGet1 =DB::table('assaign_categories')
                      ->where('product_name',$getProductSlug)->orderBy('id','asc')
                         ->value('cat_name');

                         //dd($finalGet1);


                      if((in_array('All',$selCategories))){

                          //time check

                          if($checkCodeFirst->coupon_type == 'Single Times'){
                              //single time
                              dd(0);
                               $checkCuponHistoryTable = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1)
                              ->where('cupon_id',$checkCodeFirst->id)
                              ->first();


                                   if(!$checkCuponHistoryTable){

                                  DB::table('cupon_history')->insert(
     array(
            'user_id'     =>Auth::user()->id,
            'status'     =>   0,
            'cupon_id'   => $checkCodeFirst->id
     )
);
//new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCodeFirst->id);
Session::put('discountMain', $disval);

          $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          }elseif($checkCuponHistoryTable->status == 0){

                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);
               //new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);
                          } elseif($checkCuponHistoryTable->status == 1){




                          $data = 0;
                          $msg  = 'You Have Already Used This Cupon';

                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                              }

                              //end single time

                          }elseif($checkCodeFirst->coupon_type == 'Multiple Times'){

                           //multiple time
                            $checkCuponHistoryTable = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1)
                              ->where('cupon_id',$checkCodeFirst->id)
                              ->first();

                              if(!$checkCuponHistoryTable){

                                  DB::table('cupon_history')->insert(
     array(
            'user_id'     =>Auth::user()->id,
            'status'     =>   0,
            'count'     =>   0,
            'cupon_id'   => $checkCodeFirst->id
     )
);

    //new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCodeFirst->id); Session::put('discountMain', $disval);

                       $data = $disval;



         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);


                          }elseif($checkCuponHistoryTable->status == 0){

                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);

        //new code
    //new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code

Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);
                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          } elseif($checkCuponHistoryTable->status == 1 && $checkCuponHistoryTable->count < $checkCodeFirst->coupon_use){


                                   DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);

        //new code
    //new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code

Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);
                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);



                              }else{

                                       $data = 0;
                          $msg  = 'You Have Already Used This Cupon';

                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                              }

                           //end  //multiple time

                          }


                       //end time check
                      }elseif((in_array($finalGet,$selCategories))){

                            // dd(1);
                          if($checkCodeFirst->coupon_type == 'Single Times'){
                              //single time

                               $checkCuponHistoryTable = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1)
                              ->where('cupon_id',$checkCodeFirst->id)
                              ->first();


                                   if(!$checkCuponHistoryTable){

                                  DB::table('cupon_history')->insert(
     array(
            'user_id'     =>Auth::user()->id,
            'status'     =>   0,
            'cupon_id'   => $checkCodeFirst->id
     )
);
            //new code
    //new code

     $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();



    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code


Session::put('cuponId',$checkCodeFirst->id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          }elseif($checkCuponHistoryTable->status == 0){

                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);

        //new code
    //new code

      $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
         ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          } elseif($checkCuponHistoryTable->status == 1){




                          $data = 0;
                          $msg  = 'You Have Already Used This Cupon';

                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                              }

                              //end single time

                          }elseif($checkCodeFirst->coupon_type == 'Multiple Times'){
                           //multiple time
                            $checkCuponHistoryTable = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1)
                              ->where('cupon_id',$checkCodeFirst->id)
                              ->first();

                              if(!$checkCuponHistoryTable){

                                  DB::table('cupon_history')->insert(
     array(
            'user_id'     =>Auth::user()->id,
            'status'     =>   0,
            'count'     =>   0,
            'cupon_id'   => $checkCodeFirst->id
     )
);

          //new code
    //new code


     $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
         ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCodeFirst->id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);
                          }elseif($checkCuponHistoryTable->status == 0){

                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);
        //new code
    //new code


     $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
         ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          } elseif($checkCuponHistoryTable->status == 1 && $checkCuponHistoryTable->count < $checkCodeFirst->coupon_use){


                                   DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);
        //new code
    //new code


     $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
         ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);



                              }else{

                                                  $data = 0;
                          $msg  = 'You Have Already Used This Cupon';
                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);
                              }

                           //end  //multiple time

                          }


                      }else{

                          $data = 0;
                          $msg  = 'Coupon Is Not Valid For Selected Categories';

                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                      }



                  }

                     //end check category codition and cupon count






        }else{

            $amo = $checkCodeFirst->amount_limit - $subAmount;
            $data = 0;
            $msg  = 'Add BDT '.$amo.' More To Your Cart';

               $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);
        }





            ///end user     new

            }elseif((in_array($clientsType,$selUsers))){

           //start user



        if($checkCodeFirst->amount_limit <= $subAmount ){


            $categoryLists = $checkCodeFirst->categories;
            $selCategories = explode(',',$categoryLists);


             $productIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
                   ->where('status',0)->latest()->get();



                     //check category codition and cupon count
                    foreach($productIdList as $allProductIdList){

                         $getProductSlug =DB::table('main_products')
                         ->where('id',$allProductIdList->product_id)
                         ->value('slug');

                         $getCatName = DB::table('assaign_categories')
                      ->where('product_name',$getProductSlug)
                      ->orderBy('id','asc')
                         ->first();

                        $finalGet = $getCatName->cat_name;

                           $finalGet1 = DB::table('assaign_categories')
                      ->where('product_name',$getProductSlug)
                      ->orderBy('id','asc')
                         ->value('cat_name');



                      if((in_array('All',$selCategories))){

                          //time check

                          if($checkCodeFirst->coupon_type == 'Single Times'){
                              //single time

                               $checkCuponHistoryTable = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1)
                              ->where('cupon_id',$checkCodeFirst->id)
                              ->first();


                                   if(!$checkCuponHistoryTable){

                                  DB::table('cupon_history')->insert(
     array(
            'user_id'     =>Auth::user()->id,
            'status'     =>   0,
            'cupon_id'   => $checkCodeFirst->id
     )
);
//new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code

Session::put('cuponId',$checkCodeFirst->id); Session::put('discountMain', $disval);
          $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          }elseif($checkCuponHistoryTable->status == 0){

                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);
               //new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);
                          } elseif($checkCuponHistoryTable->status == 1){




                          $data = 0;
                          $msg  = 'You Have Already Used This Cupon';

                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                              }

                              //end single time

                          }elseif($checkCodeFirst->coupon_type == 'Multiple Times'){
                           //multiple time
                            $checkCuponHistoryTable = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1)
                              ->where('cupon_id',$checkCodeFirst->id)
                              ->first();

                              if(!$checkCuponHistoryTable){

                                  DB::table('cupon_history')->insert(
     array(
            'user_id'     =>Auth::user()->id,
            'status'     =>   0,
            'count'     =>   0,
            'cupon_id'   => $checkCodeFirst->id
     )
);

    //new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCodeFirst->id); Session::put('discountMain', $disval);

                       $data = $disval;



         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);


                          }elseif($checkCuponHistoryTable->status == 0){

                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);

        //new code
    //new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          } elseif($checkCuponHistoryTable->status == 1 && $checkCuponHistoryTable->count < $checkCodeFirst->coupon_use){


                                             DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);

        //new code
    //new code

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($subAmount*$checkCodeFirst->amount)/100;
    $final_cal = $subAmount -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $subAmount -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);



                              }else{

                                      $data = 0;
                          $msg  = 'You Have Already Used This Cupon';

                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                              }

                           //end  //multiple time

                          }


                       //end time check
                      }elseif((in_array($finalGet,$selCategories))){
                         // dd($getCatName.'24');

                          if($checkCodeFirst->coupon_type == 'Single Times'){
                              //single time

                               $checkCuponHistoryTable = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1)
                              ->where('cupon_id',$checkCodeFirst->id)
                              ->first();


                                   if(!$checkCuponHistoryTable){

                                  DB::table('cupon_history')->insert(
     array(
            'user_id'     =>Auth::user()->id,
            'status'     =>   0,
            'cupon_id'   => $checkCodeFirst->id
     )
);
            //new code
    //new code

     $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->where('discount',0) ->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCodeFirst->id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          }elseif($checkCuponHistoryTable->status == 0){

                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);

        //new code
    //new code

      $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
         ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          } elseif($checkCuponHistoryTable->status == 1){




                          $data = 0;
                          $msg  = 'You Have Already Used This Cupon';

                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                              }

                              //end single time

                          }elseif($checkCodeFirst->coupon_type == 'Multiple Times'){
                           //multiple time
                            $checkCuponHistoryTable = DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                               ->where('status',1)
                              ->where('cupon_id',$checkCodeFirst->id)
                              ->first();

                              if(!$checkCuponHistoryTable){

                                  DB::table('cupon_history')->insert(
     array(
            'user_id'     =>Auth::user()->id,
            'status'     =>   0,
            'count'     =>   0,
            'cupon_id'   => $checkCodeFirst->id
     )
);

          //new code
    //new code


     $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
         ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCodeFirst->id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);
                          }elseif($checkCuponHistoryTable->status == 0){

                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);
        //new code
    //new code


     $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
         ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                          } elseif($checkCuponHistoryTable->status == 1 && $checkCuponHistoryTable->count < $checkCodeFirst->coupon_use){


                                              DB::table('cupon_history')
                                  ->where('user_id',Auth::user()->id)
                               ->where('status',0)
                              ->where('cupon_id',$checkCodeFirst->id)
       ->update([
           'status' =>0
        ]);
        //new code
    //new code


     $getProductNameList = DB::table('assaign_categories')
                      ->where('cat_name',$finalGet1)
                         ->select('product_name')->get();
    $stringProductSlug = $getProductNameList->implode("product_name", " ");
    $arrayProductSlug = explode(" ", $stringProductSlug);


    $getIdFromProductTable = DB::table('main_products')->whereIn('slug',$arrayProductSlug)
    ->select('id')->get();

    $stringProductId = $getIdFromProductTable->implode("id", " ");
    $arrayProductId = explode(" ", $stringProductId);


    $finalProductIdList = DB::table('cart_tbls')->where('user_id',Auth::user()->id)
            ->whereIn('product_id',$arrayProductId)->where('status',0)->latest()->get();

    $getFinalTotal = 0;
    foreach($finalProductIdList as $allFinalProductIdList){

        $getPrice = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
         ->where('discount',0)->value('selling_price');

        $getDiscount = DB::table('main_products')->where('id',$allFinalProductIdList->product_id)
        ->value('discount');

        $getFinalTotal = $getFinalTotal + ($getPrice*$allFinalProductIdList->quantity);

    }

if($checkCodeFirst->amount_type == "Percentage"){

    $calculateFinalVal = ($getFinalTotal*$checkCodeFirst->amount)/100;
    $final_cal = $getFinalTotal -  $calculateFinalVal;
    $disval = $calculateFinalVal;

}else{

     $final_cal = $getFinalTotal -  $checkCodeFirst->amount;
     $disval = $checkCodeFirst->amount;
}


//end new code
Session::put('cuponId',$checkCuponHistoryTable->cupon_id); Session::put('discountMain', $disval);

                       $data = $disval;
         $msg  = 'Successfully Reedeme';

            $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);


                              }else{



                          $data = 0;
                          $msg  = 'You Have Already Used This Cupon';
                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);


                              }

                           //end  //multiple time

                          }


                      }else{

                          $data = 0;
                          $msg  = 'Coupon Is Not Valid For Selected Categories';

                             $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

                      }








                  }

                     //end check category codition and cupon count






        }else{

            $amo = $checkCodeFirst->amount_limit - $subAmount;
            $data = 0;
            $msg  = 'Add BDT '.$amo.' More To Your Cart';

               $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);
        }





            ///end user

            }else{


            $data = 0;
            $msg  = 'Cupon Is Not Available For U';

                   $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);
            }




            }else{

            $data = 0;
            $msg  = 'Cupon Date Expired';

               $response = [
    'data' => $data,
    'msg' => $msg
];

  return response()->json($response);

            }

        }


    }

public function privacyPolicy(){
  $cartCollection12 = \Cart::getContent();
        $cartCollection1 = $cartCollection12->sort();
return view('front.otherPage.privacyPolicy',compact('cartCollection1'));

}

    public function cart_page_all_update_minus(Request $request){

         if($request->get_value == 0){

            // \Cart::remove($request->id_for_pass);

              $updateData = CartTbl::where('id',$request->id_for_pass)
        ->delete();

        }else{

    //          \Cart::update($request->id_for_pass,
    //     array(
    //         'quantity' => array(
    //             'relative' => false,
    //             'value' => $request->get_value,
    //         ),
    // ));


     $updateData = CartTbl::where('id',$request->id_for_pass)
     ->update([
           'quantity' => $request->get_value
        ]);



        }

          $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }
        $cartCollection12 = \Cart::getContent();
        $cartCollection1 = $cartCollection12->sort();
        $data = view('front.cartPage.cart_page_all_update',compact('cartCollection1'))->render();
        return response()->json($data);
    }

    public function cart_page_all_update(Request $request){


        //return $request->get_value;

        if($request->get_value == 0){

            // \Cart::remove($request->id_for_pass);

            $updateData = CartTbl::where('id',$request->id_for_pass)
            ->delete();

        }else{

             $mainDD = CartTbl::where('id',$request->id_for_pass)

            ->value('quantity');

            $mainResult = $mainDD + 1;

              $updateData = CartTbl::where('id',$request->id_for_pass)
     ->update([
           'quantity' =>  $mainDD + 1
        ]);





        }

          $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }
       $cartCollection12 = \Cart::getContent();
        $cartCollection1 = $cartCollection12->sort();
        $data = view('front.cartPage.cart_page_all_update',compact('cartCollection1'))->render();
        return response()->json($data);


    }

    public function cart(){

        $cartCollection1 = \Cart::getContent();

        return view('front.cartPage.index',['cartCollection1'=>$cartCollection1]);

    }

    public function customer_address(){
        $cartCollection1 = \Cart::getContent();

        return view('front.otherPage.customer_address',['cartCollection1'=>$cartCollection1]);

    }

    public function customer_profile(){
         $cartCollection1 = \Cart::getContent();

        return view('front.otherPage.customer_profile',['cartCollection1'=>$cartCollection1]);

    }


    public function personal_information_update(Request $request){


        $emailPhone = User::where('email',$request->email)->value('phone');

       $time_dy = time().date("Ymd");

         if($emailPhone == $request->phone){

               $customer =User::find($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone =$request->phone;
          if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $customer->image =  'uploads/'.$filename;

        }
        if(empty($request->pass)){
        }else{
        $customer->password = Hash::make($request->pass);
        }
        $customer->save();

        return redirect()->back()->with('success','Updated');

         }else{

         $customer =User::find($request->id);
        $customer->name = $request->name;
        $customer->email = $request->name.random_int(1000, 9999);
        $customer->non_verified_email = $request->email;
        $customer->phone =$request->phone;
          if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $customer->image =  'uploads/'.$filename;

        }
        if(empty($request->pass)){
        }else{
        $customer->password = Hash::make($request->pass);
        }
        $customer->save();


         $customer_id = $customer->id;



        $cartCollection1 = \Cart::getContent();


        $user = User::where('id', $customer_id)->first();
        $token = random_int(100000, 999999);
        UserVerify::create([
            'user_id' => $customer_id,
            'token' => $token
          ]);


             $client = new \GuzzleHttp\Client();
    $url = 'https://portal.adnsms.com/api/v1/secure/send-sms';

    $myBody['api_key'] = 'KEY-ngd8usyr9mj7hgoazbj7qggib5x9ztud';
    $myBody['api_secret'] = 'jXxdbA3eiuj2EEGa';
    $myBody['request_type'] = 'OTP';
    $myBody['message_type'] = 'TEXT';
    $myBody['mobile'] = $request->phone;
    $myBody['message_body'] ='Welcome to Spotlight Attires. Your code is - '.$token;





    $request = $client->post(
     $url,
    array(
        'form_params' => $myBody
    )
);

    //   Mail::send('emails.emailVerificationEmail1', ['token' => $token], function($message) use($request){
    //         $message->to($request->email);
    //         $message->subject('Email Verification Mail');
    //     });

        Auth::logout();

                return redirect('/verification_page_dash')->with('success','Please Verify');
}




    }


     public function customer_wishlist(){
       if (Auth::guest()){

            return redirect('/login_page_dash');


        }else{

            $all_wish_list = Wishlist::where('user_id',Auth::user()->id)->get();

            $convert_name_title = $all_wish_list->implode("product_id", " ");


            $separated_data_title = explode(" ", $convert_name_title);

            $main_product = DB::table('main_products')->whereIn('id',$separated_data_title)->latest()->get();
            $cartCollection1 = \Cart::getContent();


        return view('front.otherPage.customer_wishlist',compact('main_product','cartCollection1'));
        }

    }


    public function add_to_card_all_product(Request $request){


//         $product_name = DB::table('main_products')->where('id',$request->after_string_slice_id)->value('product_name');
//         $product_price = DB::table('main_products')->where('id',$request->after_string_slice_id)->value('selling_price');
// $product_price_discount = DB::table('main_products')->where('id',$request->id_for_pass)->value('discount');
//         $feature_image_first = DB::table('main_products')->where('id',$request->after_string_slice_id)->value('front_image');
//                 \Cart::add(array(
//                     'id' => $request->after_string_slice_id,
//                     'name' => $product_name,
//                     'price' => $product_price - $product_price_discount,
//                     'quantity' => 1,
//                     'attributes' => array(
//                         'image' => $feature_image_first,
//                         'color' => 0,
//                         'size' => 0
//                     )
//                 ));

    //      \Cart::update($request->after_string_slice_id,
    //     array(
    //         'quantity' => array(
    //             'relative' => false,
    //             'value' => $request->final_quantity
    //         ),
    // ));


     $updateData = CartTbl::where('id',$request->after_string_slice_id)
     ->update([
           'quantity' => $request->final_quantity
        ]);

      $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }

              $cartCollection12 = \Cart::getContent();
        $cartCollection1 = $cartCollection12->sort();
                //return view('front.cart.sidebar',['cartCollection1'=>$cartCollection1]);

                $data = view('front.cartPage.add_to_card_all_product',['cartCollection1'=>$cartCollection1])->render();
                return response()->json($data);


    }


    public function add_to_card_from_quick_view(Request $request){
        //dd($request->all());

        if (Auth::guest()){

            Session::put('product_id',$request->product_id);
            Session::put('color',$request->color);
            Session::put('size',$request->weight);
            return redirect('/loginPageToAddCart');


        }else{

            $sizeColorCheck = CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',$request->product_id)
            ->where('color',$request->color)
            ->where('size',$request->weight)
            ->value('id');

            if(empty($sizeColorCheck)){


             $newCardData = new CartTbl();
             $newCardData->user_id = Auth::user()->id;
             $newCardData->product_id = $request->product_id;
             $newCardData->quantity = 1 ;
             $newCardData->color = $request->color ;
             $newCardData->size = $request->weight ;
             $newCardData->status = 0;
             $newCardData->save();


        $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }



            }else{

                  $mainDD = CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',$request->product_id)
            ->where('color',$request->color)
            ->where('size',$request->weight)
            ->value('quantity');

            $mainResult = $mainDD + 1;

                CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',$request->product_id)
            ->where('color',$request->color)
            ->where('size',$request->weight)
       ->update([
           'quantity' => $mainResult
        ]);

           $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }

            }


        }

                $cartCollection12 = \Cart::getContent();
        $cartCollection1 = $cartCollection12->sort();
                return redirect()->back();
    }





    public function add_to_card_from_single_product_view(Request $request){

        // dd($request->all());


//          $product_name = DB::table('main_products')->where('id',$request->m_id)->value('product_name');
//          $product_price = DB::table('main_products')->where('id',$request->m_id)->value('selling_price');
// $product_price_discount = DB::table('main_products')->where('id',$request->m_id)->value('discount');

//          $feature_image_first = DB::table('main_products')->where('id',$request->m_id)->value('front_image');
//                  \Cart::add(array(
//                      'id' => $request->m_id,
//                      'name' => $product_name,
//                      'price' => $product_price - $product_price_discount,
//                      'quantity' =>$request->quantity,
//                      'attributes' => array(
//                          'image' => $feature_image_first,
//                          'color' =>$request->color,
//                          'size' => $request->weight
//                      )
//                  ));



 if (Auth::guest()){

            Session::put('product_id',$request->m_id);
            Session::put('b_value',$request->b_value);
            Session::put('quantity',$request->quantity);
            Session::put('color',$request->color);
            Session::put('size',$request->weight);

            return redirect('/loginPageToAddCart');


        }else{

            $sizeColorCheck = CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',$request->m_id)
            ->where('color',$request->color)
            ->where('size',$request->weight)
            ->value('id');

            if(empty($sizeColorCheck)){


             $newCardData = new CartTbl();
             $newCardData->user_id = Auth::user()->id;
             $newCardData->product_id = $request->m_id;
             $newCardData->quantity = $request->quantity ;
             $newCardData->color = $request->color ;
             $newCardData->size = $request->weight ;
             $newCardData->status = 0;
             $newCardData->save();


         $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }



            }else{

                  $mainDD = CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',$request->m_id)
            ->where('color',$request->color)
            ->where('size',$request->weight)
            ->value('quantity');

            $mainResult = $mainDD + $request->quantity;

                CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',$request->m_id)
            ->where('color',$request->color)
            ->where('size',$request->weight)
       ->update([
           'quantity' => $mainResult
        ]);

        $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }

            }


        }


                 if($request->b_value == 'add_to_cart'){
                    return redirect()->back();

                 }else{
                    return redirect('/cart');

                 }

    }


    public function check_out_from_cart(){
        if (Auth::guest()){

            return redirect('/login_page');

        }else{




return redirect('/check_out');
        }

    }


 public function add_to_cart_count_new(Request $request){


        $data =\Cart::getTotalQuantity()+1;
        return response()->json($data);
    }


    public function add_to_cart_count(Request $request){


        $data =\Cart::getTotalQuantity();
        return response()->json($data);
    }



    public function cart_clear_all_data(Request $request){

        $updateData = CartTbl::where('user_id',Auth::user()->id)
        ->delete();

          $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }
        return redirect()->back();
    }

    public function cart_clear_single_data($id){
        //\Cart::remove($id);

        $updateData = CartTbl::where('id',$id)
        ->delete();


          $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }

        return redirect()->back();
    }

    public function delete_from_sidebar_new(Request $request){
        // \Cart::remove($request->after_string_slice_id);

        $updateData = CartTbl::where('id',$request->after_string_slice_id)
        ->delete();

          $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }

       $cartCollection12 = \Cart::getContent();
        $cartCollection1 = $cartCollection12->sort();

        $data = view('front.cartPage.add_to_card_all_product',['cartCollection1'=>$cartCollection1])->render();
                return response()->json($data);

    }

    public function dcrease_data_from_side_bar(Request $request){

    //      \Cart::update($request->after_string_slice_id,
    //     array(
    //         'quantity' => array(
    //             'relative' => false,
    //             'value' => $request->final_quantity
    //         ),
    // ));

     $updateData = CartTbl::where('id',$request->after_string_slice_id)
     ->update([
           'quantity' => $request->final_quantity
        ]);

      $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }
    $cartCollection12 = \Cart::getContent();
        $cartCollection1 = $cartCollection12->sort();

      $data = view('front.cartPage.add_to_card_all_product',['cartCollection1'=>$cartCollection1])->render();
                return response()->json($data);

    }




    public function cart_update(Request $request){

       /// dd( $request->quantity);


        \Cart::update($request->id,
        array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
    ));


    return redirect()->back();


    }


    public function login_page(){

        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.login_page',compact('cartCollection1'));

    }

    public function login_page_dash(){

        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.login_page_dash',compact('cartCollection1'));

    }

    public function loginPageToAddCart(){
        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.loginPageToAddCart',compact('cartCollection1'));
    }

    public function check_out(){

        $cartCollection1 = \Cart::getContent();
        $shipping_details = DB::table('shipping_prices')->get();
        return view('front.otherPage.check_out',compact('cartCollection1','shipping_details'));

    }


    public function customer_dashboard(){

        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.customer_dashboard',compact('cartCollection1'));

    }

     public function customer_order(){

        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.customer_order',compact('cartCollection1'));

    }

      public function customer_password(){

        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.customer_password',compact('cartCollection1'));

    }


    public function customer_login_post(Request $request){








        $request->validate([
            'email1' => 'required',
            'pass' => 'required',
        ]);


              $get_verification_status = User::where('email',$request->get('email1'))->value('is_email_verified');

if($get_verification_status == 1){

     $user = User::where('email',$request->get('email1'))->first();

            \Auth::login($user);

            return redirect('/check_out_from_cart');

}else{

    return redirect('/login_page')->with('error','phone number not verified or invalid email or password');

}





    }


    public function postLoginToAddCart(Request $request){


//dd($request->all());



        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        //new_code_for_add_to_cart

        if(empty(Session::get('b_value'))){


              $get_verification_status = User::where('email',$request->get('email'))->value('is_email_verified');

if($get_verification_status == 1){

     $credentials = $request->only('email', 'password');
    //Hash::make($request->password);

        if (Auth::attempt($credentials)) {





             $sizeColorCheck = CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',Session::get('product_id'))
          ->where('color',Session::get('color'))
            ->where('size',Session::get('size'))
            ->value('id');

            if(empty($sizeColorCheck)){


             $newCardData = new CartTbl();
             $newCardData->user_id = Auth::user()->id;
             $newCardData->product_id = Session::get('product_id');
             $newCardData->quantity = 1 ;
            $newCardData->color = Session::get('color') ;
             $newCardData->size = Session::get('size') ;
             $newCardData->status = 0;
             $newCardData->save();

        $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }



            }else{

                  $mainDD = CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',Session::get('product_id'))
            ->where('color',Session::get('color'))
            ->where('size',Session::get('size'))
            ->value('quantity');

            $mainResult = $mainDD + 1;

                CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',Session::get('product_id'))
          ->where('color',Session::get('color'))
            ->where('size',Session::get('size'))
       ->update([
           'quantity' => $mainResult
        ]);

        $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }

            }
session()->forget('product_id');
            return redirect('/');
        }else{
           return redirect('/loginPageToAddCart')->with('error','phone number not verified or invalid email or password');
        }

}else{

    return redirect('/loginPageToAddCart')->with('error','phone number not verified or invalid email or password');

}

        }else{

           //new code


             $get_verification_status = User::where('email',$request->get('email'))->value('is_email_verified');

if($get_verification_status == 1){
   $credentials = $request->only('email', 'password');
    //Hash::make($request->password);

        if (Auth::attempt($credentials)) {


             $sizeColorCheck = CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',Session::get('product_id'))
            ->where('color',Session::get('color'))
            ->where('size',Session::get('size'))
            ->value('id');

            if(empty($sizeColorCheck)){


             $newCardData = new CartTbl();
             $newCardData->user_id = Auth::user()->id;
             $newCardData->product_id = Session::get('product_id');
             $newCardData->quantity = Session::get('quantity') ;
             $newCardData->color = Session::get('color') ;
             $newCardData->size = Session::get('size') ;
             $newCardData->status = 0;
             $newCardData->save();

        $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }




            }else{

                  $mainDD = CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',Session::get('product_id'))
          ->where('color',Session::get('color'))
            ->where('size',Session::get('size'))
            ->value('quantity');

            $mainResult = $mainDD + Session::get('quantity');

                CartTbl::where('user_id',Auth::user()->id)
            ->where('product_id',Session::get('product_id'))
          ->where('color',Session::get('color'))
            ->where('size',Session::get('size'))
       ->update([
           'quantity' => $mainResult
        ]);

         $getIdForType=DB::table('cupon_history')
                              ->where('user_id',Auth::user()->id)
                              ->orderBy('id','desc')->value('cupon_id');

                              $getCuponTypem = DB::table('cupons')
                              ->where('id',$getIdForType)->value('coupon_type');

                         if($getCuponTypem == "Single Times"){


    $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('status',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('status',0)->delete();
    }
                         }else{
                              $getFirstValue = DB::table('cupon_history')->where('user_id',Auth::user()->id)
    ->where('cupon_id',Session::get('cuponId'))
    ->where('mstatus',0)->value('id');

    if(empty($getFirstValue)){


    }else{

        DB::table('cupon_history')->where('user_id',Auth::user()->id)
         ->where('cupon_id',Session::get('cuponId'))
        ->where('mstatus',0)->delete();
    }

                         }

            }

            session()->forget('product_id');
            session()->forget('color');
            session()->forget('size');

            if(Session::get('b_value') == 'add_to_cart'){

                session()->forget('b_value');
                    return redirect('/cart');

                 }else{
                     session()->forget('b_value');
                    return redirect('/check_out_from_cart');

                 }

        }else{
                return redirect('/loginPageToAddCart')->with('error','phone number not verified or invalid email or password');
        }

}else{

    return redirect('/loginPageToAddCart')->with('error','phone number not verified or invalid email or password');

}


           //end new code





        }



        //add_new_code_for_add_to_cart







    }

    public function customer_login_post_dash(Request $request){






        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $get_verification_status = User::where('email',$request->get('email'))->value('is_email_verified');

if($get_verification_status == 1){

    //  $user = User::where('email',$request->get('email1'))->first();

    //         \Auth::login($user);

    //         return redirect('/customer_dashboard');

     $credentials = $request->only('email', 'password');
    //Hash::make($request->password);

        if (Auth::attempt($credentials)) {
            // dd(1);
            return redirect('/customer_dashboard');
        }else{
            //dd(0);
            return redirect('/login_page_dash')->with('error','phone number not verified or invalid email or password');
        }

}else{

    return redirect('/login_page_dash')->with('error','phone number not verified or invalid email or password');

}




    }


    public function customer_reg_post_dash(Request $request){


       // dd($request->phone);

$time_dy = time().date("Ymd");

        $customer =  new User();
        $customer->name = $request->name;
        $customer->email = $request->name.random_int(1000, 9999);
        $customer->non_verified_email = $request->email1;
        $customer->phone =$request->phone;
        $customer->password = Hash::make($request->pass1);

         if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $customer->image =  'uploads/'.$filename;

        }


        $customer->save();

        $customer_id = $customer->id;
        $immg = $customer->image;


                 $shipping_address = new DelivaryAddress();
                 $shipping_address->first_name = $request->name;
                 $shipping_address->user_id = $customer_id;
                 $shipping_address->last_name = $request->name;
                 $shipping_address->address = $request->address;

                 $shipping_address->phone = $request->phone;
                 $shipping_address->email = $request->email1;
                 $shipping_address->town = $request->town;
                 $shipping_address->division = $request->division;
                 $shipping_address->district = $request->district;
                 $shipping_address->save();

        $category_list = new Client();
        $category_list->name = $request->name;
        $category_list->slug = Str::slug($request->name.'_'.$request->phone);
        $category_list->phone = $request->phone;
        $category_list->email = $request->email1;
        $category_list->c_type ='Normal';
        $category_list->status = 0;
        $category_list->user_id = $customer_id;
        $category_list->image = $immg;
        $category_list->save();

        $cartCollection1 = \Cart::getContent();


        $user = User::where('id', $customer_id)->first();
        $token = random_int(100000, 999999);
        UserVerify::create([
            'user_id' => $customer_id,
            'token' => $token
          ]);


          $client = new \GuzzleHttp\Client();
    $url = 'https://portal.adnsms.com/api/v1/secure/send-sms';

    $myBody['api_key'] = 'KEY-ngd8usyr9mj7hgoazbj7qggib5x9ztud';
    $myBody['api_secret'] = 'jXxdbA3eiuj2EEGa';
    $myBody['request_type'] = 'OTP';
    $myBody['message_type'] = 'TEXT';
    $myBody['mobile'] = $request->phone;
    $myBody['message_body'] ='Welcome to Spotlight Attires. Your code is - '.$token;





    $request = $client->post(
     $url,
    array(
        'form_params' => $myBody
    )
);

    //   Mail::send('emails.emailVerificationEmail1', ['token' => $token], function($message) use($request){
    //         $message->to($request->email);
    //         $message->subject('Email Verification Mail');
    //     });

       // \Auth::login($user);

                return redirect('/verification_page_dash')->with('success','Please Verify');


    }



    public function postRegisterToAddCart(Request $request){


       // dd($request->phone);

$time_dy = time().date("Ymd");

        $customer =  new User();
        $customer->name = $request->name;
        $customer->email = $request->name.random_int(1000, 9999);
        $customer->non_verified_email = $request->email1;
        $customer->phone =$request->phone;
        $customer->password = Hash::make($request->pass1);

         if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $customer->image =  'uploads/'.$filename;

        }


        $customer->save();

        $customer_id = $customer->id;
        $immg = $customer->image;


                 $shipping_address = new DelivaryAddress();
                 $shipping_address->first_name = $request->name;
                 $shipping_address->user_id = $customer_id;
                 $shipping_address->last_name = $request->name;
                 $shipping_address->address = $request->address;

                 $shipping_address->phone = $request->phone;
                 $shipping_address->email = $request->email1;
                 $shipping_address->town = $request->town;
                 $shipping_address->division = $request->division;
                 $shipping_address->district = $request->district;
                 $shipping_address->save();

        $category_list = new Client();
        $category_list->name = $request->name;
        $category_list->slug = Str::slug($request->name.'_'.$request->phone);
        $category_list->phone = $request->phone;
        $category_list->email = $request->email1;
        $category_list->c_type ='Normal';
        $category_list->status = 0;
        $category_list->user_id = $customer_id;
        $category_list->image = $immg;
        $category_list->save();

        $cartCollection1 = \Cart::getContent();


        $user = User::where('id', $customer_id)->first();
        $token = random_int(100000, 999999);
        UserVerify::create([
            'user_id' => $customer_id,
            'token' => $token
          ]);


          $client = new \GuzzleHttp\Client();
    $url = 'https://portal.adnsms.com/api/v1/secure/send-sms';

    $myBody['api_key'] = 'KEY-ngd8usyr9mj7hgoazbj7qggib5x9ztud';
    $myBody['api_secret'] = 'jXxdbA3eiuj2EEGa';
    $myBody['request_type'] = 'OTP';
    $myBody['message_type'] = 'TEXT';
    $myBody['mobile'] = $request->phone;
    $myBody['message_body'] ='Welcome to Spotlight Attires. Your code is - '.$token;





    $request = $client->post(
     $url,
    array(
        'form_params' => $myBody
    )
);

    //   Mail::send('emails.emailVerificationEmail1', ['token' => $token], function($message) use($request){
    //         $message->to($request->email);
    //         $message->subject('Email Verification Mail');
    //     });

       // \Auth::login($user);

               return redirect('/verification_page_dash')->with('success','Please Verify');


    }



    public function verification_page(){

        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.verification_page',compact('cartCollection1'));


    }


    public function verification_page_dash(){

        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.verification_page_dash',compact('cartCollection1'));


    }


    public function verification_page_dash_post(request $request){

        //dd($request->all());
        $code = $request->one.$request->two.$request->three.$request->four.$request->five.$request->six;

         $get_id_user = UserVerify::where('token',$code)->value('user_id');


         if(empty($get_id_user)){
             return redirect()->back()->with('error','invalid code');
         }else{
               $get_the_email = User::where('id',$get_id_user)->value('non_verified_email');


             DB::table('users')
            ->where('id', $get_id_user)
            ->update(['is_email_verified' => 1,'email'=>$get_the_email]);

         DB::table('clients')
            ->where('user_id', $get_id_user)
            ->update(['status' => 1]);



             return redirect('/login_page_dash')->with('success','Phone Number Verified ,Please Login Again');
         }

    }



    public function verification_page_post(request $request){
        $code = $request->one.$request->two.$request->three.$request->four.$request->five.$request->six;
        $get_id_user = UserVerify::where('token',$code)->value('user_id');

         if(empty($get_id_user)){
             return redirect('')->back()->with('error','invalid code');
         }else{
               $get_the_email = User::where('id',$get_id_user)->value('non_verified_email');


              DB::table('users')
            ->where('id', $get_id_user)
            ->update(['is_email_verified' => 1,'email'=>$get_the_email]);

            DB::table('clients')
            ->where('user_id', $get_id_user)
            ->update(['status' => 1]);



             return redirect('/login_page')->with('success','Phone Number Verified ,Please Login Again');
         }

    }





    public function customer_reg_post(Request $request){

$time_dy = time().date("Ymd");
        $customer =  new User();
        $customer->name = $request->name;
        $customer->email = $request->name.random_int(1000, 9999);
        $customer->non_verified_email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->pass);
         if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $customer->image =  'uploads/'.$filename;

        }
        $customer->save();

        $customer_id = $customer->id;
        $immg = $customer->image;

                 $shipping_address = new DelivaryAddress();
                 $shipping_address->first_name = $request->name;
                 $shipping_address->user_id = $customer_id;
                 $shipping_address->last_name = $request->name;
                 $shipping_address->address = $request->address;

                 $shipping_address->phone = $request->phone;
                 $shipping_address->email = $request->email;
                 $shipping_address->town = $request->town;
                 $shipping_address->division = $request->division;
                 $shipping_address->district = $request->district;
                 $shipping_address->save();

        $category_list = new Client();
        $category_list->name = $request->name;
        $category_list->slug = Str::slug($request->name.'_'.'77');
        $category_list->phone = $request->phone;
        $category_list->email = $request->email;
        $category_list->c_type ='Normal';
        $category_list->status = 0;
        $category_list->image = $immg;
        $category_list->user_id = $customer_id;
        $category_list->save();

        $cartCollection1 = \Cart::getContent();


        $user = User::where('id', $customer_id)->first();
        $token = random_int(100000, 999999);


        // \Auth::login($user);


        UserVerify::create([
            'user_id' => $customer_id,
            'token' => $token
          ]);

           $client = new \GuzzleHttp\Client();
    $url = 'https://portal.adnsms.com/api/v1/secure/send-sms';

    $myBody['api_key'] = 'KEY-ngd8usyr9mj7hgoazbj7qggib5x9ztud';
    $myBody['api_secret'] = 'jXxdbA3eiuj2EEGa';
    $myBody['request_type'] = 'OTP';
    $myBody['message_type'] = 'TEXT';
    $myBody['mobile'] = $request->phone;
    $myBody['message_body'] ='Welcome to Spotlight Attires. Your code is - '.$token;





    $request = $client->post(
     $url,
    array(
        'form_params' => $myBody
    )
);

    //   Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
    //         $message->to($request->email);
    //         $message->subject('Email Verification Mail');
    //     });



               return redirect('/verification_page')->with('success','Please Verify');


    }



    public function verifyAccount1($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect("login_page_dash")->with('info', $message);;

      //return redirect()->route('login')->with('info', $message);
    }



    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect("login_page")->with('info', $message);;

      //return redirect()->route('login')->with('info', $message);
    }


    public function signOut() {
        //Session::flush();
        Auth::logout();

        return Redirect('/');
    }



    public function final_confirm(Request $request){

        //dd($request->all());
        if($request->bbValue == 'Checkout With Bkash Payment'){


               Session::put('bkashAmount', $request->getGrandTotal);
               Session::put('first_name', $request->first_name);
               Session::put('user_id', Auth::user()->id);
               Session::put('ephone', $request->ephone);
               Session::put('address', $request->address);
               Session::put('last_name', $request->last_name);

               Session::put('town', $request->town);
               Session::put('division', $request->division);
               Session::put('district', $request->district);
               Session::put('post_code', $request->post_code);
               Session::put('ship_price_c', $request->ship_price_c);


               //return BkashController::createPayment($request);


              // $this->submitSellerDetails( $request );

               return redirect('/bkash/create');


        }else{

         $lastIdInvoice = Invoice::latest()->value('id');

              //dd(11);



             $search_ship_address  =  DelivaryAddress::where('user_id',Auth::user()->id)->value('first_name');

             if(empty($search_ship_address)){
                 $shipping_address = new DelivaryAddress();
                 $shipping_address->first_name = $request->first_name;
                 $shipping_address->user_id = Auth::user()->id;
                 $shipping_address->last_name = $request->last_name;
                 $shipping_address->address = $request->address;

                 $shipping_address->phone = $request->ephone;
                 $shipping_address->email = $request->ephone;
                 $shipping_address->town = $request->town;
                  $shipping_address->division = $request->division;
                 $shipping_address->district = $request->district;
                 $shipping_address->post_code = $request->post_code;
                 $shipping_address->save();

             }else{

                 $search_ship_address1  =  DelivaryAddress::where('user_id',Auth::user()->id)->value('id');

                 $shipping_address =DelivaryAddress::find($search_ship_address1);
                 $shipping_address->first_name = $request->first_name;
                 $shipping_address->last_name = $request->last_name;
                 $shipping_address->address = $request->address;
 $shipping_address->division = $request->division;
                 $shipping_address->phone = $request->ephone;
                 $shipping_address->email = $request->ephone;
                 $shipping_address->town = $request->town;
                 $shipping_address->district = $request->district;
                 $shipping_address->post_code = $request->post_code;
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
             $database_save->delivery_charge = $request->ship_price_c;
             $database_save->grand_total = ($request->ship_price_c+$totalProductPrice) - $getClientWiseDiscount;
             $database_save->total_pay = ($request->ship_price_c+$totalProductPrice) - $getClientWiseDiscount;
             $database_save->cod = ($request->ship_price_c+$totalProductPrice) - $getClientWiseDiscount;
         }else{
             $database_save->delivery_charge = $request->ship_price_c;
             $database_save->grand_total = ($request->ship_price_c+$totalProductPrice) - $getClientWiseDiscount;
             $database_save->total_pay = ($request->ship_price_c+$totalProductPrice) - $getClientWiseDiscount;
             $database_save->cod = ($request->ship_price_c+$totalProductPrice) - $getClientWiseDiscount;

         }

         }else{




         $database_save->total_net_price = $totalProductPrice - $disval;
         $database_save->total_discount = $disval;
         $database_save->total_vat_tax = 0;

         if($request->ship_price == '0'){
             $database_save->delivery_charge = $request->ship_price_c;
             $database_save->grand_total = ($request->ship_price_c+$totalProductPrice) - $disval;
             $database_save->total_pay = ($request->ship_price_c+$totalProductPrice) - $disval;
             $database_save->cod = ($request->ship_price_c+$totalProductPrice) - $disval;
         }else{
             $database_save->delivery_charge = $request->ship_price_c;
             $database_save->grand_total = ($request->ship_price_c+$totalProductPrice) - $disval;
             $database_save->total_pay = ($request->ship_price_c+$totalProductPrice) - $disval;
             $database_save->cod = ($request->ship_price_c+$totalProductPrice) - $disval;

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
            }
         }




     public function success_page($id){
         $id = $id;
        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.success_page',['id'=>$id,'cartCollection1'=>$cartCollection1]);

    }


    public function address_update_code(Request $request){

if(empty($request->id)){
    $shipping_address =new DelivaryAddress();
        $shipping_address->first_name = $request->first_name;
        $shipping_address->last_name = $request->last_name;
        $shipping_address->address = $request->address;
        $shipping_address->user_id = Auth::user()->id;
        $shipping_address->phone = $request->phone;
        $shipping_address->email = $request->email;
        $shipping_address->town = $request->town;
         $shipping_address->division = $request->division;
         $shipping_address->district = $request->district;
         $shipping_address->post_code = $request->post_code;
        $shipping_address->save();

}else{

        $shipping_address =DelivaryAddress::find($request->id);
        $shipping_address->first_name = $request->first_name;
        $shipping_address->last_name = $request->last_name;
        $shipping_address->address = $request->address;
 $shipping_address->user_id = Auth::user()->id;
        $shipping_address->phone = $request->phone;
        $shipping_address->email = $request->email;
        $shipping_address->town = $request->town;
         $shipping_address->division = $request->division;
         $shipping_address->district = $request->district;
         $shipping_address->post_code = $request->post_code;
        $shipping_address->save();
}
        return redirect()->back()->with('success','Address Updated');

       }


       public function about_us(){


        $brand_list_all = DB::table('brands')->limit('5')->get();
        $cartCollection1 = \Cart::getContent();

        $about_us_title = DB::table('aboutustitles')->get();
        $about_us_first = DB::table('aboutusbodyfirsts')->first();
        $about_us_second = DB::table('aboutusbodyseconds')->first();
        return view('front.otherPage.about',compact('cartCollection1','brand_list_all','about_us_title','about_us_first','about_us_second'));
    }


    public function contact_us(){
        $cartCollection1 = \Cart::getContent();
        $brand_list_all = DB::table('brands')->limit('5')->get();
        return view('front.otherPage.contact_us',compact('cartCollection1','brand_list_all'));


    }

    public function blog(){
        $blog_list = DB::table('blogs')->latest()->paginate(12);
        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.blog',compact('blog_list','cartCollection1'));
    }


    public function blog_list($id){

        $blog_list = DB::table('blogs')->where('cat_name',$id)->paginate(12);
        $cartCollection1 = \Cart::getContent();

        $blog_category_list = DB::table('blogcategories')->latest()->get();


        return view('front.otherPage.blog_list',compact('blog_category_list','blog_list','cartCollection1'));

    }


    public function privacy_policy (){
        $cartCollection1 = \Cart::getContent();
        return view('front.otherPage.privacy_policy',compact('cartCollection1'));
    }



    public function search_blog(Request $request){
        $cartCollection1 = \Cart::getContent();
        $search_value = $request->search;
        $blog_category_list = DB::table('blogcategories')->latest()->get();
        $blog_list = DB::table('blogs')->Where('title','LIKE','%'.$search_value.'%')
                ->orWhere('cat_name','LIKE','%'.$search_value.'%')->orWhere('des','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                return view('front.otherPage.search_blog',compact('blog_category_list','blog_list','cartCollection1'));
    }


    public function blog_view($id){

        $blog_list = DB::table('blogs')->where('title',$id)->first();
        $cartCollection1 = \Cart::getContent();

        $blog_category_list = DB::table('blogcategories')->latest()->get();

        $blog_list_first = DB::table('blogs')->latest()->limit(3)->get();

        $blog_list_second = DB::table('blogs')->latest()->skip(3)->take(2)->get();

        return view('front.otherPage.blog_view',compact('blog_list_second','blog_list_first','blog_category_list','blog_list','cartCollection1'));

    }


    public function post_message(Request $request)
    {


        $request->validate([
            'name'          => 'required',
            'mobile'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'message'       => 'required',
        ]);


        $contact = new Messagesection;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->mobile;
        $contact->msg = $request->message;
        $contact->save();

        return response()->json(['success'=>'Successfully']);
    }



    public function wishList(){


        if (Auth::guest()){

            return redirect('/login_page_dash');


        }else{

            $all_wish_list = Wishlist::where('user_id',Auth::user()->id)->get();

            $convert_name_title = $all_wish_list->implode("product_id", " ");


            $separated_data_title = explode(" ", $convert_name_title);

            $main_product = DB::table('main_products')->whereIn('id',$separated_data_title)->latest()->get();
            $cartCollection1 = \Cart::getContent();


        return view('front.otherPage.wishList',compact('main_product','cartCollection1'));
        }
    }



    public function wishListProductAdd($id){


        if (Auth::guest()){

            return redirect('/login_page_dash');


        }else{


        $customer =  new Wishlist();
        $customer->user_id = Auth::user()->id;
        $customer->product_id = $id;
        $customer->save();


        return redirect('/wishList');


        }

    }


    public function deleteWishList($id){
$all_delete = Wishlist::where('product_id',$id)->delete();

return redirect()->back();

    }

    ///////////

    public function post_review(Request $request){

        Session::put('rating', $request->rating);
        Session::put('review', $request->review);
        Session::put('product_name', $request->product_name);


        if (Auth::guest()){
            return redirect('/post_review_login_page');

        }else{

             //bangladesh time

        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        //echo $dt->format('F j, Y, g:i a');

                date_default_timezone_set("Asia/Dhaka");
                $time_main =$dt->format('g:i a');

                //bangladesh time


            $review = new Review();
            $review->user_id = Auth::user()->id;
            $review->product_name    = $request->product_name;
            $review->total_star   = $request->rating;
            $review->des   = $request->review;
            $review->create_time = $time_main;
            $review->status = 'Inactive';
            $review->save();
            return redirect()->back()->with('success','Your review has been submitted Successfully,');


        }

    }


    public function post_review_login_page(){
        $cartCollection1 = \Cart::getContent();
       return view('front.otherPage.review_login',compact('cartCollection1'));
    }


    public function post_review_login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $result = substr($request->email, 0, 2);

        $cartCollection1 = \Cart::getContent();
        $shipping_value = $request->shipping;
        // dd($result);
        if($result == '01'){


            $user = User::where('phone', $request->get('email'))->first();

            \Auth::login($user);




        }else{

            $user = User::where('email', $request->get('email'))->first();

            \Auth::login($user);



        }

        //bangladesh time

        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        //echo $dt->format('F j, Y, g:i a');

                date_default_timezone_set("Asia/Dhaka");
                $time_main =$dt->format('g:i a');

                //bangladesh time


            $review = new Review();
            $review->user_id = Auth::user()->id;
            $review->product_name    = Session::get('product_name');
            $review->total_star   = Session::get('rating');;
            $review->des   = Session::get('review');
            $review->create_time = $time_main;
            $review->status = 'Inactive';
            $review->save();
            return redirect('shop/'.Session::get('product_name'))->with('success','Your review has been submitted Successfully,');
    }



}
