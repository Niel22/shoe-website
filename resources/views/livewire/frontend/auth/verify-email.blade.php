<section class="tp-login-area pb-140 p-relative z-index-1 fix">
    @include('layouts.inc.frontend.app.flash-message')
    <div class="tp-login-shape">
       <img class="tp-login-shape-1" src="{{ asset('frontend/img/login/login-shape-1.png') }}" alt="">
       <img class="tp-login-shape-2" src="{{ asset('frontend/img/login/login-shape-2.png') }}" alt="">
       <img class="tp-login-shape-3" src="{{ asset('frontend/img/login/login-shape-3.png') }}" alt="">
       <img class="tp-login-shape-4" src="{{ asset('frontend/img/login/login-shape-4.png') }}" alt="">
    </div>
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
             <div class="tp-login-wrapper">
                <div class="tp-login-top text-center mb-30">
                   <h3 class="tp-login-title">Verify Your Email Address</h3>
                   <p>Check your email for verification link.</p>
                </div>
                <form wire:submit="verification_notification">
                <div class="tp-login-option">
                   <div class="tp-login-input-wrapper">
                      <div class="tp-login-input-box">
                         <div class="tp-login-input">
                            <input wire:model="email" name="email" readonly type="hidden" placeholder="berryshoes@mail.com">
                         </div>
                      </div>
                   </div>
                   <div class="tp-login-bottom mb-15">
                      <button wire:loading.remove wire:target="verification_notification" type="submit" class="tp-login-btn w-100">Resend Link</button>
                      <button wire:loading wire:target="verification_notification" type="submit" class="tp-login-btn w-100">Resending...</button>
                   </div>
                </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </section>
