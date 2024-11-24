@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right">Add Product</a>
                    </h3>
                </div>
                <livewire:admin.product.index lazy />
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#deleteModal').modal('hide');

        });
    </script>
@endpush
