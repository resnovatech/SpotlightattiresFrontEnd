<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="Spotlight Attires">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{$url_name}}{{ $icon }}">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{asset('/')}}public/front/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('/')}}public/front/assets/css/plugins/glightbox.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{asset('/')}}public/front/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css"/>
    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{asset('/')}}public/front/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" integrity="sha512-RgUjDpwjEDzAb7nkShizCCJ+QTSLIiJO1ldtuxzs0UIBRH4QpOjUU9w47AF9ZlviqV/dOFGWF6o7l3lttEFb6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>







    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

    <script src="{{ asset('/')}}public/parsely1.js"></script>

    <style>

        .swal2-confirm{

            margin-left: 20px;
        }

                </style>

        @yield('css')


        <style>

            .parsley-required{

                margin-top:10px;
            }

            .box

            {

             width:100%;

             max-width:600px;

             background-color:#f9f9f9;

             border:1px solid #ccc;

             border-radius:5px;

             padding:16px;

             margin:0 auto;

            }

            input.parsley-success,

            select.parsley-success,

            textarea.parsley-success {

              color: #468847;

              background-color: #DFF0D8;

              border: 1px solid #D6E9C6;

            }

            input.parsley-error,

            select.parsley-error,

            textarea.parsley-error {

              color: #B94A48;

              background-color: #F2DEDE;

              border: 1px solid #EED3D7;

            }


            .parsley-errors-list {

              margin: 2px 0 3px;

              padding: 0;

              list-style-type: none;

              font-size: 0.9em;

              line-height: 0.9em;

              opacity: 0;


              transition: all .3s ease-in;

              -o-transition: all .3s ease-in;

              -moz-transition: all .3s ease-in;

              -webkit-transition: all .3s ease-in;

            }


            .parsley-errors-list.filled {

              opacity: 1;

            }



            .error,.parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{

             color:#ff0000;

            }



            </style>
</head>

<body>

<!-- Start preloader -->

@include('front.include.load')
<!-- End preloader -->

<!-- Start header area -->
<header class="header__section">
    <!-- Top Header -->
    @include('front.include.header')
    <!-- End Top Header -->
    <!-- Main Header -->

    @include('front.include.main_header')
    <!-- End Main Header -->
    <!-- Bottom Header -->

    @include('front.include.header_bottom')
    <!-- End Bottom Header -->

    <!-- Start Offcanvas header menu -->

    @include('front.include.offcanvas_header_menu_sidebar')
    <!-- End Offcanvas header menu -->

    <!-- Start Offcanvas stikcy toolbar -->


    @include('front.include.offcanvas_sticky_mobile_header')
    <!-- End Offcanvas stikcy toolbar -->

    <!-- Start offCanvas minicart -->


    @include('front.include.offcanvas_minicart_sidebar')


    <!-- End offCanvas minicart -->

    <!-- Start serch box area -->


    @include('front.include.predictivemobile_serach_box')
    <!-- End serch box area -->
</header>
<!-- End header area -->


<!-- Main Body Section -->
<main class="main__content_wrapper">

  @yield('body')

</main>
<!-- End Main Body Section -->

<!-- Start footer section -->

@include('front.include.footer')
<!-- End footer section -->

<!-- Quickview Wrapper -->

@include('front.include.product_quickview')
<!-- End Quickview Wrapper -->


<!-- Scroll top bar -->
<button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

<!-- All Script JS Plugins here  -->
<script src="{{asset('/')}}public/front/assets/js/vendor/popper.js" defer="defer"></script>
<script src="{{asset('/')}}public/front/assets/js/vendor/bootstrap.min.js" defer="defer"></script>
<script src="{{asset('/')}}public/front/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="{{asset('/')}}public/front/assets/js/plugins/glightbox.min.js"></script>

<!-- Customscript js -->
<script src="{{asset('/')}}public/front/assets/js/script.js"></script>


<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



  @yield('script')
  
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
                 
                // alert(final_quantity);
                
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
    
<script>
    $(document).ready(function(){



        ////add to cart multiple
        $("[id^=add_to_cart_m]").click(function(){

            var currentId  = $(this).attr('id');
            var after_string_slice_id = currentId.slice(13);

            //alert(after_string_slice_id);


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

//////////


$.ajax({
url: "{{ route('add_to_cart_count_new') }}",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

    $("#main_cart_count1").html('');
$('#main_cart_count1').html(data);


    $("#main_cart_count2").html('');
$('#main_cart_count2').html(data);

$("#main_cart_count3").html('');
$('#main_cart_count3').html(data);



}

});

    });
        ///end add to cart multiple



        $("#single_page_cart_value").click(function(){


            alert('22')


        });


        $("#quick_view_add_to_card").click(function(){


            // var id_for_pass = $('#product_id_quickview').val();

            // alert(id_for_pass);


        });

        ///new cart code
        $("[id^=cart_button]").click(function(){


            var currentId  = $(this).attr('id');
            var after_string_slice_id = currentId.slice(11);

            //alert(after_string_slice_id);


            $.ajax({
url: "",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

$("#cart_main_table").html('');
$('#cart_main_table').html(data);

alertify.set('notifier','position', 'top-center');
    alertify.success('Added To Cart!');

}

});

//////////


$.ajax({
url: "",
type: "GET",
data: {
'after_string_slice_id': after_string_slice_id
},
success: function (data) {

    $("#main_cart_count1").html('');
$('#main_cart_count1').html(data);


    $("#main_cart_count2").html('');
$('#main_cart_count2').html(data);

$("#main_cart_count3").html('');
$('#main_cart_count3').html(data);



}

});




        });

        ///end new cart code
      $("[id^=qq_view]").click(function(){
         var pname = $(this).attr('data-namep');
         var pprice = $(this).attr('data-pricep');
        var pdetail = $(this).attr('data-detailp');
        // var pid = $(this).attr('data-pid');

       var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(7);

       //alert(id_for_pass);

    //    $('#product_name').html('');
    //    $('#product_price').html('');
    //    $('#product_detail').html('');

       $('#product_name').html(pname);
        $('#product_price').html('৳'+' '+ pprice);
        $('#product_detail').html('');


        $('#product_id_quickview').val(id_for_pass);








       // $('#mm1[href=""]').attr('href',url_main);
       // $('#mm2[src=""]').attr('src',url_main);

        //$('#mm3[href=""]').attr('href',url_main);







        //alert(url_main);

        $.ajax({
        url: "{{ route('quick_view_data') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });


        $.ajax({
        url: "{{ route('quick_view_data1') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table1").html('');
          $("#main_content_table1").html(data);
        }
        });



        $.ajax({
        url: "{{ route('quick_view_data2') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table2").html('');
          $("#main_content_table2").html(data);
        }
        });


        $.ajax({
        url: "{{ route('quick_view_data3') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table3").html('');
          $("#main_content_table3").html(data);
        }
        });


      });
    });
    </script>


    <script>
    $(function() {
         $('#MainSearchNew').hide();
    $("#product_name").keyup(function(){
        var category_name = $('#category_name').val();
        var product_name = $(this).val();
        var product_name_length = $(this).val().length;
        //alert(product_name_length);

         $.ajax({
        url: "{{ route('search_product_ajax') }}",
        method: 'GET',
        data: {category_name:category_name,product_name:product_name},
        success: function(data) {
            
            if(product_name_length == 0){
                $('#MainSearchNew').hide();
            }else{
               $('#MainSearchNew').show();
            }
  
           // console.log(data);
                $('#search_area').html('');
               $('#search_area').html(data);
        }
        });

    });
});

</script>



 <script>
   $(function() {
        $('#MainSearchMobile').hide();
    $("#search_product_in_mobile").keyup(function(){
        var search_product_in_mobile = $('#search_product_in_mobile').val();
        
        
        var search_product_in_mobile_length = $('#search_product_in_mobile').val().length;

        //alert(email);

         $.ajax({
        url: "{{ route('mobile_search_product') }}",
        method: 'GET',
        data: {search_product_in_mobile:search_product_in_mobile},
        success: function(data) {
if(search_product_in_mobile_length == 0){
                $('#MainSearchMobile').hide();
            }else{
               $('#MainSearchMobile').show();
            }

               $('#search_area_new').html('');
               $('#search_area_new').html(data);
        }
        });

    });
});

</script>
<script>
    var input = document.querySelector("#mobile-number");
    window.intlTelInput(input, {
        separateDialCode: true,
        onlyCountries: ["bd"],
    });
</script>
</body>
</html>
