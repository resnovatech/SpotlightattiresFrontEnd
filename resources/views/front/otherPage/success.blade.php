@extends('front.master.master')

@section('title')

Success Page

@endsection


@section('body')





  <section class="blog__section section--padding">
        <div class="container">
<!-- Start of PageContent -->
<div class="page-content pt-2">
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-title">Success</h1></div>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
        <div style="text-align: center">
             <h1>Sorry !! Payment Failed, Please try again later.</h1>
        </div>
        <br><br>
        <div style="text-align: center; color: red;">
            @if(isset($response))

            <?php

echo $response;


            ?>















            @endif
       </div>
       <br><br>
       <a id="bKash_button" href="{{route('cart')}}" name="main_value" value="bkash" class="btn btn-large btn--lg w-100" style="background-color:#E2136E;">Go To Cart Page</a>
        </div>
</div>
<!-- End of PageContent -->
</div>
</section>


@endsection
