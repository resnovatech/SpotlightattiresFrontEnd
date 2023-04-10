<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $address = DB::table('system_information')->value('Address');
        $email = DB::table('system_information')->value('Email');
        $url_name = DB::table('system_information')->value('url_name');
        $icon_name = DB::table('system_information')->value('icon');
        $logo_name = DB::table('system_information')->value('logo');
        $ins_name = DB::table('system_information')->value('System_name');

        $offer_title = DB::table('system_information')->value('offer_title');

      

  $get_all_category = DB::table('product_categories')->select("*")    
                                                      ->orderBy('id', 'desc')->get();

        $about_us_title1 = DB::table('aboutustitles')->value('title_one');

        $ask_list_all = DB::table('askquestions')->get();


        $get_all_system_information = DB::table('system_information')->first();


        $get_all_system_informationb = DB::table('category_banners')->where('id',2)->value('image');




        view()->share('get_all_system_informationb', $get_all_system_informationb);

        view()->share('get_all_system_information', $get_all_system_information);


        view()->share('about_us_title1', $about_us_title1);


        view()->share('ask_list_all', $ask_list_all);



        view()->share('get_all_category', $get_all_category);
        view()->share('url_name', $url_name);
        view()->share('ins_name', $ins_name);
        view()->share('logo',  $logo_name);
        view()->share('icon', $icon_name);
        view()->share('offer_title', $offer_title);
        view()->share('offer_title', $offer_title);

        view()->share('address', $address);
        view()->share('email', $email);
    }
}
