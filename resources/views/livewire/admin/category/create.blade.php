
            <div class="card-body">
                <form wire:submit="store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Description</label>
                            <textarea wire:model="description" row="3" class="form-control"></textarea>
                            @error('description')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" wire:model="status">
                        </div>

                        <div class="col-md-12 mb-3">
                            <button wire:loading.remove type="submit" class="btn btn-primary btn-icon-text float-right"><i class="mdi mdi-file-check btn-icon-prepend"></i>Save </button>
                            <button wire:loading disabled class="btn btn-info btn-icon-text float-right"></i>Saving <i class="mdi mdi-loading mdi-spin btn-icon-prepend"></i></button>
                        </div>
                    </div>
                </form>
            </div>
