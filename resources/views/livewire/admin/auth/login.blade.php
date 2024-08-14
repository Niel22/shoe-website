<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <h3>Berry Shoes</h3>
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Log in to continue.</h6>
                        <form wire:submit="store" class="pt-3">
                            @csrf
                            <div class="form-group">
                                <input wire:model="email" type="email" class="form-control form-control-lg"
                                    id="exampleInputEmail1" placeholder="email">
                                @error('email')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model="password" type="password" class="form-control form-control-lg"
                                    id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" class="mt-3">
                                <button type="submit" wire:loading.remove
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOG
                                    IN</button>

                                    <button disabled wire:loading
                                    class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">LOGGING
                                    IN <i class="spinner-border spinner-border-sm"></i></button>
                            </div>
{{--
                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{ url('/admin/register') }}"
                                    class="text-primary">Register</a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
