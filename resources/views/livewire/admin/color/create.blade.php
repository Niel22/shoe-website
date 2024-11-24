<div class="card-body">
    <form wire:submit="store">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label>Color Name</label>
                <input type="text" wire:model="name" class="form-control">
                @error('name')
                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label>Color Code</label>
                <input type="text" wire:model="code" class="form-control">
                @error('code')
                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label>Status</label><br>
                <input type="checkbox" wire:model="status" style="width: 50px; height: 50px;">
            </div>
            <div class="mb-3 col-md-6">
                <button wire:loading.remove wire:target="store" class="btn btn-primary float-right" type="submit">
                    Save Color
                </button>
                <button wire:loading wire:target="store" disabled class="btn btn-info btn-icon-text float-right"></i>Saving Color<i class="mdi mdi-loading mdi-spin btn-icon-prepend"></i></button>
            </div>
        </div>
    </form>
</div>
