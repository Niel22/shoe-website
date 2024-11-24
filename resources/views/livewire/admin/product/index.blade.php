<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Product Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit="destroy">
                    <div class="modal-body">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="m-3">
        @include('layouts.inc.admin.flash-message')
    </div>

    <div class="card-body text-nowrap table-responsive">
        @if ($products->count() > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>In Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td><button wire:click="updateStatus({{ $product->id }})" type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                <i class="{{ $product->status  ? "mdi mdi-check-circle text-success" : "mdi mdi-checkbox-blank-circle-outline text-muted" }}"></i>
                            </button>

                            </td>
                            <td>
                                <a class="btn btn-sm btn-dark btn-icon-text"
                                    href="{{ route('product.edit', $product->id) }}">Edit
                                    <i class="mdi mdi-file-check btn-icon-append"></i></a>
                                <a wire:click="deleteProduct({{ $product }})"
                                    class="btn btn-sm btn-danger btn-icon-text" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"><i
                                        class="mdi mdi-delete btn-icon-append"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="alert alert-info text-center">
                {{ $none }}
            </div>
        @endif
        {{ $products->links() }}
    </div>
