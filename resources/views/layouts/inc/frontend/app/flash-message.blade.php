<div class="toast-container position-fixed">
    @if (session()->has('toast-error'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1000">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex bg-danger text-white">
                    <div class="toast-body">
                        {{ session('toast-error') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('toast-message'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1000">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex bg-success text-white">
                    <div class="toast-body">
                        {{ session('toast-message') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
</div>
