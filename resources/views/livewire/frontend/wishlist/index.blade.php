<section class="tp-cart-area pb-120">
    @include('layouts.inc.frontend.app.flash-message')
    <div class="container">
       <div class="row">
          <div class="col-xl-12">
            @if($wishlists->count() > 0)
             <div class="tp-cart-list mb-45 mr-30">
                <table class="table">
                   <thead>
                     <tr>
                       <th colspan="2" class="tp-cart-header-product">Product</th>
                       <th class="tp-cart-header-price">Price</th>
                       <th>Action</th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach ($wishlists as $wishlist)
                    @if($wishlist->products)
                        <tr>
                         <!-- img -->
                         <td class="tp-cart-img"><a href="{{ url('/collection/'.$wishlist->products->slug) }}"> <img src="{{ asset('storage/uploads/products/'. $wishlist->products->productImages[0]->image) }}" alt=""></a></td>
                         <!-- title -->
                         <td class="tp-cart-title"><a href="{{ url('/collection/'.$wishlist->products->slug) }}">{{ $wishlist->products->name }}</a></td>
                         <!-- price -->
                         <td class="tp-cart-price"><span>₦{{ $wishlist->products->selling_price }}.00</span></td>
                         <!-- quantity -->

                         <td class="tp-cart-add-to-cart">
                            <button wire:loading.remove wire:target="addToCart({{ $wishlist->products->id }})" wire:click="addToCart({{ $wishlist->products->id }})" type="submit" class="tp-btn tp-btn-2 tp-btn-blue">Add To Cart</button>
                            <button wire:loading wire:target="addToCart({{ $wishlist->products->id }})" wire:click="addToCart({{ $wishlist->products->id }})" type="submit" class="btn btn-sm tp-btn tp-btn-2 tp-btn-green">Redirecting..</button>
                         </td>

                         <!-- action -->
                         <td class="tp-cart-action">
                            <button wire:loading.remove wire:target="delete({{ $wishlist->id }})" wire:click="delete({{ $wishlist->id }})" class="tp-cart-action-btn">
                               <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"></path>
                               </svg>
                               <span >Remove</span>
                            </button>
                            <span wire:loading wire:target="delete({{ $wishlist->id }})">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </span>
                         </td>
                      </tr>
                      @endif
                    @endforeach

                   </tbody>
                 </table>
                </div>
                @endif
                @if($wishlists->count() === 0)
                   <h4 class="text-center">No wishlists</h4>
               @endif
             <div class="tp-cart-bottom">
                <div class="row align-items-end">
                   <div class="col-xl-6 col-md-4">
                      <div class="tp-cart-update">
                         <a href="{{ url('/cart') }}" class="tp-cart-update-btn">Go To Cart</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
