<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Products
                    <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form wire:submit="store" enctype="multipart/form-data" method="post">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="images-tab" data-bs-toggle="tab"
                                data-bs-target="#images-tab-pane" type="button" role="tab"
                                aria-controls="images-tab-pane" aria-selected="true">Product Images</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="product-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-pane" type="button" role="tab"
                                aria-controls="product-tab-pane" aria-selected="false">Product</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        {{-- Images --}}
                        <div class="tab-pane fade border p-3 mb-2 show active" id="images-tab-pane" role="tabpanel"
                            aria-labelledby="images-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Product Images</label>
                                <input type="file" wire:model.live="image" multiple min="2" class="form-control">
                                @error('image')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="row">
                                @if ($image)
                                    @foreach ($image as $singleImage)
                                        <div class="col-md-4">
                                            <img style="width: 100px; height: 100px;" class="img img-thumbnail me-4"
                                                src="{{ $singleImage->temporaryUrl() }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- Product --}}
                        <div class="tab-pane fade border p-3 mb-2" id="product-tab-pane" role="tabpanel"
                            aria-labelledby="product-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Category</label>
                                <select wire:model="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Small Description (500 Words)</label>
                                <textarea rows="4" wire:model="small_description" class="form-control"></textarea>
                                @error('small_description')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Description</label>
                                <textarea rows="4" wire:model="description" class="form-control"></textarea>
                                @error('description')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Details --}}
                        <div class="tab-pane fade border p-3 mb-2" id="details-tab-pane" role="tabpanel"
                            aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" wire:model="original_price" class="form-control">
                                        @error('original_price')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" wire:model="selling_price" class="form-control">
                                        @error('selling_price')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" wire:model="quantity" class="form-control">
                                        @error('quantity')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label><br>
                                        <input type="checkbox" wire:model="trending"
                                            style="width: 50px; height: 50px;">
                                        @error('trending')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label><br>
                                        <input type="checkbox" wire:model="status"
                                            style="width: 50px; height: 50px;">
                                        @error('status')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row border p-3">
                                <h4>Type: </h4>

                                <div class="col-md-2">

                                    <input type="radio" id="men" wire:model="type" value="men">
                                    <label for="men">Men</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" id="women" wire:model="type" value="women">
                                    <label for="women">Women</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" id="kid" wire:model="type" value="kid">
                                    <label for="kid">Kids</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" id="Unisex" wire:model="type" value="Unisex">
                                    <label for="Unisex">Unisex</label>
                                </div>
                            </div>

                            <div class="row border p-3">
                                <h4>Material: </h4>

                                <div class="col-md-2">

                                    <input type="radio" id="Leather" wire:model="material" value="Leather">
                                    <label for="Leather">Leather</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" id="Synthetic" wire:model="material" value="Synthetic">
                                    <label for="Synthetic">Synthetic</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" id="Suede" wire:model="material" value="Suede">
                                    <label for="Suede">Suede</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="Canvas" wire:model="material" value="Canvas">
                                    <label for="Canvas">Canvas</label>
                                </div>
                            </div>

                            <div class="row border p-3">
                                <h4>Style: </h4>

                                <div class="col-md-2">

                                    <input type="radio" id="Classic" wire:model="style" value="Classic">
                                    <label for="Classic">Classic</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" id="Modern" wire:model="style" value="Modern">
                                    <label for="Modern">Modern</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" id="Trendy" wire:model="style" value="Trendy">
                                    <label for="Trendy">Trendy</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="Sporty" wire:model="style" value="Sporty">
                                    <label for="Sporty">Sporty</label>
                                </div>
                            </div>
                            <div class="row border p-3">
                                <h4>Color: </h4>

                                @forelse ($colors as $color)
                                        <div class="col-md-1">
                                            <input type="checkbox" wire:model="color" value="{{ $color->id }}">
                                            {{ $color->name }} <br>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h1>No Colors found</h1>
                                        </div>
                                    @endforelse
                            </div>
                            <div class="row border p-3">
                                <h4>Size: </h4>

                                @for ($size = 20; $size <= 70; $size++)
                                        <div class="col-md-1">
                                            <input style="width: 20px; height: 20px;" type="checkbox"
                                                wire:model="size" value="{{ $size }}"> {{ $size }}
                                        </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <button wire:loading.remove wire:target="store" class="btn btn-primary float-right"
                                type="submit">
                                Save Product
                            </button>
                            <button wire:loading wire:target="store" disabled
                                class="btn btn-info btn-icon-text float-right"></i>Saving Product<i
                                    class="mdi mdi-loading mdi-spin btn-icon-prepend"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
