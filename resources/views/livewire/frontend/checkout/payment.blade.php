<section class="tp-checkout-area pb-120" style="background-color: #eff1f5;">
    @include('layouts.inc.frontend.app.flash-message')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-100">
                <form wire:submit="redirectToGateway" class="form-horizontal"
                    role="form">
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-2">
                            <div class="mb-3">
                                <div>
                                    <h5>You are to make a payment of ₦{{ number_format($order, 2) }}, click on Pay Now to make payment and click on Confirm Payment after makeing the payment.
                                         Make sure you have a good internet connection. And don't leave this page until your payment is confirmed</h5>
                                </div>
                            </div>
                            <input type="hidden" wire:model="email" >
                            <input type="hidden" wire:model="amount" >
                            <input type="hidden" wire:model="quantity" >
                            <input type="hidden" wire:model="currency" >
                            <input type="hidden" wire:model="reference" >

                        </div>
                        <div class="row ">
                            <div class="col-md-12 mt-100">
                                <button wire:loading.remove wire:target="redirectToGateway" class="btn btn-success btn-sm " type="submit">
                                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                </button>
                                <button wire:loading wire:target="redirectToGateway" class="btn btn-success btn-sm " type="submit">
                                    <i class="fa fa-plus-circle fa-lg"></i> Redirecting
                                </button>
                                <button wire:loading.remove wire:target="handleGatewayCallback" wire:click="handleGatewayCallback" type="button" class="btn btn-primary btn-sm ">
                                    <i class="fa fa-check-circle fa-lg"></i> Confirm Payment!
                                </button>
                                <button wire:loading wire:target="handleGatewayCallback" type="button" class="btn btn-primary btn-sm ">
                                    <i class="fa fa-check-circle fa-lg"></i> Checking Payment..
                                </button>
                            </div>
                            <div class="col-md-12 mt-2">
                                <p wire:loading wire:target="redirectToGateway">Please wait while you being redirected to the page to make your payment.</p>
                                <p wire:loading wire:target="handleGatewayCallback">Please wait while your payment is being confirmed.</p>
                                <p >Please! Do not refresh te page till the payment is done and confirmed.</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
