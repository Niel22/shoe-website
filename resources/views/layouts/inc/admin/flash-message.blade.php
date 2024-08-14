@if (session()->has('message'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1000000">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex bg-success text-white">
            <div class="toast-body">
                {{ session('message') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

@if (session()->has('success'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1000000">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex bg-success text-white">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

@if (session()->has('error'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1000000">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex bg-danger text-white">
            <div class="toast-body">
                {{ session('error') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

