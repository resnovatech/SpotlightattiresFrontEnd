<!-- Quickview Wrapper -->
<div class="modal" id="modal1" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper">
        <header class="modal-header quickview__header">
            <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
        </header>
        <div class="quickview__inner"  >
            <div class="row row-cols-lg-2 row-cols-md-2">
                <div class="col">
                    <div class="quickview__product--media product__details--media"  >
                        <div class="product__media--preview  swiper">
                            <div class="swiper-wrapper" id="main_content_table">
                                {{-- <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link " id="mm1" data-gallery="product-media-preview" href=""><img class="product__media--preview__items--img" id="mm2" src="" alt="product-media-img"></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link " id="mm3" href="" data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        <div class="product__media--nav swiper">
                            <div class="swiper-wrapper">


                            </div>
                            <div class="swiper__nav--btn swiper-button-next"></div>
                            <div class="swiper__nav--btn swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('add_to_card_from_quick_view') }}">
                    @csrf
                <div class="col">
                    <div class="quickview__info">
                        <input type="hidden" id="product_id_quickview" name="product_id" />

                            <h2 class="product__details--info__title mb-15" id="product_name">Oversize Cotton Dress</h2>
                            <div class="product__details--info__price mb-10">
                                <span class="current__price" id="product_price">$58.00</span>

                            </div>

                            <p class="product__details--info__desc mb-15" id="product_detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit is. Deserunt totam dolores ea numquam labore! Illum magnam totam tenetur fuga quo dolor.</p>
                            <div class="product__variant">
                                <div class="product__variant--list mb-10">
                                    <fieldset class="variant__input--fieldset" id="main_content_table1">

                                    </fieldset>
                                </div>




                                <div class="product__variant--list mb-15">
                                    <fieldset class="variant__input--fieldset weight" id="main_content_table2">

                                    </fieldset>
                                </div>

                                <div class="product__variant--list mb-10">
                                    <fieldset class="variant__input--fieldset" id="main_content_table3">

                                    </fieldset>
                                </div>



                                <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                                    {{-- <div class="quantity__box">
                                        <button type="button" class="quantity__value quickview__value--quantity " aria-label="quantity value" value="Decrease Value">-</button>
                                        <label>
                                            <input type="number" name="quantity" class="quantity__number quickview__value--number" value="1" data-counter/>
                                        </label>
                                        <button type="button" class="quantity__value quickview__value--quantity " aria-label="quantity value" value="Increase Value">+</button>
                                    </div> --}}
                                    <button class="primary__btn quickview__cart--btn" id="quick_view_add_to_card" type="submit" >Add To Cart</button>
                                </div>

                            </div>


                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Quickview Wrapper End -->
