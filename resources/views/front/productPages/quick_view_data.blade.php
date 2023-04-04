<div class="swiper-slide">
    <div class="product__media--preview__items">
        <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ $url_name }}{{ $feature_product_list3->front_image }}"><img class="product__media--preview__items--img" src="{{ $url_name }}{{ $feature_product_list3->front_image }}" alt="product-media-img"></a>
        <div class="product__media--view__icon">
            <a class="product__media--view__icon--link glightbox" href="{{ $url_name }}{{ $feature_product_list3->front_image }}" data-gallery="product-media-preview">
                <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
            </a>
        </div>
    </div>
</div>
<div class="swiper-slide">
    <div class="product__media--preview__items">
        <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ $url_name }}{{ $feature_product_list3->back_image }}"><img class="product__media--preview__items--img" src="{{ $url_name }}{{ $feature_product_list3->back_image }}" alt="product-media-img"></a>
        <div class="product__media--view__icon">
            <a class="product__media--view__icon--link glightbox" href="{{ $url_name }}{{ $feature_product_list3->back_image }}" data-gallery="product-media-preview">
                <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
            </a>
        </div>
    </div>
</div>

@foreach($feature_image_one as $all_feature_image_one)
<div class="swiper-slide">
    <div class="product__media--preview__items">
        <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ $url_name }}{{ $all_feature_image_one->filename }}"><img class="product__media--preview__items--img" src="{{ $url_name }}{{ $all_feature_image_one->filename }}" alt="product-media-img"></a>
        <div class="product__media--view__icon">
            <a class="product__media--view__icon--link glightbox" href="{{ $url_name }}{{ $all_feature_image_one->filename }}" data-gallery="product-media-preview">
                <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
            </a>
        </div>
    </div>
</div>
@endforeach






