<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Products
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

                @include('layouts.inc.admin.flash-message')

                <form wire:submit="update" enctype="multipart/form-data" method="post">

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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab"
                                data-bs-target="#colors-tab-pane" type="button" role="tab"
                                aria-controls="colors-tab-pane" aria-selected="false">Product Color</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="size-tab" data-bs-toggle="tab"
                                data-bs-target="#size-tab-pane" type="button" role="tab"
                                aria-controls="size-tab-pane" aria-selected="false">Product Size</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        {{-- Images --}}
                        <div class="tab-pane fade border p-3 mb-2 show active" id="images-tab-pane" role="tabpanel"
                            aria-labelledby="images-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Product Images</label>
                                <input type="file" wire:model.live="image" multiple class="form-control">
                                @error('image')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            @if($product->productImages)
                            <h3>Old Images</h3>
                            <div class="flex">
                                @foreach ($product->productImages as $singleImage)
                                <div class="d-inline-block">
                                        <img style="width: 100px; height: 100px;" class="me-4 d-block border p-1" src="{{ asset('storage/uploads/products/'.$singleImage->image) }}">
                                        <button type="button" wire:click="deleteImage({{ $singleImage }})" style="width: 100px;" class="btn btn-block btn-danger">Delete</button>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <h3>No Images Added</h3>
                            @endif
                            <h3>New Images</h3>
                            <div class="row">
                                @if ($image)
                                    @foreach ($image as $singleImage)
                                        <div class="col-md-4">
                                            <img style="width: 100px; height: 100px;" class="img img-thumbnail me-4" src="{{ $singleImage->temporaryUrl() }}">
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
                                    @foreach ($categories as $category)
                                        <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Product Name</label>
                                <input value="{{ $product->name }}" type="text" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Small Description (500 Words)</label>
                                <textarea rows="4" wire:model="small_description" class="form-control">{{ $product->small_description }}</textarea>
                                @error('small_description')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Description</label>
                                <textarea rows="4" wire:model="description" class="form-control">{{ $product->description }}</textarea>
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
                                        <input type="text" value="{{ $product->original_price }}" wire:model="original_price" class="form-control">
                                        @error('original_price')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" value="{{ $product->selling_price }}"wire:model="selling_price" class="form-control">
                                        @error('selling_price')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" wire:model="quantity" value="{{ $product->quantity }}" class="form-control">
                                        @error('quantity')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label><br>
                                        <input type="checkbox" wire:model="trending" {{ $product->trending ? 'checked' : '' }}
                                            style="width: 50px; height: 50px;">
                                        @error('trending')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label><br>
                                        <input type="checkbox" wire:model="status" {{ $product->status ? 'checked' : '' }}
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
                                    <input type="radio" {{ $product->type === "men" ? 'checked' : '' }} id="men" wire:model="type" value="men">
                                    <label for="men">Men</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->type === "women" ? 'checked' : '' }} id="women" wire:model="type" value="women">
                                    <label for="women">Women</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->type === "kids" ? 'checked' : '' }} id="kid" wire:model="type" value="kid">
                                    <label for="kid">Kids</label>
                                </div>
                            </div>

                            <div class="row border p-3">
                                <h4>Material: </h4>

                                <div class="col-md-2">

                                    <input type="radio" {{ $product->material === "Leather" ? 'checked' : '' }} id="Leather" wire:model="material" value="Leather">
                                    <label for="Leather">Leather</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->material === "Synthetic" ? 'checked' : '' }} id="Synthetic" wire:model="material" value="Synthetic">
                                    <label for="Synthetic">Synthetic</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->material === "Suede" ? 'checked' : '' }} id="Suede" wire:model="material" value="Suede">
                                    <label for="Suede">Suede</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" {{ $product->material === "Canvas" ? 'checked' : '' }} id="Canvas" wire:model="material" value="Canvas">
                                    <label for="Canvas">Canvas</label>
                                </div>
                            </div>

                            <div class="row border p-3">
                                <h4>Style: </h4>

                                <div class="col-md-2">

                                    <input type="radio" {{ $product->style === "Classic" ? 'checked' : '' }} id="Classic" wire:model="style" value="Classic">
                                    <label for="Classic">Classic</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->style === "Modern" ? 'checked' : '' }} id="Modern" wire:model="style" value="Modern">
                                    <label for="Modern">Modern</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->style === "Trendy" ? 'checked' : '' }} id="Trendy" wire:model="style" value="Trendy">
                                    <label for="Trendy">Trendy</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" {{ $product->style === "Sporty" ? 'checked' : '' }} id="Sporty" wire:model="style" value="Sporty">
                                    <label for="Sporty">Sporty</label>
                                </div>
                            </div>
                        </div>

                        {{-- Colors --}}
                        <div class="tab-pane fade border p-3 mb-2" id="colors-tab-pane" role="tabpanel"
                            aria-labelledby="colors-tab" tabindex="0">
                            <div class="mb-3">
                                <h1>Select Color</h1>
                                <div class="row">
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
                            </div>
                            @if ($product->productColors->count() > 0)
                            <div class="table-responsive">
                                <h1>Product Colors</h1>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Color Name</td>
                                            <td>Color</td>
                                            <td>Delete</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productColors as $color)
                                        <tr>

                                            <td>{{ $color->color->name ?? $color->id }}</td>
                                            <td><div style="height: 30px; width: 30px; background-color: {{ $color->color->code ?? $color->name }}"></div></td>

                                            <td>
                                                <button type="button" wire:click.prevent="deleteColor({{ $color }})" class="btn btn-danger btn-sm text-white">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif

                        </div>

                        {{-- Size --}}
                        <div class="tab-pane fade border p-3 mb-2" id="size-tab-pane" role="tabpanel"
                            aria-labelledby="size-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Select Shoe Size</label>
                                <div class="row">
                                    @for ($size = 20; $size <= 70; $size++)
                                        @if(!in_array($size, $product->productSizes->pluck('size')->toArray()))
                                            <div class="col-md-1">
                                                <input style="width: 20px; height: 20px;" type="checkbox" wire:model="size" value="{{ $size }}"> {{ $size }}
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>

                            @if ($product->productSizes->count() > 0)
                            <div class="table-responsive">
                                <h1>Product Size</h1>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Size</td>
                                            <td>Delete</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productSizes as $size)
                                        <tr>
                                            <td>{{ $size->size }}</td>
                                            <td>
                                                <button type="button" wire:click.prevent="deleteSize({{ $size }})" class="btn btn-danger btn-sm text-white">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div>
                        <button wire:loading.remove wire:target="update" class="btn btn-primary float-right" type="submit">
                            Save Product
                        </button>
                        <button wire:loading wire:target="update" disabled class="btn btn-info btn-icon-text float-right"></i>Saving Product<i class="mdi mdi-loading mdi-spin btn-icon-prepend"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
