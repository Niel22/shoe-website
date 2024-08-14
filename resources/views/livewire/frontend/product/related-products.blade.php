<section class="tp-related-product pt-95 pb-120">
    <div class="container">
        <div class="row">
            <div class="tp-section-title-wrapper-6 text-center mb-40">
                <h3 class="tp-section-title-6">Related Products</h3>
            </div>
        </div>
        <div class="row">
            <div class="tp-product-related-slider">
                @foreach($products as $product)
                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" role="group"
                    aria-label="4 / 8" style="width: 336px; margin-right: 24px;">
                    <div class="tp-product-item-2 mb-40">
                        <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                          <a href="{{ url('/collection/' . $product->category->slug . '/' . $product->slug) }}">
                              <!-- Default Image -->
                              <img src="{{ asset('storage/uploads/products/' . $product->productImages[0]->image) }}" alt="{{ $product->name }}" class="default-img">
                              <!-- Hover Image -->
                              <img src="{{ asset('storage/uploads/products/' . $product->productImages[1]->image) }}" alt="{{ $product->name }}" class="hover-img">
                          </a>
                        </div>
                        <div class="tp-product-content-2 pt-15">
                           <div class="tp-product-tag-2 text-capitalize">
                              {{ $product->type }}, {{ $product->material }}, {{ $product->style }}
                           </div>
                           <h3 class="tp-product-title-2">
                              <a href="{{ url('/collection/'.$product->category->slug . '/' . $product->slug) }}">{{ $product->name }}</a>
                           </h3>
                           <div class="tp-product-rating-icon tp-product-rating-icon-2">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-price-wrapper-2">
                              <span class="tp-product-price-2 new-price">₦{{ number_format($product->selling_price, 2) }}</span>
                              <span class="tp-product-price-2 old-price">₦{{ number_format($product->original_price, 2) }}</span>
                           </div>
                        </div>
                     </div>
                </div>
                @endforeach
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <div class="tp-related-swiper-scrollbar tp-swiper-scrollbar">
                <div class="tp-swiper-scrollbar-drag"
                    style="width: 120.874px; transform: translate3d(125.042px, 0px, 0px);">
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
