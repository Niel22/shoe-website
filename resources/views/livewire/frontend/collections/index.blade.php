<section class="tp-shop-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="tp-shop-sidebar mr-10">
                </div>
            </div>
            <section class="tp-shop-area pb-120">
                <div class="container">
                   <div class="row">
                      <div class="col-xl-12">
                         <div class="tp-shop-main-wrapper">
                            <div class="tp-shop-top mb-45">
                               <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="tp-shop-top-left d-flex align-items-center ">
                                       <div class="tp-shop-top-tab tp-tab">
                                       </div>
                                       <div class="tp-shop-top-result">

                                       </div>
                                    </div>
                                 </div>

                                  <div class="col-xl-6 col-lg-6 col-md-6 float-end">
                                     <div class="tp-shop-top-right tp-shop-top-right-2 d-sm-flex align-items-center justify-content-xl-end">
                                        <div class="tp-shop-top-select">
                                           <select wire:model.live="priceInput" class="nice-select" style="display: block;">
                                              <option>Default Sorting</option>
                                              <option value="low-to-high">Low to High</option>
                                              <option value="high-to-low">High to Low</option>
                                              <option value="date-added">New Added</option>
                                           </select>
                                        </div>
                                        <div class="tp-shop-top-filter">
                                           <button type="button" class="tp-filter-btn filter-open-btn">
                                              <span>
                                                 <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.9998 3.45001H10.7998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M3.8 3.45001H1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.5999 5.9C7.953 5.9 9.0499 4.8031 9.0499 3.45C9.0499 2.0969 7.953 1 6.5999 1C5.2468 1 4.1499 2.0969 4.1499 3.45C4.1499 4.8031 5.2468 5.9 6.5999 5.9Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15.0002 11.15H12.2002" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M5.2 11.15H1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.4002 13.6C10.7533 13.6 11.8502 12.5031 11.8502 11.15C11.8502 9.79691 10.7533 8.70001 9.4002 8.70001C8.0471 8.70001 6.9502 9.79691 6.9502 11.15C6.9502 12.5031 8.0471 13.6 9.4002 13.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                 </svg>
                                              </span>
                                              Filter
                                           </button>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="tp-shop-items-wrapper tp-shop-item-primary">
                               <div class="tab-content" id="productTabContent">
                                  <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                                     <div class="row">
                                        @forelse ($products as $product)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-6 col-sm-6">
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
                                                 <div class="tp-product-tag-2">
                                                    <a href="{{ url('/collection/'.$product->category->slug) }}">{{ $product->category->name }}</a>
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
                                        @empty
                                        <h4 class="text-center">{{ $none }}</h4>
                                        @endforelse
                                     </div>
                                  </div>
                                </div>
                            </div>
                            @if($products->count() > 0)
                            <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="tp-shop-top-left d-flex align-items-center ">
                                   <div class="tp-shop-top-tab tp-tab">
                                   </div>
                                   <div class="tp-shop-top-result">
                                    <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                                   </div>
                                </div>
                             </div>
                            <div class="tp-shop-pagination mt-20">
                               {{ $products->links() }}
                            </div>
                            </div>
                            @endif
                         </div>
                      </div>
                   </div>
                </div>
             </section>
        </div>
    </div>
    </div>
    </div>
    <div class="tp-filter-offcanvas-area" wire:ignore>
        <div class="tp-filter-offcanvas-wrapper">
           <div class="tp-filter-offcanvas-close">
              <button type="button" class="tp-filter-offcanvas-close-btn filter-close-btn">
                 <i class="fa-solid fa-xmark"></i>
                 Close
              </button>
           </div>
           <div class="tp-shop-sidebar">
            <form wire:submit="filter">
              <!-- filter -->
              <div class="tp-shop-widget mb-35">
                <h3 class="tp-shop-widget-title no-border">Price Filter</h3>

                <div class="tp-shop-widget-content">
                    <div class="tp-shop-widget-filter">
                        <div
                            class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                            <div class="input-range">
                                <div class="mb-1">
                                    <label>Min Price:</label>
                                    <input wire:model.live="min_price" type="number">
                                </div>
                                <div class="mb-1">
                                    <label>Max Price:</label>
                                    <input wire:model.live="max_price" type="number">
                                </div>
                                <div>
                                <button wire:click="resetFilter" class="tp-shop-widget-filter-btn" type="button">Reset Price</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <!-- Size -->
              <div class="tp-shop-widget mb-35">
                <h3 class="tp-shop-widget-title no-border">Filter By Size</h3>

                <div class="tp-shop-widget-content">
                    <div class="tp-shop-widget-filter">
                        <div
                            class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                            <div class="input-range">
                                <div class="mb-1">
                                    <label>From Size:</label>
                                    <input wire:model.live="min_size" placeholder="e.g 45" type="number">
                                </div>
                                <div class="mb-1">
                                    <label>To Size:</label>
                                    <input wire:model.live="max_size" placeholder="e.g 45" type="number">
                                </div>
                                <div>
                                <button wire:click="resetSize" class="tp-shop-widget-filter-btn" type="button">Reset Size</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tp-shop-widget mb-50">
                <h3 class="tp-shop-widget-title">Filter by Color</h3>

                <div class="tp-shop-widget-content">
                   <div class="tp-shop-widget-checkbox-circle-list">
                      <ul>
                        @foreach($colors as $color)
                         <li>
                            <div class="tp-shop-widget-checkbox-circle">
                               <input wire:model.live="colorProduct" value="{{ $color->id }}" type="checkbox" id="{{ $color->name }}">
                               <label for="{{ $color->name }}">{{ $color->name }}</label>
                               <span data-bg-color="{{ $color->code }}" class="tp-shop-widget-checkbox-circle-self" style="{{ $color->code }};"></span>
                            </div>
                            <span class="tp-shop-widget-checkbox-circle-number">{{ $color->products->count() }}</span>
                         </li>
                         @endforeach
                      </ul>
                   </div>
                </div>
             </div>
            </form>
              <!-- categories -->
              <div class="tp-shop-widget mb-50">
                <h3 class="tp-shop-widget-title">Categories</h3>

                <div class="tp-shop-widget-content">
                    <div class="tp-shop-widget-categories">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a style="cursor: pointer" href="{{ url('collection/'. $category->slug ) }}">{{ $category->name }}
                                        <span>{{ $category->products->count() }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
           </div>
        </div>
     </div>
</section>
