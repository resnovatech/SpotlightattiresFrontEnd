<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FilterController extends Controller
{



    public function search_filter_data(Request $request){


       // dd($request->all());


        $category_name = $request->subcat;
        $color_value = $request->color;
        $size_value = $request->size;

        $price_list_mainmin = $request->from;
        $price_list_mainmax = $request->to;


        // if(empty($color_value)){
        //     $color_value = [];
        //     }else{
        //         $color_value = explode(", ",$color_value);
        //     }

        //     if(empty($size_value)){
        //     $size_value = [];
        //     }else{
        //         $size_value = explode(", ",$size_value);
        //     }


        //     if(empty($category_name)){
        //     $category_name = '';
        //     }else{
        //         $category_name = explode(", ",$category_name);
        //     }


        if( empty($price_list_mainmin) && $category_name == []&& $color_value == [] && $size_value == [] ){

           ///section one




                $product_list = DB::table('main_products')
                ->where('selling_price','<',$price_list_mainmax)
                ->latest()->get();


            ///end section one



        }elseif(empty($price_list_mainmax) && $category_name == []&& $color_value == [] && $size_value == [] ){





                $product_list = DB::table('main_products')
                ->where('selling_price','>',$price_list_mainmin)
                ->latest()->get();



        }elseif($category_name == []&& $color_value == [] &&  empty($price_list_mainmin) && empty($price_list_mainmax)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);







                $product_list = DB::table('main_products')
                ->whereIn('id',$select_size_array_two)
                ->latest()->get();




        }elseif($category_name == []&& $size_value == [] &&  empty($price_list_mainmin) && empty($price_list_mainmax)){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);







                $product_list = DB::table('main_products')
                ->whereIn('id',$select_color_array_two)
                ->latest()->get();

            ///end section four


        }elseif($color_value == [] && $size_value == [] &&  empty($price_list_mainmin) && empty($price_list_mainmax)){


            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);



                $product_list = DB::table('main_products')->whereIn('slug',$select_product_array_two)->latest()->get();



        }elseif($category_name == []&& $color_value == [] && $size_value == [] ){




                $product_list = DB::table('main_products')->where('selling_price', '>=', $price_list_mainmin)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();




        }elseif($category_name == []&& empty($price_list_mainmin) && empty($price_list_mainmax)){


            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);



            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);



                $product_list = DB::table('main_products')
                ->whereIn('id',$select_color_array_two)->orWhereIn('id',$select_size_array_two)
                ->latest()->get();



        }elseif($color_value == [] && empty($price_list_mainmin) && empty($price_list_mainmax)){
            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);



            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);



                $product_list = DB::table('main_products')
                ->whereIn('id',$select_size_array_two)->orWhereIn('slug',$select_product_array_two)
                ->latest()->get();




        }elseif($size_value == [] && empty($price_list_mainmin) && empty($price_list_mainmax)){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);



            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);


                $product_list = DB::table('main_products')->whereIn('id',$select_color_array_two)->orWhereIn('slug',$select_product_array_two)->latest()->get();



        }elseif($category_name == []&& $color_value == [] && empty($price_list_mainmin)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);





                $product_list = DB::table('main_products')->whereIn('id',$select_size_array_two)
                ->where('selling_price', '<=', $price_list_mainmax)->get();



        }elseif($category_name == []&& $size_value == [] && empty($price_list_mainmin)){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);



                $product_list = DB::table('main_products') ->whereIn('id',$select_color_array_two)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();



        }elseif($color_value == [] && $size_value == [] && empty($price_list_mainmin)){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);


            ///section twelve
            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);


                $product_list = DB::table('main_products')
                ->whereIn('slug',$select_product_array_two)
                ->where('selling_price', '<=', $price_list_mainmax)
                ->latest()->get();


        }elseif($category_name == []&& $color_value == [] && empty($price_list_mainmax)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);




            ///section 13


                $minus_one = ($id_for_pass - 1)*12;

                $product_list = DB::table('main_products')->whereIn('id',$select_size_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)->latest()->get();

            ///end section 13


        }elseif($category_name == []&& $size_value == [] && empty($price_list_mainmax)){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);



            ///section 14



                $product_list = DB::table('main_products')->whereIn('id',$select_color_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)->latest()->get();

            ///end section 14


        }elseif($color_value == [] && $size_value == [] && empty($price_list_mainmax)){


            ///section 15

            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);

                $product_list = DB::table('main_products')->whereIn('slug',$select_product_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)->latest()->get();

            ///end section 15



        }elseif($category_name == []&& empty($price_list_mainmax)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);




            ///section 16



                $product_list = DB::table('main_products')->whereIn('id',$select_color_array_two)
                ->orWhereIn('id',$select_size_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)->latest()->get();

            ///end section 16

        }elseif($category_name == []&& empty($price_list_mainmin)){


            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);




            ///section 17



                $product_list = DB::table('main_products')->whereIn('id',$select_color_array_two)
                ->orWhereIn('id',$select_size_array_two)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 17


        }elseif($category_name == []&& $size_value == []){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);




            ///section 18



                $product_list = DB::table('main_products')->whereIn('id',$select_color_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 18


        }elseif($category_name == []&& $color_value == []){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);


            ///section 19


                $product_list = DB::table('main_products')->whereIn('id',$select_size_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 19


        }elseif($color_value == [] && empty($price_list_mainmax)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);





            ///section 20
  $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);


                $product_list = DB::table('main_products')->whereIn('id',$select_size_array_two)
                ->orWhereIn('slug',$select_product_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)->latest()->get();

            ///end section 20


        }elseif($color_value == [] && empty($price_list_mainmin)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);

  $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);
            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);
            ///section 21


                $product_list = DB::table('main_products')->whereIn('id',$select_size_array_two)
                ->orWhereIn('slug',$select_product_array_two)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 21

        }elseif($color_value == [] && $size_value == []){
            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);

            ///section 22



                $product_list = DB::table('main_products') ->whereIn('slug',$select_product_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 22


        }elseif($size_value == [] && empty($price_list_mainmax)){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);


            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);
            ///section 23



                $product_list = DB::table('main_products') ->whereIn('id',$select_size_color_two)
                ->orWhereIn('slug',$select_product_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)->latest()->get();

            ///end section 23


        }elseif($size_value == [] && empty($price_list_mainmin)){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);



            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);

            ///section 24


                $product_list = DB::table('main_products')  ->whereIn('id',$select_color_array_two)
                ->orWhereIn('slug',$select_product_array_two)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 24


        }elseif(empty($price_list_mainmin) && empty($price_list_mainmax)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);


            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);

            ///section 25


                $product_list = DB::table('main_products')  ->whereIn('id',$select_color_array_two)
                ->orWhereIn('id',$select_size_array_two)
                ->orWhereIn('slug',$select_product_array_two)->latest()->get();

            ///end section 25


        }elseif(empty($category_name)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);




            ///section 26



                $product_list = DB::table('main_products')->whereIn('id',$select_color_array_two)
                ->orWhereIn('id',$select_size_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 26


        }elseif($color_value == []){
            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);


            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);


            ///section 27



                $product_list = DB::table('main_products')->whereIn('slug',$select_product_array_two)
                ->orWhereIn('id',$select_size_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 27

        }elseif($size_value == []){

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);




            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);
            ///section 28



                $product_list = DB::table('main_products')  ->whereIn('slug',$select_product_array_two)
                ->orWhereIn('id',$select_color_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 28


        }elseif(empty($price_list_mainmax)){

            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);


            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);


            ///section 29



                $product_list = DB::table('main_products') ->whereIn('slug',$select_product_array_two)
                ->orWhereIn('id',$select_color_array_two)
                ->orWhereIn('id',$select_size_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)->latest()->get();

            ///end section 29


        }elseif(empty($price_list_mainmin)){


            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);



            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);
            ///section 30



                $product_list = DB::table('main_products')->whereIn('slug',$select_product_array_two)
                ->orWhereIn('id',$select_color_array_two)
                ->orWhereIn('id',$select_size_array_two)

                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();

            ///end section 30

        }else{


            $all_size_list = DB::table('assaign_sizes')
            ->whereIn('size_name',$size_value)->latest()->get();


            $select_size_array_one = $all_size_list->implode("product_name", " ");
            $select_size_array_two = explode(" ", $select_size_array_one);

            $all_color_list = DB::table('imageuploads')
            ->whereIn('color_id',$color_value)->latest()->get();


            $select_color_array_one = $all_color_list->implode("product_id", " ");
            $select_color_array_two = explode(" ", $select_color_array_one);



            $all_category_list = DB::table('assaign_categories')
            ->whereIn('cat_name',$category_name)->latest()->get();


            $select_product_array_one = $all_category_list->implode("product_name", " ");
            $select_product_array_two = explode(" ", $select_product_array_one);
            ///section 31



                $product_list = DB::table('main_products')->whereIn('slug',$select_product_array_two)
                ->orWhereIn('id',$select_color_array_two)
                ->orWhereIn('id',$select_size_array_two)
                ->where('selling_price', '>=', $price_list_mainmin)
                ->where('selling_price', '<=', $price_list_mainmax)->latest()->get();


            ///end section 31
        }


        $main_category = DB::table('product_categories')->get();

$cat_name = 1;

$color_atttribute = DB::table('attribute_details')
->where('main_id_att','color')->latest()->get();

$size_atttribute = DB::table('attribute_details')
->where('main_id_att','size')->latest()->get();

$cartCollection1 = \Cart::getContent();


$cat_name_hidden = $request->cat_name_hidden;

        return view('front.otherPage.search_filter_data',compact('category_name','cat_name_hidden','price_list_mainmax','price_list_mainmin','size_value','color_value','product_list','main_category','color_atttribute','size_atttribute','cartCollection1'))->render();

    }






}
