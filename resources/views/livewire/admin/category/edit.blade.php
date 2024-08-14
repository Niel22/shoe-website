<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form wire:submit="update({{ $category }})" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" value="{{ $category->name }}" wire:model="name" class="form-control">
                            @error('name')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" value="{{ $category->image }}" wire:model="image"
                                class="form-control">
                            @if (File::exists('storage/uploads/category/' . $category->image))
                                <img src="{{ asset('storage/uploads/category/' . $category->image) }}" width="60px"
                                    height="auto" alt="{{ $category->name }}">
                            @endif
                            @error('image')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Description</label>
                            <textarea wire:model="description" row="3" class="form-control">{{ $category->description }}</textarea>
                            @error('description')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" wire:model="status" {{ $category->status ? 'checked' : '' }}>
                        </div>

                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                            <input type="text" value="{{ $category->meta_title }}" wire:model="meta_title"
                                class="form-control">
                            @error('meta_title')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Keyword</label>
                            <textarea wire:model="meta_keyword" row="3" class="form-control">{{ $category->meta_keyword }}</textarea>
                            @error('meta_keyword')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea wire:model="meta_description" row="3" class="form-control">{{ $category->meta_description }}</textarea>
                            @error('meta_description')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <button wire:loading.remove type="submit" class="btn btn-primary btn-icon-text float-right"><i class="mdi mdi-file-check btn-icon-prepend"></i>Update </button>
                            <button wire:loading disabled class="btn btn-info btn-icon-text float-right"></i>Updating <i class="mdi mdi-loading mdi-spin btn-icon-prepend"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
